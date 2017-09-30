@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Customer List&nbsp;&nbsp;
                    <a href="{{url('/customer/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Card &numero;</th>
                                <th>Discount (%)</th>
                                <th>Points</th>
                                <th>Bonus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($customers as $cus)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cus->name}}</td>
                                <td>{{$cus->address}}</td>
                                <td>{{$cus->phone}}</td>
                                <td>{{$cus->card_number}}</td>
                                <td>{{$cus->discount}}</td>
                                <td>{{$cus->point}}</td>
                                <td>{{$cus->bonus}}</td>
                                <td>
                                    <a href="{{url('/customer/edit/'.$cus->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/customer/delete/'.$cus->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table><br>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection