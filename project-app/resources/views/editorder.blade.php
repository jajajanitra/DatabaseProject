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
                            <div class="card-header"><h1>Edit Order</h1></div>
                            <div class="card-body">
                            <form action="{{url('/order/update/'.$order->orderNumber)}}" method="post">
                                    <div class="form-group">
                                        <label for="orderNumberr">Order Number</label>
                                        <input type="text" class="form-control" name="orderNumber" value = "{{$order->orderNumber}}">                              
                                    </div>
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="shippedDate">shipped Date</label>
                                        <input type="text" class="form-control" name="shippedDate" value = "{{$order->shippedDate}}">
                                    </div>
                                    @error('shippedDate')
                                        <div>
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror
                                    <br>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" value="{{$order->status}}" >
                                            <option value="canceled">canceled</option>
                                            <option value="disputed ">disputed </option>
                                            <option value="n process">in process</option>
                                            <option value="on hold">on hold</option>
                                            <option value="resolved ">resolved </option>
                                            <option value="shipped" selected>shipped </option>
                                        </select>
                                    </div> 
                                    <br>
                                    <div class="form-group">
                                        <label for="comments">Comments</label>
                                        <input type="text" class="form-control" name="comments" value="{{$order->comments}}">
                                    </div>
                                    <br>
                                    <div>
                                    <input type="submit" value="update">
                                    </div>
                                </form>
                                </div>
                                    <a href="{{config('app.url')}}/order"><button>Cancel</button></a>
                                    </div>
                            </div>
    </div>

    </body>
</html>