<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $order = Order::find($id);
        $payment = Payment::find($id);
        return view('payment' ,compact('payment', 'order'));
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
        $payment = Payment::all();
        $payment = new Payment([
            'customerNumber'=> $request->customerNumber,
            'checkNumber'=> $request->checkNumber,
            'paymentDate'=> $request->paymentDate,
            'amount'=> $request->amount
        ]);
        $payment->save();
        $payment = Payment::all();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $payments = Payment::all();
        return view('viewpayment',compact('payments','order'));
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

    public function updatestatus(Request $request, $id){
        
    
        $payment = Payment::all();
        $payment = new Payment([
            'customerNumber'=> $request->customerNumber,
            'checkNumber'=> $request->paymentNumber,
            'paymentDate'=> $request->paymentDate,
            'amount'=> $request->amount
        ]);
        $payment->save();
        $payment = Payment::all();

        $order = Order::all();
        if($request->orderType == 'normal'){
            Order::find($id)->update([
            'status'=>$request->status = 'shipped',
            ]);
        }

        $cart = session()->get('cart');
        unset($cart);
        session()->put('cart', null);
        session()->flash('success', 'Product removed successfully');
        return redirect('/products');
        
    }
}
