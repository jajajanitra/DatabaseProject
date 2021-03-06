<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Orderdetail;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\PreOrder;
use App\Models\Product;

class OrderController extends  OrderdetailController
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
        $coupon = null;
        return view('cart',compact('coupon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());             
        $orders = Order::all();
        $check = $orders->max('orderNumber')+1;
        $order = new Order([
            'orderNumber' => $orders->max('orderNumber')+1,
            'orderDate' => $request->orderDate,
            'requiredDate' => $request->requiredDate,
            'shippedDate' => $request->shippedDate,
            'status' => $request->status,
            'comments' => $request->comments,
            'total' => $request->total,
            'pointReceived' => $request->pointReceived,
            'orderType' => $request->orderType,
            'customerNumber' => $request->customerNumber,
            'couponNumber' => $request->couponNumber,
            'paymentNumber' => $request->paymentNumber
        ]);
        $order->save();
        $order = Order::all();

        if($request->orderType == "preorder"){
            $preorders = PreOrder::all();
            $preorder = new PreOrder([
                'preOrderNumber' => $preorders->max('preOrderNumber')+1,
                'customerNumber' => $request->customerNumber,
                'orderNumber' => $check,
                'upFrontPaid' => $request->total
            
            ]);
            $preorder->save();
            $preorder = PreOrder::all();

        }
        OrderdetailController::stored($request,$check);
        // $orderdetail = new Orderdetail([
        //     'orderNumber' => $check,
        //     'productCode' => $request->productCode,
        //     'quantityOrdered' => $request->quantityOrdered,
        //     'priceEach' => $request->priceEach,
        //     'orderLineNumber' => $request->orderLineNumber,
        // ]);
        // $orderdetail->save();
        // $orderdetail = Orderdetails::all();
        $customer = Customer::find($request->customerNumber);
        $customer->points = $customer->points+$request->pointReceived;
        $customer->save();
        $customer = Customer::all();
        $coupon = Coupon::find($request->couponNumber);
        if($coupon != null){
            $coupon->couponLimit = $coupon->couponLimit-1;
            $coupon->save();
            $coupon = Coupon::all();
        }
        return redirect('/payment/'. $check);
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
        $orderdetail = Orderdetail::find($id);
        return view('editorder',compact('order','orderdetail')); 
        
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
        if($request->status == 'canceled')
        {

            $orderdetail = Orderdetail::where('orderNumber',$id)->get();
           // $product = Product::all();

            for($i=0; $i<count( $orderdetail) ;$i++){
                    $product = Product::find($orderdetail [$i] -> productCode);
                    $product -> quantityInStock += $orderdetail [$i]-> quantityOrdered;
                    $product->save();
            }
            
        }

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