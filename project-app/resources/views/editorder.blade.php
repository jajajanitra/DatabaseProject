@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <nav>
                        <div class="nav-header">Management</div>
                        <p class="menubar1"></p>
                        <a href="{{ url('/stock-in') }}" class="nav-subheader-1">stock-in</a>
                        <p class="submenubar1" style></p>
                        <a href="{{ url('/stock-inadd') }}" class="nav-sub-subheader-1">add stock-in</a>
                        <p class="submenubar2" style></p>
                        <a href="{{ url('/stock-in/products') }}" class="nav-sub-subheader-2">edit product</a>
                        <p class="menubar2" style></p>
                        <a href="{{ url('/order') }}" class="nav-subheader-2">order</a>
                        <p class="menubar3" style></p>
                        <a href="{{ url('/customer') }}" class="nav-subheader-3">customer</a>
                        <p class="menubar4" style></p>
                        <a href="{{ url('/employee') }}" class="nav-subheader-4">employee</a>
                        <p class="submenubar3" style></p>
                        <a href="{{ url('/erm/' .Auth::user()->username) }}" class="nav-sub-subheader-3">ERM</a>
                    </nav>
                    <article>  
                        <div class="headertext">Edit order detail</div>
                        <div class="contenttext">
                        <form action="{{url('/order/update/'.$order->orderNumber)}}" method="post">
                            <table style="margin-left: 200px; margin-top: 10px;">
                                    <tbody>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="orderNumberr">Order Number</label>
                                                </td>
                                                <td style="width:200px; text-align:right;  padding-left:20px;">
                                                <input type="text" class="input-box" name="orderNumber" value = "{{$order->orderNumber}}" readonly style="width:200px;">                              
                                                </td>
                                            </tr>
                                            @csrf
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="shippedDate">shipped Date</label>
                                                </td>
                                                <td style="width:200px; text-align:right;  padding-left:20px;">
                                                <input type="text" class="input-box" name="shippedDate" value = "{{$order->shippedDate}}" style="width:200px;">
                                                @error('shippedDate')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="status">Status</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                    <select name="status" value="{{$order->status}}" class="form-select" style="width:200px; border: 1px solid #EEEEEE; box-sizing: border-box; border-radius: 15px; color:#7E7E7E;">
                                                        <option value="canceled">canceled</option>
                                                        <option value="disputed ">disputed </option>
                                                        <option value="n process">in process</option>
                                                        <option value="on hold">on hold</option>
                                                        <option value="resolved ">resolved </option>
                                                        <option value="shipped" selected>shipped </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="comments">Comments</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="input-box" name="comments" value="{{$order->comments}}"  style="width:200px;">
                                                </td>
                                            </tr>
                                    </tbody>
                            </table>
                                    <input type="submit" value="update" class="submit-btn" style="position: absolute; left: 800px; top: 370px;">
                        </form>
                                    <a href="{{config('app.url')}}/order" style=" text-decoration: none;"><button class="cancel-btn" style=" position: absolute; left: 675px; top: 370px;">Cancel</button></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection