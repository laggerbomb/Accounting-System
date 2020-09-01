<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/",function (){
    return view("welcome");
});

Route::get("customer/invoice",function (){
    return view("customer.invoice.index");
});

Route::get("customer/payment",function (){
    return view("customer.payment.index");
});

Route::get("customer/statement",function (){
    return view("customer.statement.index");
});


Route::resource("customer/invoice", "CinvoiceController");
Route::resource("customer/payment", "CpaymentController");
Route::resource("customer/check", "CheckCustIdController");

Route::resource("company", "CompanyController");
Route::resource("customer/statement", "CstatementController");

Route::resource("vendor/purchase", "VpurchaseInvoiceController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
