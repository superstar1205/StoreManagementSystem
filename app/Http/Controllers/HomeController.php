<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id                        =   Auth::user()->id;
        $partners                       =   DB::select('SELECT * FROM users WHERE deleted=0 and id!=?', [$user_id]);
        $invoices                       =   DB::select('SELECT *, SUM(total_price) AS tp FROM invoices WHERE deleted=0 AND STATUS=1 GROUP BY invoice_no');
        $inv_res                        =   DB::select('SELECT *, SUM(t1.tp) AS total, SUM(paid_price) AS paid, SUM(unpaid_price) AS remain FROM (SELECT *, SUM(total_price) AS tp FROM invoices WHERE deleted=0 GROUP BY invoice_no) t1');
        $products                       =   DB::select('SELECT * FROM products WHERE deleted=0');
        $expenses                       =   DB::select('SELECT * FROM expenses WHERE deleted=0');
        $partner_expenses               =   DB::select('SELECT *, SUM(expense_price) AS ep FROM expenses WHERE partner_id IS NOT NULL AND deleted=0 GROUP BY partner_id');
        $expense                        =   DB::select('SELECT *, SUM(expense_price) AS e_total FROM expenses WHERE deleted=0');
        $casher                         =   $inv_res[0]->paid - $expense[0]->e_total;
        $data                           =   [
            'partners'                  =>  $partners,
            'invoices'                  =>  $invoices,
            'inv_res'                   =>  $inv_res[0],
            'casher'                    =>  $casher,
            'products'                  =>  $products,
            'expenses'                  =>  $expenses,
            'total_ex'                  =>  $expense[0],
            'partner_expenses'          =>  $partner_expenses,
        ];
        return view('home')->with($data);
    }

    public function create(Request $request){
        $user_id                        =   Auth::user()->id;
        $user_percentage                =   Auth::user()->percentage;
        $request->validate([
            'f_name'                    => 'required|string|max:255',
            'l_name'                    => 'required|string|max:255',
            'email'                     => 'required|email|unique:users|max:255',
            'percentage'                => 'required',
            'file'                      => 'required|mimes:jpg,png',
            'password'                  => 'required|string|min:8'
        ]);

        $filename = $request->f_name.'_'.$request->l_name.'.'.$request->file->extension();
        $request->file->move(public_path('avatars'), $filename);
        $avatar = 'avatars/'.$filename;

        $partner                        =   new User;
        $partner->f_name                =   $request->f_name;
        $partner->l_name                =   $request->l_name;
        $partner->email                 =   $request->email;
        $partner->password              =   Hash::make($request->password);
        $partner->unhashing_password    =   $request->password;
        $partner->avatar                =   $avatar;
        $partner->percentage            =   $request->percentage;
        $partner->save();
        
        $percentage                     =   $user_percentage - $request->percentage;
        DB::update('UPDATE users SET percentage = ? WHERE id=?', [$percentage, $user_id]);

        return redirect()->route('partners');

    }

    public function partners(){
        $user_id                        =   Auth::user()->id;
        $results                        =   DB::select('SELECT * FROM users WHERE deleted = 0 and id !=?', [$user_id]);

        $data                           =   [
            'partners'                  =>  $results
        ];

        return view('content/Partners/my-partners')->with($data);
    }

    public function patnersetting(Request $request){
        $partner_id                     =   $request->input('i');
        $results                        =   DB::select('SELECT * FROM users WHERE id =?', [$partner_id]);
        $data                           =   [
            'partner'                   =>  $results[0],
        ];
        return view('content/Partners/partner-setting')->with($data);
    }

    public function updatepartner(Request $request){
        $user_id                        =   Auth::user()->id;
        $user_percentage                =   Auth::user()->percentage;
        $request->validate([
            'id'                        => 'required',
            'f_name'                    => 'required|string|max:255',
            'l_name'                    => 'required|string|max:255',
            'email'                     => 'required|string|max:255',
            'percentage'                => 'required',
            'opercentage'               => 'required',
            'oavatar'                   => 'required',
            'password'                  => 'required|string|min:8'
        ]);
        $partner_id                     =   $request->id;
        $f_name                         =   $request->f_name;
        $l_name                         =   $request->l_name;
        $email                          =   $request->email;
        $percentage                     =   $request->percentage;
        $password                       =   $request->password;
        $hashpassword                   =   Hash::make($password);
        if($request->file){
            $filename                   =   $f_name.'_'.$l_name.'.'.$request->file->extension();
            $request->file->move(public_path('avatars'), $filename);
            $avatar                     =   'avatars/'.$filename;
        } else{
            $avatar = $request->oavatar;
        }
        $opercentage                    =   $request->opercentage;
        $npercentage                    =   $user_percentage - $percentage + $opercentage;
        DB::update('UPDATE users SET f_name=?, l_name=?, email=?, percentage=?, avatar=?, password=?, unhashing_password=? WHERE id=? ', [$f_name, $l_name, $email, $percentage, $avatar, $hashpassword, $password, $partner_id]);

        DB::update('UPDATE users SET percentage=? WHERE id=?', [$npercentage, $user_id]);
        
        return redirect()->route('partners');
    }

    public function delpartner(Request $request){
        $user_id                        =   Auth::user()->id;
        $user_percentage                =   Auth::user()->percentage;
        $partner_id                     =   $request->input('id');
        $partner_percentage             =   $request->input('percentage');
        DB::update('UPDATE users SET deleted = 1 WHERE id=?', [$partner_id]);

        $user_npercentage               = $user_percentage + $partner_percentage;
        DB::update('UPDATE users SET percentage = ? WHERE id = ?', [$user_npercentage, $user_id]);
        return true;
    }

}
