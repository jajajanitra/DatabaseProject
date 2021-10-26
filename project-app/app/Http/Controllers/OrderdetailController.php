<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orderdetail;
use App\Models\Product;


class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stored(Request $request,$check)
    {
        //
        for ($i = 0; $i < count($request->productCode); $i++){
        $orderdetail = new Orderdetail([
            'orderNumber' => $check,
            'productCode' => $request->productCode[$i],
            'quantityOrdered' => $request->quantityOrdered[$i],
            'priceEach' => $request->priceEach[$i],
            'orderLineNumber' => $i+1,
        ]);
        $orderdetail->save();
        $product = Product::find($request->productCode[$i]);
        $product->quantityInStock = $request->quantityInStock[$i]-$request->quantityOrdered[$i];
        $product->save();
        $product = Product::all();
        }
        $orderdetail = Orderdetail::all();
        return redirect('/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderdetails = Orderdetail::find($id);
        return view('vieworderdetail',compact('orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
