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
                            <div class="card-header"><h1>Customer Form</h1></div>
                            <div class="card-body">
                                <form action="{{url('/customer/add')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="customerNumber">Customer Number</label>
                                        <input type="text" class="form-control" name="customerNumber">
                                    </div>
                                    @error('customerNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="customerName">Customer Name</label>
                                        <input type="text" class="form-control" name="customerName">
                                    </div>
                                    @error('customerName')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="contactLastName">Contact</label>
                                        <input type="text" class="form-control" name="contactLastName">
                                    </div>
                                    @error('contactLastName')
                                        <div>
                                            <span>{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="contactFirstName"></label>
                                        <input type="text" class="form-control" name="contactFirstName">
                                    </div>
                                    @error('contactFirstName')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    @error('phone')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="addressLine1">Address</label>
                                        <input type="text" class="form-control" name="addressLine1">
                                    </div>
                                    @error('addressLine1')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="addressLine2">Address</label>
                                        <input type="text" class="form-control" name="addressLine2">
                                    </div>
                                    @error('addressLine2')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city">
                                    </div>
                                    @error('city')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state">
                                    </div>
                                    @error('state')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="postalCode">Postal Code</label>
                                        <input type="text" class="form-control" name="postalCode">
                                    </div>
                                    @error('postalCode')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country">
                                    </div>
                                    @error('country')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="salesRepEmployeeNumber">SalesRep</label>
                                        <input type="text" class="form-control" name="salesRepEmployeeNumber">
                                    </div>
                                    @error('salesRepEmployeeNumber')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="creditLimit">Credit Limit.</label>
                                        <input type="text" class="form-control" name="creditLimit">
                                    </div>
                                    @error('creditLimit')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="points">Points.</label>
                                        <input type="text" class="form-control" name="points">
                                    </div>
                                    @error('points')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    <div>
                                    <input type="submit" value="Add">
                                    </div>
                                </form>
                                </div>
                                    <a href="{{ config('app.url')}}/customer"><button>Cancel</button></a>
                                    </div>
                            </div>
    </div>
    </body>
</html>
