@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Size List&nbsp;&nbsp;
                    <a href="{{url('/size/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Size</th>
                                <th>Kh</th> 
                                <th>Abbreviation</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($sizes as $siz)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$siz->name}}</td>
                                    <td>{{$siz->khmer_name}}</td>
                                    <td>{{$siz->abbreviation}}</td>
                                    <td>
                                        <a href="{{url('/size/edit/'.$siz->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/size/delete/'.$siz->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $sizes->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection