<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Productline;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('vieworder' , ['orders' => $order]);
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
    public function store(Request $request)
    {
        //
        
        $productlines = Productline::all();
        $order = Order::all();
        $order = new Order([
            'orderNumber' => $request->orderNumber,
            'orderDate' => $request->orderDate,
            'requiredDate' => $request->requiredDate,
            'shippedDate' => $request->shippedDate,
            'status' => $request->status,
            'comments' => $request->comments,
            'total' => $request->total,
            'pointReceived' => $request->pointReceived,
            'orderType' => $request->orderType,
            'couponNumber' => $request->couponNumber,
            'paymentNumber' => $request->paymentNumber
        ]);
        $order->save();
        $order = Order::all();
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
        //
        $orderNumber = Order::find($id);
        return view('payment',compact('orderNumber')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('editorder',compact('order')); 
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
        Order::find($id)->update([
            'shippedDate'=>$request->shippedDate,
            'status'=>$request->status,
            'comments'=>$request->comments
        ]);
        return redirect('/order');
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
