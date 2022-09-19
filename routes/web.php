<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalseController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Salse part
Route::get('/newinvoice', [SalseController::class, 'index']);
Route::get('/salsehistory', [SalseController::class, 'salsehistory'])->name('salsehistory');
Route::get('/viewinvoice', [SalseController::class, 'viewinvoice'])->name('viewinvoice');
Route::get('/editinvoice', [SalseController::class, 'editinvoice'])->name('editinvoice');
Route::post('/getproducts', [ProductController::class, 'getproducts'])->name('getproducts');
Route::post('/addiproduct',[ProductController::class, 'addiproduct'])->name('addiproduct');
Route::post('/deletiproduct', [ProductController::class, 'deletiproduct'])->name('deletiproduct');
Route::post('/updateinvoice', [SalseController::class, 'updateinvoice'])->name('updateinvoice');
Route::post('/newinvoice', [SalseController::class, 'newinvoice'])->name('newinvoice');
Route::post('/delet_inv', [SalseController::class, 'delet_inv'])->name('delet_inv');    

//Store Part
Route::get('/newproduct', function(){ return view('content/Stores/record-new-product');});
Route::get('/showproducts', [ProductController::class, 'showProducts'])->name('showproducts');
Route::get('/addproduct', function(){ return view('content/Stores/add-product');});
Route::post('/newproduct', [ProductController::class, 'newproduct'])->name('newproduct');
Route::post('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('/selectproduct', [ProductController::class, 'selproduct'])->name('selectproduct');
Route::post('/delete_product', [ProductController::class, 'delete_product'])->name('delete_product');

//Partner part
Route::get('/newpartner', function(){ return view('content/Partners/create-new-partner'); });
Route::post('/newpartner', [HomeController::class, 'create'])->name('newpartner');
Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
Route::post('/delete_partner', [HomeController::class, 'delpartner'])->name('delete_partner');
Route::get('/patnersetting', [HomeController::class, 'patnersetting'])->name('patnersetting');
Route::post('/updatepartner', [HomeController::class, 'updatepartner'])->name('updatepartner');

//Expense part
Route::get('/newexpense', function(){ return view('content/Expenses/record-new-expense');});
Route::get('/paytopartner', [ExpenseController::class, 'paytopartner'])->name('paytopartner');
Route::post('/paidtopartner', [ExpenseController::class, 'paidtopartner'])->name('paidtopartner');

Route::post('/newexpense', [ExpenseController::class, 'create'])->name('newexpense');
Route::get('/expenses', [ExpenseController::class, 'expenses'])->name('expenses');
Route::post('/delete_expense', [ExpenseController::class, 'delete_expense'])->name('delete_expense');
