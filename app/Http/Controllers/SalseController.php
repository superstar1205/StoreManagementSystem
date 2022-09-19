<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalseController extends Controller
{
    //
    public function index(){
        $user_id                = Auth::user()->id;
        $products               = DB::select('SELECT * From products');
        $result                 = DB::select('SELECT * FROM invoices WHERE user_id = ? and status=0', [$user_id]);
        if(sizeof($result)>0){
            $new_no             = $result[0]->invoice_no;
        } else{
            $oresult            = DB::select('SELECT MAX(invoice_no) AS in_no FROM invoices ');
            if($oresult[0]->in_no == 0){
                $new_no         = '1000000000';
            }else {
                $new_no         = ((int) $oresult[0]->in_no)+1;
            }
            DB::insert('INSERT INTO `invoices` (invoice_no, user_id) value(?, ?)', [$new_no, $user_id]);
        }
        $data = [
            'products'          => $products,
            'invoice_no'        => $new_no,
        ];
        return view('content/Salse/record-new-invoice')->with($data);
    }

    public function newinvoice(Request $request){
        $user_id = Auth::user()->id;
        $request->validate([
            'iinvoice_no'       => 'required|numeric',
            'paid_price'        => 'required',
            'unpaid_price'      => 'required',
            'inv_status'        => 'required|string'
            ]);
        $inv_no                 = $request->iinvoice_no;
        $paid                   = $request->paid_price;
        $unpaid                 = $request->unpaid_price;
        if($request->inv_status == 'Complete'){
            $inv_s              = 1;
        } else{
            $inv_s              = 0;
        }

        $result                 = DB::select('SELECT pro.id, pro.product_name, pro.product_num, inv.invoice_no, inv.product_amount, pro.product_num - inv.product_amount AS left_product  FROM invoices inv LEFT JOIN ( SELECT id, product_name, image, product_num FROM products) pro ON inv.product_id = pro.id WHERE inv.deleted=0 and  inv.status = 0 AND inv.invoice_no=?',[$inv_no]);
        if($result){
            foreach ($result as $product){
                $product_id     = $product->id;
                $product_num    = $product->left_product;
                DB::update('UPDATE products SET product_num = ? WHERE id =?', [$product_num, $product_id]);
            }
        }
        DB::update('UPDATE invoices SET status = 1, paid_price=?, unpaid_price=?, inv_status=?  WHERE invoice_no = ?', [$paid, $unpaid, $inv_s, $inv_no]); 
        return redirect()->route('salsehistory');
    }

    public function salsehistory(){
        $results                = DB::select('SELECT *, SUM(total_price)AS tprice FROM invoices WHERE deleted=0 and STATUS=1 GROUP BY invoice_no');
        $total_result           = DB::select('SELECT *, SUM(t1.tp) AS total, SUM(paid_price) AS paid, SUM(unpaid_price) AS remain FROM (SELECT *, SUM(total_price) AS tp FROM invoices WHERE deleted=0 GROUP BY invoice_no) t1');
        $data                   = [
            'invoices'          => $results,
            'total'             => $total_result[0]
        ];
        return view('content/Salse/invoices-list')->with($data);
    }

    public function updateinvoice(Request $request){
        $request->validate([
            'inv_no'            => 'required',
            'npaid_price'       => 'required',
            'nunpaid_price'     => 'required',
            'ninv_status'       => 'required|string',
        ]);

        $inv_no                 = $request->inv_no;
        if($request->opaid_price == ''){
            $opaid              = 0;
        }else{
            $opaid              = $request->opaid_price;
        }
        $npaid                  = $request->npaid_price;
        $nunpaid                = $request->nunpaid_price;
        $paid                   = $opaid + $npaid;
        if($request->ninv_status =='Complete'){
            $ninv_s             = 1;
        } else{
            $ninv_s             = 0;
        }
        DB::update('UPDATE invoices SET status = 1, paid_price=?, unpaid_price=?, inv_status=?  WHERE invoice_no = ?', [$paid, $nunpaid, $ninv_s, $inv_no]); 
        return redirect()->route('salsehistory');
    }

    public function editinvoice(Request $request){
        $inv_no                 = $request->input('i');
        $tprice                 = $request->input('t');
        $results                = DB::select('SELECT inv.*, pro.product_name, pro.image From invoices inv LEFT JOIN ( SELECT id,product_name, image FROM products) pro ON inv.product_id = pro.id WHERE inv.deleted=0 and inv.invoice_no =?', [$inv_no]);
        $seller_id              = $results[0]->user_id;
        $seller                 = DB::select('SELECT * FROM users WHERE id=?', [$seller_id]);
        $data                   = [
            'invoice'           => $results,
            'inv_no'            => $inv_no,
            'customer'          => $results[0]->customer,
            'paid'              => $results[0]->paid_price,
            'unpaid'            => $results[0]->unpaid_price,
            'status'            => $results[0]->inv_status,
            'date'              => $results[0]->updated_at,
            'tprice'            => $tprice,
            'seller'            => $seller[0]->f_name.' '.$seller[0]->l_name
            ];

        return view('content/Salse/edit-invoice')->with($data);
    }

    public function viewinvoice(Request $request){
        $inv_no                 = $request->input('i');
        $tprice                 = $request->input('t');
        $results                = DB::select('SELECT inv.*, pro.product_name, pro.image From invoices inv LEFT JOIN ( SELECT id,product_name, image FROM products) pro ON inv.product_id = pro.id WHERE inv.deleted=0 and inv.invoice_no =?', [$inv_no]);
        $seller_id              = $results[0]->user_id;
        $seller                 = DB::select('SELECT * FROM users WHERE id=?', [$seller_id]);
        $data                   = [
            'invoice'           => $results,
            'inv_no'            => $inv_no,
            'customer'          => $results[0]->customer,
            'paid'              => $results[0]->paid_price,
            'unpaid'            => $results[0]->unpaid_price,
            'status'            => $results[0]->inv_status,
            'date'              => $results[0]->updated_at,
            'tprice'            => $tprice,
            'seller'            => $seller[0]->f_name.' '.$seller[0]->l_name
            ];

        return view('content/Salse/view-invoice')->with($data);
    }

    public function delet_inv(Request $request){
        $inv_no                 = $request->input('inv_no');
        DB::update('UPDATE invoices SET deleted=1 WHERE invoice_no=?', [$inv_no]);
        return true;
    }
}
