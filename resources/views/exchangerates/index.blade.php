@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Exchange Rate &nbsp;&nbsp;
                    <a href="#" class="btn btn-link btn-sm" id="btnEdit">Edit</a>
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
    
                    <form action="{{url('/exchangerate/update')}}" class="form-horizontal" method="post" id="frm">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="rate" class="control-label col-lg-2 col-sm-2">
                                Exchange Rate &nbsp;<span class="text-primary"> $1.00 = </span>
                            </label>
                            <div class="col-lg-3 col-sm-3">
                                <input type="hidden" value="{{$exchangerates->id}}">
                                <input type="text" required autofocus name="rate" id="rate" class="form-control" disabled value="{{$exchangerates->rate}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit" disabled>Save</button>
                                <button class="btn btn-danger" type="button" disabled id="btnCancel">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
    // enable for edit
        $("#btnEdit").click(function (event) {
            event.preventDefault();
            $("#frm input, #frm button").removeAttr("disabled");
            $("#frm input").select();
        });
            
        $("#btnCancel").click(function () {
            $("#frm input, #frm button").attr("disabled", "disabled");
            location.reload();
        });
    });
</script>
@endsection
