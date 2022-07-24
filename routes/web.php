<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

################################### Customers Routes  ##########################################
Route::resource('/customers',CustomerController::class);
################################### End Customers Routes  ######################################

################################### Product Routes  ##########################################
Route::resource('/products',ProductController::class);
################################### End Product Routes  ######################################

################################### invoices Routes  ##########################################
Route::resource('/invoices',InvoiceController::class);
//Route::get('/price/{id}', [InvoiceController::class,'getprice']);
################################### End invoices Routes  ######################################






   
