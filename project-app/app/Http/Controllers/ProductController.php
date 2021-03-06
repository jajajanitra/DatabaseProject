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
        $productlines = Productline::all();
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
    public function show()
    {
        //
        $product = Product::all();
        $productVendor = Product::where('productVendor',$product)->getModel()->select('productVendor')->distinct()->get();
        $productScale = Product::where('productScale',$product)->getModel()->select('productScale')->distinct()->get();
        $productStatus = Product::where('productStatus',$product)->getModel()->select('productStatus')->distinct()->get();
        return view(('showproduct') ,compact('product','productVendor','productScale','productStatus'));
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

    /*filter product*/

    public function categorystatus(Request $request)
    {
        $product = Product::all();
        $status = $request->status;
        $productVendor = Product::where('productVendor',$product)->getModel()->select('productVendor')->distinct()->get();
        $productScale = Product::where('productScale',$product)->getModel()->select('productScale')->distinct()->get();
        $productStatus = Product::where('productStatus',$product)->getModel()->select('productStatus')->distinct()->get();
        $filters = ['status' => $request->status];
        $filter = Product::where(function($query) use($filters){
            $query->where('productStatus', '=', $filters['status']);
        }) ->get();
        return view('category' , compact('product','status','productVendor','productScale','productStatus','filter')); 
    }

    /*My Cart*/

    public function cart()
    {
        return view('cart');

    }

    public function AddToCart($id)
    {

        $product = Product::find($id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [$id => [
            "productCode"=> $product->productCode,
            "buyPrice"=> $product->buyPrice,
            "productName"=> $product->productName,
            "productLine"=> $product->productLine,
            "quantityInStock"=>$product->quantityInStock,
            "productScale"=> $product->productScale,
            "productVendor"=> $product->productVendor,
            "productDescription"=> $product->productDescription,
            "MSRP" => $product->MSRP,
            "productStatus" => $product->productStatus,
            "quantity"=> 1
            
            ]];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart); // this code put product of choose in cart
            return redirect()->back()->with('success');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "productCode"=> $product->productCode,
            "buyPrice"=> $product->buyPrice,
            "productName"=> $product->productName,
            "productLine"=> $product->productLine,
            "quantityInStock"=>$product->quantityInStock,
            "productScale"=> $product->productScale,
            "productVendor"=> $product->productVendor,
            "productDescription"=> $product->productDescription,
            "MSRP" => $product->MSRP,
            "productStatus" => $product->productStatus,
            "quantity"=> 1
            
        ];
        session()->put('cart', $cart); // this code put product of choose in cart
        // $cart = session()->get('cart');
        // //dd($cart);
        // session()->get('cart',$cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function UpdateCart(Request $request){
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function RemoveFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function category(Request $request,$status)
    {
        $product = Product::all();
        $status = $status;
        $productVendor = Product::where('productVendor',$product)->getModel()->select('productVendor')->distinct()->get();
        $productScale = Product::where('productScale',$product)->getModel()->select('productScale')->distinct()->get();
        $productStatus  = Product::where(function($query) use($status){
            $query->where('productStatus', '=', $status); }) ->get();
        
        if($request->vendor == 0){
            if($request->scale == 0){
                $filter = Product::where(function($query) use($status){
                    $query->where('productStatus', '=', $status); }) ->get();
                return view('category' , compact('product','productVendor','productScale','productStatus','filter','status')); 
            }else{
                $filter  = Product::where(function($query) use($status){
                    $query->where('productStatus', '=', $status); })->where('productScale', '=',$request->scale) ->get();
                return view('category' , compact('product','productVendor','productScale','productStatus','filter','status')); 
            }
        }else{
            if($request->scale == 0){
                //dd($request->vendor);
                $filter  = Product::where(function($query) use($status){
                    $query->where('productStatus', '=', $status); })->where('productVendor', '=',$request->vendor) ->get();
                return view('category' , compact('product','productVendor','productScale','productStatus','filter','status')); 
            }else{
                $filter  = Product::where(function($query) use($status){
                    $query->where('productStatus', '=', $status); })->where('productScale', '=',$request->scale)->where('productVendor', '=',$request->vendor) ->get();
                return view('category' , compact('product','productVendor','productScale','productStatus','filter','status')); 
            }
        }
    }

}
