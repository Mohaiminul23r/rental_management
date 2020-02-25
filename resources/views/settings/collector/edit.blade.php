@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-white btn-border btn-round mr-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-left text-success"></i> View Collector List</a>
@endsection
@section('card-title')
<b>Update Collector Information</b>
@endsection
@section('body')
<div class="container p-3 border" style="background: silver;">
	<div class="row">
		<form id="collector_edit_form" class="form-horizontal w-100" role="form" enctype="multipart/form-data">
			<div class="row">
				<input type="hidden" name="c_id" id="c_id" value="{{$collector_info->id}}">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Collector Name<span style="color: red;"> *</span></label>
						<input type="name" name="collector_name" class="form-control" placeholder="Enter Collector Name (*)" required autocomplete="off" value="{{$collector_info->collector_name}}">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Father's Name<span style="color: red;"> *</span></label>
						<input type="name" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name (*)" required autocomplete="off" value="{{$collector_info->father_name}}">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name" autocomplete="off" value="{{$collector_info->mother_name}}">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Email Address</label>
						<input type="name" name="email" class="form-control" id="email" placeholder="example@gmail.com" autocomplete="off" value="{{$collector_info->email}}">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Contact No.<span style="color: red;"> *</span></label>
						<input type="name" name="contact_no" class="form-control" id="phone" placeholder="Enter Contact Number" autocomplete="off" value="{{$collector_info->contact_no}}">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Gender</label><br/>
						<label class="form-radio-label">
							<input class="form-radio-input" type="radio" name="gender" value="Male" @if($collector_info->gender == "Male")checked @endif>
							<span class="form-radio-sign">Male</span>
						</label>
						<label class="form-radio-label ml-3">
							<input class="form-radio-input" type="radio" name="gender" value="Female" @if($collector_info->gender == "Female")checked @endif>
							<span class="form-radio-sign">Female</span>
						</label>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">NID No.</label>
						<input type="name" name="nid_no" class="form-control" id="nid_no" placeholder="Enter NID no." autocomplete="off" value="{{$collector_info->nid_no}}">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Date of Birth</label>
						<input type="text" class="form-control" data-toggle="datepicker" name="date_of_birth" placeholder="yyyy-mm-dd" autocomplete="off" value="{{$collector_info->date_of_birth}}">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					@php
						//dd($collector_info->present_address);
					@endphp
					<div class="form-group">
					    <label for="present_address">Present Address</label>
					    <textarea class="form-control" id="present_address" name="present_address" placeholder="Enter present address">{{$collector_info->present_address}}</textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					    <label for="permanent_address">Permanent Address</label>
					    <textarea class="form-control" id="permanent_address"  name="permanent_address" placeholder="Enter parmanent address">{{$collector_info->permanent_address}}</textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="status">Active Status</label>
						<select class="form-control form-control" id="status" name="status">
							<option value="" disabled selected>Select</option>
							<option value="1" @if($collector_info->status == 1)selected @endif>Active</option>
							<option value="0" @if($collector_info->status == 0)selected @endif>Inactive</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		<div style="text-align: right;">
			<button type="button"  style="margin-right:40px" id="collector_info_edit_btn" class="b btn btn-outline-success btn-outline-successs btn-round">Update Collector Info.</button>
		</div>	
		</form>
	</div>
</div>
@push('javascript')
<script type="text/javascript">
window.addEventListener("load",function(){
	//datepicker details
	$(function(){
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'yyyy-mm-dd',
		  });
	});
	$(document).on('click', '#collector_info_edit_btn', function(){
		var collector_id = $(document).find('#collector_edit_form input[name="c_id"]').val();
		var id = collector_id;	
		axios.put(''+utlt.siteUrl("api/collectors/"+id)+'', $('#collector_edit_form').serialize()).then(function(response){
    		window.location.href = utlt.siteUrl('collectors');
    		toastr.success("Information Updated Successfully..");
    	}).catch(function(failData){
	    		$.each(failData.response.data.errors, function(inputName, errors){
                $("#collector_edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#collector_edit_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#collector_edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                         $('.help-block').css("color", "red");
                    });
                }
                else{
                    $("#collector_edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
    	});
	});
});
</script>
@endpush
@endsection
