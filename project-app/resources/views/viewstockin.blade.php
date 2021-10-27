@extends('layouts.management')

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
                    <article>  
                    <div> <a href="{{ config('app.url')}}/stock-inadd" class="addbtn-ali" style="text-decoration: none; position: absolute; left: 900px; top: 150px;"><button class="add-btn">add stockin</button></a></div>
                        <div class="headertext">Stock-in</div>
                        <div class="contenttext">
                            <table class="table-card" style="width: 750px;">
                                <thead class="table-header">
                                    <td style="width:150px; text-align:center;">stockInNumber</td>
                                    <td style="width:150px; text-align:center;">productCode</td>
                                    <td style="width:150px; text-align:center;">employeeNumber</td>
                                    <td style="width:150px; text-align:center;">quantityToOrder</td>
                                    <td style="width:150px; text-align:center;">date</td>
                                </thead>
                                <tbody>
                                    @foreach( $stockins as $stockin)
                                    <tr class="table-row">
                                        <td style="width:150px; text-align:center;">{{ $stockin ->stockInNumber}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->productCode}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->employeeNumber}}</td>
                                        <td style="width:150px; text-align:center;">{{ $stockin ->quantityToOrder }}</td>
                                        <td style="width:130px; text-align:center;">{{ $stockin ->date}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection