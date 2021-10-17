<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productline;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        $productlines = Productline::all();
        return view('viewproducts' , compact('products','productlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product([
            'productCode' => $request->productCode,
            'productName' => $request->productName,
            'productLine' => $request->productLine,
            'productScale' => $request->productScale,
            'productVendor' => $request->productVendor,
            'productDescription' => $request->productDescription,
            'quantityInStock' => $request->quantityInStock,
            'buyPrice' => $request->buyPrice,
            'MSRP' => $request->MSRP,
            'productStatus' => $request->productStatus
        ]);
        $product->save();
        $product = Product::all();
        return redirect('/stock-in/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        //
        $product = Product::find($product);
        $productlines = Productline::all();
        return view('editproduct', compact('product','productlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        //
        $input = $request->all();

        $product = Product::find($product);
        $product->productCode = $input['productCode'];
        $product->productName = $input['productName'];
        $product->productLine = $input['productLine'];
        $product->productScale = $input['productScale'];
        $product->productVendor = $input['productVendor'];
        $product->productDescription = $input['productDescription'];
        $product->quantityInStock = $input['quantityInStock'];
        $product->buyPrice = $input['buyPrice'];
        $product->MSRP = $input['MSRP'];
        $product->productStatus = $input['productStatus'];

        $product->save();
        return redirect('/stock-in/products');
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

    public function delete($product)
    {
        Product::find($product)->delete();
        return redirect('/stock-in/products');
    }
}
