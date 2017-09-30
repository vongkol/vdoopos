@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Table&nbsp;&nbsp;
                    <a href="{{url('/table')}}" class="btn btn-link btn-sm">Back To List</a>
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

                    <form action="{{url('/table/save')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">
                                Table Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" required autofocus name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section" class="control-label col-lg-2 col-sm-2">
                                Section
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="section" id="section" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="branch" class="control-label col-lg-2 col-sm-2">
                                Branch <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-control" id="branch" name="branch">
                                    @foreach($branches as $brn)
                                        <option value="{{$brn->id}}">{{$brn->name}}</option>
                                    @endforeach
                                </select>
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
@endsection