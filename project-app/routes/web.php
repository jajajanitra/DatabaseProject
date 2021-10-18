<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductlineController;
use App\Http\Controllers\StockInController;

use App\Models\Productline;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/stock-in/products/addproduct' , function () {
    $productlines = Productline::all();
    return view('createproduct' , compact('productlines'));
});

Route::post('/stock-in/products/addproduct' ,[ProductController::class, 'store']);

Route::get('/stock-in/products', [ProductController::class, 'index']);

Route::resource('/stock-in', StockInController::class);

Route::resource('/employee', EmployeeController::class);

Route::resource('/customer', CustomerController::class);

Route::get('/stock-in/products/edit/{product}' ,[ProductController::class, 'edit']);

Route::put('/stock-in/products/edit/{product}' ,[ProductController::class, 'update']);

Route::delete('/stock-in/products/delete/{product}' ,[ProductController::class, 'delete']);

Route::get('/erm', [EmployeeController::class, 'erm']);

Route::get('/erm/edit/{employee}', [EmployeeController::class, 'edit']); 

Route::put('/erm/edit/{employee}', [EmployeeController::class, 'update']);