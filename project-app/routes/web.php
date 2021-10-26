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
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/{employee}', [EmployeeController::class, 'show']);

Route::get('/stock-in/products/addproduct' , function () {
    $productlines = Productline::all();
    return view('createproduct' , compact('productlines'));
});

Route::post('/stock-in/products/addproduct' ,[ProductController::class, 'store']);
Route::get('/stock-in/products', [ProductController::class, 'index']);
Route::get('/stock-in/products/edit/{product}' ,[ProductController::class, 'edit']);
Route::put('/stock-in/products/edit/{product}' ,[ProductController::class, 'update']);
Route::delete('/stock-in/products/delete/{product}' ,[ProductController::class, 'delete']);

Route::get('/erm', [EmployeeController::class, 'erm']);
Route::get('/erm/edit/{employee}', [EmployeeController::class, 'edit']); 
Route::put('/erm/edit/{employee}', [EmployeeController::class, 'update']);

//ProductFront
Route::get('/products',[ProductController::class,'show']);
Route::get('/products/vendor/{vendor}', [ProductController::class,'categoryvendor']);
Route::get('/products/scale/{scale}',[ProductController::class,'categoryscale']);
Route::get('/products/scale/{status}',[ProductController::class,'categorystatus']);

//cart
Route::get('/products/cart/addtocart/{id}',[ProductController::class,'AddToCart']);
Route::delete('/products/cart/removefromcart',[ProductController::class,'RemoveFromCart']);
Route::put('/products/cart/updatecart',[ProductController::class,'UpdateCart']);
Route::get('/products/cart' ,[OrderController::class, 'create']);
Route::post('/products/cart' ,[OrderController::class, 'store']);

Route::resource('/stock-in', StockInController::class);
Route::get('/stock-inadd', [StockInController::class , 'create']);
Route::post('/stock-inadd' ,[StockInController::class, 'store']);

Route::resource('/employee', EmployeeController::class);


//Customer
Route::resource('/customer', CustomerController::class);
Route::get('/customer/create' ,[CustomerController::class, 'create']);
Route::post('/customer/add' ,[CustomerController::class, 'store']);

//Order
Route::resource('/order', OrderController::class);
Route::get('/order/edit/{id}', [OrderController::class, 'edit']);
Route::post('/order/update/{id}', [OrderController::class, 'update']);

//Orderdetail
Route::get('/orderdetail/{id}', [OrderdetailController::class, 'show']);

//payments
Route::get('/mypayment/{id}', [PaymentController::class, 'show']);

//add to cart
//Route::put('/products/addtocart',[OrderController::class],'show');