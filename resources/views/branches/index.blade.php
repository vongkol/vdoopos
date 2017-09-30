@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Branch List&nbsp;&nbsp;
                    <a href="{{url('/branch/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Branch</th>
                                <th>Manager</th>
                                <th>Phone</th>                                 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($branches as $bra)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$bra->name}}</td>
                                    <td>{{$bra->manager}}</td>
                                    <td>{{$bra->phone}}</td>
                                    <td>
                                        <a href="{{url('/branch/edit/'.$bra->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/branch/delete/'.$bra->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $branches->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection