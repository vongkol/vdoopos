@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Branch&nbsp;&nbsp;
                    <a href="{{url('/branch')}}" class="btn btn-link btn-sm">Back To List</a>
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

                    <form action="{{url('/branch/update')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$branch->id}}" id="id" name="id">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">
                                Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="name" id="name" class="form-control" value="{{$branch->name}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manager" class="control-label col-lg-2 col-sm-2">
                                Manager <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required name="manager" id="manager" class="form-control" value="{{$branch->manager}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-lg-2 col-sm-2">
                                Phone
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$branch->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-2 col-sm-2">
                                Address
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="address" id="address" class="form-control" value="{{$branch->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>                    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection