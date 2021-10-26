<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customer::all();
        return view('viewcustomer' , ['customers' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('create_customer',['customers' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //ตรวจสอบข้อมูล

        $request->validate([
        'customerName'=>'required|max:50',
        'contactLastName'=>'required|max:50',
        'contactFirstName'=>'required|max:50',
        'phone'=>'required|max:50',
        'addressLine1'=>'required|max:50',
        'addressLine2'=>'max:50',
        'city'=>'required|max:50',
        'state'=>'max:50',
        'postalCode'=>'required|max:15',
        'country'=>'required|max:50',
        'salesRepEmployeeNumber'=>'max:50',
        'creditLimit'=>'required|max:50',
    ]);
    //บันทึกข้อมูล
    $customers = Customer::all();
    $customer = new Customer([
        'customerNumber' => $customers->max('customerNumber')+1,
        'customerName'=> $request->customerName,
        'contactLastName'=> $request->contactLastName,
        'contactFirstName'=> $request->contactFirstName,
        'phone'=> $request->phone,
        'addressLine1'=> $request->addressLine1,
        'addressLine2'=> $request->addressLine2,
        'city'=> $request->city,
        'state'=> $request->state,
        'postalCode'=> $request->postalCode,
        'country'=> $request->country,
        'salesRepEmployeeNumber'=> $request->salesRepEmployeeNumber,
        'creditLimit'=> $request->creditLimit,
        'points'=> $request->points
    ]);
    $customer->save();
    $customer=Customer::all();
    return redirect('/customer');
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
