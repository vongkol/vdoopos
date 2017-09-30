@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Item&nbsp;&nbsp;
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
                        action="{{url('/item/save')}}" 
                        class="form-horizontal" 
                        method="post"
                        enctype="multipart/form-data"
                    >
                        {{csrf_field()}} 
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">
                                Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-4">
                                <input type="text" autofocus required name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cat" class="control-label col-lg-2 col-sm-2">
                                Category <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-4">
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="control-label col-lg-2 col-sm-2">
                                Code
                            </label>
                            <div class="col-lg-6 col-sm-4">
                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="control-label col-lg-2 col-sm-2">
                                Description
                            </label>
                            <div class="col-lg-6 col-sm-4">
                                <input type="text" name="description" id="description" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="control-label col-lg-2 col-sm-2">Image</label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="image" id="image" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                <img src="" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection