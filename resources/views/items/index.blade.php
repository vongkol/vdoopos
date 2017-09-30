@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Item List&nbsp;&nbsp;
                    <a href="{{url('/item/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($items as $itm)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/item/view/'.$itm->id)}}" title="View">{{$itm->name}}</a></td>
                                    <td>{{$itm->cat_name}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$itm->image}}" width="65"/></td>
                                    <td>{{$itm->code}}</td>
                                    <td>
                                        <a href="{{url('/item/view/'.$itm->id)}}" title="View"><i class="fa fa-eye text-info"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/item/edit/'.$itm->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/item/delete/'.$itm->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>&nbsp;&nbsp;
                                        <i class="fa fa-heart-o text-danger"></i>&nbsp;&nbsp;
                                        <i class="fa fa-coffee text-warning"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection