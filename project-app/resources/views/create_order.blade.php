<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <style>
        form{
            border:2px solid blue;
        }
        input{
            border:2px solid gold;
        }
    </style>
</head>
<body>
                    <div class="card">
                            <div class="card-header"><h1>Add Order Form</h1></div>
                            <div class="card-body">
                            <form action="{{url('/order/add'}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="orderNumberr">Number</label>
                                        <input type="text" class="form-control" name="orderNumber" >
                                    </div>
                                    @error('orderNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="orderDate">Date</label>
                                        <input type="text" class="form-control" name="orderDate" >
                                    </div>
                                    @error('orderDate')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="requiredDate">required Date</label>
                                        <input type="text" class="form-control" name="requiredDate" >
                                    </div>
                                    @error('requiredDate')
                                        <div>
                                            <span>{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="shippedDate">shipped Date</label>
                                        <input type="text" class="form-control" name="shippedDate" >
                                    </div>
                                    @error('shippedDate')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select name="state"  >
                                            <option value="canceled">canceled</option>
                                            <option value="disputed ">disputed </option>
                                            <option value="in process">in process</option>
                                            <option value="on hold">on hold</option>
                                            <option value="resolved ">resolved </option>
                                            <option value="shipped" selected>shipped </option>
                                        </select>
                                    </div> 
                                    <br>
                                    <div class="form-group">
                                        <label for="comments">Comments</label>
                                        <input type="text" class="form-control" name="comments" >
                                    </div>
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="total">Total</label>
                                        <input type="text" class="form-control" name="total" >
                                    </div>
                                    @error('total')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="pointReceived">Point Received</label>
                                        <input type="text" class="form-control" name="pointReceived" >
                                    </div>
                                    @error('pointReceived')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    <div class="form-group">
                                        <label for="orderType">Order Type</label>
                                        <select name="orderType" value="{{$order->orderType}}">
                                            <option value="pre-order">pre-order </option>
                                            <option value="normal" selected>normal </option>
                                            
                                        </select>
                                    </div>
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="couponNumber">Coupon Number.</label>
                                        <input type="text" class="form-control" name="couponNumber" >
                                    </div>
                                    @error('couponNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br> 
                                    @csrf
                                    <div class="form-group">
                                        <label for="customerNumber">Customer Number</label>
                                        <input type="text" class="form-control" name="customerNumber" >
                                    </div>
                                    @error('customerNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="paymentNumber">Payment Number.</label>
                                        <input type="text" class="form-control" name="paymentNumber" >
                                    </div>
                                    @error('paymentNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    <div>
                                    <input type="submit" value="Save">
                                    </div>
                                </form>
                                </div>
                                    <a href="{{config('app.url')}}/order/show"><button>Cancel</button></a>
                                    </div>
                            </div>
    </div>

    </body>
</html>