<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'expense_name'  => 'required|string|max:255',
            'expense_price' => 'required'
        ]);
        $expense_name       = $request->expense_name;
        $expense_price      = $request->expense_price;
        DB::insert('INSERT INTO expenses (expense_name, expense_price) value(?, ?)', [$expense_name, $expense_price]);

        return redirect()->route('expenses');

    }

    public function expenses(){
        $results            = DB::select('SELECT * FROM expenses WHERE deleted=0');

        $data               = [
            'expenses'      => $results
        ];

        return view('content/Expenses/expense-list')->with($data);
        
    }

    public function paytopartner(Request $request) {
        $partner_id         = $request->input('i');
        $partner_name       = $request->input('fn').' '.$request->input('ln');
        $partner_percent    = $request->input('p');
        $inv_res            =   DB::select('SELECT *, SUM(t1.tp) AS total, SUM(paid_price) AS paid, SUM(unpaid_price) AS remain FROM (SELECT *, SUM(total_price) AS tp FROM invoices WHERE deleted=0 GROUP BY invoice_no) t1');
        $expense            =   DB::select('SELECT *, SUM(expense_price) AS e_total FROM expenses WHERE deleted=0 and partner_id=?', [$partner_id]);
        if($expense[0]->id == null){
            $orecive = 0;
        }  else {
            $orecive = $expense[0]->e_total;
        }
        $data = [
            'partner_id' => $partner_id,
            'partner_name' => $partner_name,
            'partner_percentage' => $partner_percent,
            'inv_res' => $inv_res[0],
            'oreceive' => $orecive
        ];

        return view('content/Partners/pay-to-partner')->with($data);

    }

    public function paidtopartner(Request $request){
        $request->validate([
            'partner_id' => 'required',
            'partner_name' => 'required',
            'pay_amount' => 'required'
        ]);
        $partner_id = $request->partner_id;
        $expense_name = 'Pay to '.$request->partner_name;
        $expense_price = $request->pay_amount;
        DB::insert('INSERT INTO expenses (expense_name, expense_price, partner_id, status) value(?, ?, ?, ?)', [$expense_name, $expense_price, $partner_id, 1]);

        return redirect()->route('expenses');

    }

    public function delete_expense(Request $request){
        $product_id = $request->input('id');
        DB::update('UPDATE expenses SET deleted=1 WHERE id=?', [$product_id]);
        return true;
    }
}
