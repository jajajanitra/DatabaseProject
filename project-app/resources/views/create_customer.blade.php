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
                        <div class="headertext">Add new customer</div>
                        <div class="contenttext">
                        <form action="{{url('/customer/add')}}" method="post">                            
                        @csrf
                        <table>
                        <tbody>
                        <tr>
                        <td>
                            <table>
                                    <tbody>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="customerName">Customer Name</label>
                                                </td>
                                                <td style="width:200px; text-align:right;  padding-left:20px;">
                                                <input type="text" class="form-control" name="customerName">                                                                            
                                                    @error('customerName')
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>                    
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="contactLastName">Contact LastName</label>
                                                </td>
                                                <td style="width:200px; text-align:right;  padding-left:20px;">
                                                <input type="text" class="form-control" name="contactLastName">
                                                @error('contactLastName')
                                                    <div>
                                                        <span>{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="contactFirstName">Contact FirstName</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="contactFirstName">
                                                </td>
                                                    @error('contactFirstName')
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="phone">Phone</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="phone">
                                                    @error('phone')
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="addressLine1">Address1</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="addressLine1">
                                                @error('addressLine1')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="addressLine2">Address2</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="addressLine2">
                                                    @error('addressLine2')
                                                        <div>
                                                            <span class="text-danger">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-top: 10px;">
                                    <table>
                                        <tbody> 
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="city">City</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="city">
                                                @error('city')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="state">State</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="state">
                                                @error('state')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="postalCode">Postal Code</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="postalCode">
                                                @error('postalCode')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="country">Country</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="country">
                                                @error('country')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="salesRepEmployeeNumber">SalesRep</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="salesRepEmployeeNumber">
                                                @error('salesRepEmployeeNumber')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="creditLimit">Credit Limit.</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="creditLimit">
                                                @error('creditLimit')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px; text-align:right;">
                                                <label for="points">Points.</label>
                                                </td>
                                                <td style="width:200px; text-align:right; padding-left:20px;">
                                                <input type="text" class="form-control" name="points">
                                                @error('points')
                                                    <div>
                                                        <span class="text-danger">{{$message}}</span>
                                                    </div>
                                                @enderror
                                                </td>
                                            </tr>
                                        </tbody>    
                                    </table>
                                </td>
                                </tr>
                                </tbody>
                            </table>
                                    <input type="submit" value="update" class="submit-btn" style="position: absolute; left: 995px; top: 520px;">
                        </form>
                                    <a href="config('app.url')}}/customer" style=" text-decoration: none;"><button class="cancel-btn" style=" position: absolute; left: 870px; top: 520px;">Cancel</button></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection