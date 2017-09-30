@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i>Item&nbsp;&nbsp;
                    <a href="{{url('/item')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form 
                        class="form-horizontal" 
                    >
                        {{csrf_field()}} 
                        <div class="form-group row">
                            <label for="name" class="control-label label col-lg-1 col-sm-1 text-primary">
                                Name
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <span>{{$item->name}}</span>
                            </div>
                            <div class="col-lg-5 col-sm-5">
                                <img src="{{URL::asset('/img/').'/'.$item->image}}" width="150" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cat" class="control-label label col-lg-1 col-sm-1 text-primary">
                                Category
                            </label>
                            <div class="col-lg-4 col-sm-3">
                                <span>
                                    {{$item->cat_name}}
                                </span>     
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="control-label label col-lg-1 col-sm-1 text-primary">
                                Code
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <span>{{$item->code}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="control-label label col-lg-1 col-sm-1 text-primary">
                                Description
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <span>{{$item->description}}</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Item Detail List&nbsp;&nbsp;
                    <button class="btn btn-link btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">New</button>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Cost</th>
                                <th>Discount</th>
                                <th>Point</th>
                                <th>Free Able</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($item_details as $ite)
                                <tr id="{{$ite->i_d_id}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$ite->name}}</td>
                                    <td>{{$ite->price}}</td>
                                    <td>{{$ite->cost}}</td>
                                    <td>{{$ite->discount}}</td>
                                    <td>{{$ite->point}}</td>
                                    <td>{{ $ite->free_able === 1 ? "YES" : "NO" }}</td>
                                    <td>
                                        <a href="#" id="btnEditItemDetail" onclick="editItemDetail(obj, evt)" data-toggle="modal" data-target=".bd-example-modal-lg" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href='#' onclick="deleteItem(this, event)" title="Delete" ><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <script>
        var item_id = '{{$item->id}}';
    </script>
@endsection
@section('js')
    <script src="{{asset('js/add_item.js')}}"></script>
    <script src="{{asset('js/add_size.js')}}"></script>
    <script src="{{asset('js/save_item_detail.js')}}"></script>
    <script src="{{asset('js/edit_item_detail.js')}}"></script>
    <script src="{{asset('js/delete_item_detail.js')}}"></script>
@endsection
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">New Item Detail</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="itemDetail" class="form-horizontal" method="post">
                <input type="hidden" id="item" name="item">
                <div class="row">
                    <label for="" class="control-label col-lg-2 col-sm-2">Size<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-sm-4">
                        <select name="size" id="size" class="form-control"> 
                        </select>
                    </div>
                    <label for="free_able" class="control-label col-lg-2 col-sm-2">Free Able</label>
                    <div class="col-lg-4 col-sm-4">
                        <select name="free_able" id="free_able" class="form-control">
                            <option value="0">No</option> 
                            <option value="1">Yes</option> 
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <label for="price" class="control-label col-lg-2 col-sm-2">Price <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-sm-4">
                        <input type="number" step="0.1" required name="price" id="price" class="form-control">
                    </div>
                    <label for="cost" class="control-label col-lg-2 col-sm-2">Cost</label>
                    <div class="col-lg-4 col-sm-4">
                        <input type="number" step="0.1" name="cost" id="cost" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label for="discount" class="control-label col-lg-2 col-sm-2">Discount %</label>
                    <div class="col-lg-4 col-sm-4">
                        <input type="number"step="0.1"  name="discount" id="discount" class="form-control">
                    </div>
                    <label for="point" class="control-label col-lg-2 col-sm-2">Point</label>
                    <div class="col-lg-4 col-sm-4">
                        <input type="number" step="0.1" name="point" id="point" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <center class="text-success">
                            <b id="success_add_item"></b>
                        </center>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="save_item_detail" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>