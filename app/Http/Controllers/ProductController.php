<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function newproduct(Request $request){
        $request->validate([
            'product_name'      => 'required|string|max:255',
            'product_price'     => 'required|integer',
            'file'              => 'required|mimes:jpg,png'
        ]);
        $product_name           = $request->product_name;
        $product_num            = $request->product_num;
        $product_price          = $request->product_price;
        $total_price            = $request->total_price;
        $filename               = $product_name.'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $filename);
        $image                  = 'uploads/'.$filename;
        DB::insert('INSERT INTO products (product_name, product_price, image, product_num, total_price ) value(?,?,?,?,?)', [$product_name, $product_price, $image, $product_num, $total_price]);

        return redirect()->route('showproducts');
    }

    public function showProducts(){
        $products = DB::select('SELECT * From products WHERE deleted=0');
        
        $data = [
            'products' => $products
        ];
        return view('content/Stores/products-list')->with($data);
    }

    public function addproduct(Request $request){
        $request->validate([
            'product_id'        => 'required',
            'product_name'      => 'required|string',
            'product_price'     => 'required',
            'quantity'          => 'required',
            'total_price'       => 'required'
        ]);

        $product_id             = $request->product_id;
        $product_price          = $request->product_price;
        $quantity               = $request->quantity;
        $total_price            = $request->total_price;
        $result                 = DB::select('SELECT * From products WHERE id=?', [$product_id]);
        foreach ($result as $product){
            $new_num                = $quantity + $product->product_num;
            DB::update('UPDATE products SET product_num =? WHERE id=?', [$new_num, $product_id]);
        }
        DB::insert('INSERT INTO store_history (product_id, sproduct_price, b_quantity, btotal_price) value(?,?,?,?)', [$product_id, $product_price, $quantity, $total_price]);

        return redirect()->route('showproducts');
    }

    public function selproduct(Request $request){
        $product_name           = $request->productname;
        $productinfo            = DB::select('SELECT * From products where deleted=0 and product_name=?', [$product_name]);
        return $productinfo;
    }

    public function getproducts(Request $request){
        $keywords               = $request->input('productkey');
        $products               = DB::select('SELECT * FROM products WHERE deleted=0 and product_name Like "%'.$keywords.'%"');
        $data                   = [
            'results'           => $products,
        ];
        return $data;
    }

    public function addiproduct(Request $request){
        $user_id                = Auth::user()->id;
        $invoice_no             = $request->input('inv_no');
        $customer               = $request->input('customer');
        $product_id             = $request->input('product_id');
        $product_price          = $request->input('price');
        $product_qty            = $request->input('quantity');
        $total_price            = $request->input('total_price');

        DB::delete ('DELETE FROM invoices WHERE product_id IS NULL');

        DB::insert ('INSERT INTO invoices (invoice_no, user_id, customer, product_id, product_price, product_amount, total_price) value(?,?,?,?,?,?,?)', [$invoice_no, $user_id, $customer, $product_id, $product_price, $product_qty, $total_price]);

        $results                = DB::select('SELECT inv.*, pro.product_name, pro.image From invoices inv LEFT JOIN ( SELECT id,product_name, image FROM products) pro ON inv.product_id = pro.id WHERE inv.deleted=0 and  inv.invoice_no = '.$invoice_no);

        $data = [
            'results'           => $results,
        ];
        return $data;
    }

    public function deletiproduct(Request $request){

        $id                     = $request->input('id');
        $invoice_no             = $request->input('inv_no');

        DB::delete ('DELETE FROM invoices WHERE id='.$id);
        $results                = DB::select('SELECT inv.*, pro.product_name, pro.image From invoices inv LEFT JOIN ( SELECT id,product_name, image FROM products) pro ON inv.product_id = pro.id WHERE inv.deleted=0 and  inv.invoice_no = '.$invoice_no);

        $data                   = [
            'results'           => $results,
        ];
        return $data;
    }
    
    public function delete_product(Request $request){
        $product_id             = $request->input('id');
        DB::update('UPDATE products SET deleted=1 WHERE id=?', [$product_id]);

        return true;
    }
}

