@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Table List&nbsp;&nbsp;
                    <a href="{{url('/table/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Table Name</th>
                                <th>Section</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($tables as $tbl)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tbl->name}}</td>
                                <td>{{$tbl->section}}</td>
                                <td>{{$tbl->brn_name}}</td>
                                <td>
                                    <a href="{{url('/table/edit/'.$tbl->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                    <a href="{{url('/table/delete/'.$tbl->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table><br>
                    {{ $tables->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection