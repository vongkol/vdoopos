@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New Discount&nbsp;&nbsp;
                    <a href="{{url('/discount')}}" class="btn btn-link btn-sm">Back To List</a>
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
                    <div class="row">
                        <div class="col-lg-2">
			                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
				                <a class="nav-link active" id="v-pills-period-tab" data-toggle="pill" href="#v-pills-period" role="tab" aria-controls="v-pills-period" aria-expanded="true">Discount By Period</a>
				                <a class="nav-link" id="v-pills-member-tab" data-toggle="pill" href="#v-pills-member" role="tab" aria-controls="v-pills-member" aria-expanded="true">Membership</a>
				                <a class="nav-link" id="v-pills-coupon-tab" data-toggle="pill" href="#v-pills-coupon" role="tab" aria-controls="v-pills-coupon" aria-expanded="true">Coupon</a>
			                </div>
		                </div>
                        <div class="col-lg-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-period" role="tabpanel" aria-labelledby="v-pills-period-tab" style="padding: 0px !important">
                                    <label> <i class="fa fa-align-justify"></i> <strong>Discount By Peroid</strong></label>
									<div class="form-group row">
										 <label for="branch" class="control-label col-lg-2 col-sm-2">
                                            Branch <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <select class="form-control">
												<option>Phnom Penh</option>
												<option>Sihanouk Ville</option>
											</select>
                                        </div>
                                        <label for="description" class="control-label col-lg-2 col-sm-2">
                                            Description
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="text" name="description" id="description" class="form-control">
                                        </div>
									</div>
                                    <div class="form-group row">
                                        <label for="startdate" class="control-label col-lg-2 col-sm-2">
                                            Start Date <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="date" name="startdate" id="startdate" class="form-control">
                                        </div>
                                        <label for="enddate" class="control-label col-lg-2 col-sm-2">
                                            End Date <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="date" name="enddate" id="enddate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="chktime">
                                            With Specific Time
                                        </label>                                      
                                    </div> 
                                    <div class="form-group row">
                                        <label for="starttime" class="control-label col-lg-2 col-sm-2">
                                            Start Time <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="time" name="starttime" id="starttime" class="form-control" disabled>
                                        </div>
                                        <label for="endtime" class="control-label col-lg-2 col-sm-2">
                                            End Time <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="time" name="endtime" id="endtime" class="form-control" disabled>
                                        </div>
                                    </div>                             
                                    <div class="form-group row">
                                        <label for="discount" class="control-label col-lg-2 col-sm-2">
                                            Discount (%)<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-3 col-sm-3">
                                            <input type="text" required name="discount" id="discount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                                        <div class="col-lg-6 col-sm-8">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-danger" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="v-pills-member" role="tabpanel" aria-labelledby="v-pills-member-tab" style="padding: 0px !important">
                                    <label> <i class="fa fa-align-justify"></i> <strong>Discount By Membership</strong></label>
                                </div>
                                <div class="tab-pane fade show" id="v-pills-coupon" role="tabpanel" aria-labelledby="v-pills-coupon-tab" style="padding: 0px !important">
                                    <label> <i class="fa fa-align-justify"></i> <strong>Discount By Coupon</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section('js')
	<script src="{{asset('js/discount.js')}}"></script>
@endsection