@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Unit List&nbsp;&nbsp;
                    <a href="{{url('/unit/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>En</th>
                                <th>Kh</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($units as $uni)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$uni->name}}</td>
                                    <td>{{$uni->quantity}}</td>
                                    <td>{{$uni->english_name}}</td>
                                    <td>{{$uni->khmer_name}}</td>
                                    <td>
                                        <a href="{{url('/unit/edit/'.$uni->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/unit/delete/'.$uni->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $units->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection