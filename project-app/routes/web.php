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

use App\Models\Product;
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


Route::get('/stock-in/products/addproduct' , function () {
    return view('createproduct');
});

// Route::post('/stock-in/products/createproduct' , function () {
//     Product::create([
//         'productCode' => request('productCode'),
//         'productName' => request('productName'),
//         'productLine' => request('productLine'),
//         'productScale' => request('productScale'),
//         'productVendor' => request('productVendor'),
//         'productDescription' => request('productDescription'),
//         'quantityInStock' => request('quantityInStock'),
//         'buyPrice' => request('buyPrice'),
//         'MSRP' => request('MSRP'),
//         'productStatus' => request('productStatus')
//     ]);
//     return view('createproduct');
// });

Route::post('/stock-in/products/addproduct' ,[ProductController::class, 'store']);

Route::resource('/stock-in/products', ProductController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
