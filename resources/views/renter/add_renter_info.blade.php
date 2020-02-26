@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-white btn-border btn-round mr-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-left text-success"></i> View List</a>
@endsection
@section('card-title')
<b>Add Renter Information</b>
@endsection
@section('body')
<div class="container p-3 border">
	<div class="wizard-content">
		<form id="add_form" class="tab-wizard wizard-circle wizard" role="form" enctype="multipart/form-data">
			<!-- Step 1 -->
			<h5>Renter Info.</h5>
			<section>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Renter Name<span style="color: red;"> *</span></label>
						<input type="name" name="renter_name" class="form-control" id="renter_name" placeholder="Enter First Name (*)" required autocomplete="off">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Father's Name<span style="color: red;"> *</span></label>
						<input type="name" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name (*)" required autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name" autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Email Address</label>
						<input type="name" name="email" class="form-control" id="email" placeholder="example@gmail.com" autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Phone No.</label>
						<input type="name" name="phone_no" class="form-control" id="phone" placeholder="Enter Phone Number" autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mobile No.<span style="color: red;"> *</span></label>
						<input type="name" name="mobile_no" class="form-control" id="mobile" placeholder="Enter Mobile Nmber (*)" required autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Occupation</label>
						<input type="name" name="occupation" class="form-control" id="occupation" placeholder="Enter Profession" autocomplete="off">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Gender</label><br/>
						<label class="form-radio-label">
							<input class="form-radio-input" type="radio" name="gender" value="Male" checked>
							<span class="form-radio-sign">Male</span>
						</label>
						<label class="form-radio-label ml-3">
							<input class="form-radio-input" type="radio" name="gender" value="Female">
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
						<input type="name" name="nid_no" class="form-control" id="nid_no" placeholder="Enter NID no." autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Nationality</label>
						<input type="name" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" value="Bangladeshi">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="date_of_birth">Date Of Birth</label>
					    <input type="text" name="date_of_birth" class="form-control pick-date" id="date_of_birth" placeholder="yyyy-mm-dd" autocomplete="off">
					    <span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="present_address">Present Address</label>
					    <textarea class="form-control" id="present_address" name="present_address" placeholder="Enter present address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="permanent_address">Permanent Address</label>
					    <textarea class="form-control" id="permanent_address"  name="permanent_address" placeholder="Enter parmanent address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
			</div>
		</section>
		<!-- Step 2 -->
		<h5>Rent Details</h5>
		<section>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Renter Type</label>
						<select class="form-control" id="renter_type_dropdown" name="renter_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Complex Name</label>
						<select class="form-control" id="complex_dropdown" name="complex_id">
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Advance Paid Amount</label>
						<input type="number" class="form-control" id="advance_amount" name="advance_amount" placeholder="advance amount" value="0.00">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="rent_started_at">Activation Date</label>
					    <input type="text" name="rent_started_at" class="form-control pick-date" id="activation_date" placeholder="yyyy-mm-dd" autocomplete="off">
					    <span class="help-block"></span>
					</div>
				</div>
			</div>
		</section>
		{{-- step-3 --}}
		<h5>Utility Bill</h5>
		<section>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="name">Select Bill Type</label>
					<select class="form-control" id="bill_type_dropdown" name="bill_type">
					</select>
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="number">Amount</label>
					<input type="number" class="form-control add-bill" name="house_rent" value="0.00" placeholder="house rent">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-3">
				<button type="button" style="margin-top: 45px;" id="file_add_btn2" class="btn btn-xs btn-dark"><i class="fas fa-plus text-white"></i></button>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>
		</section>
		<h5>Upload Files</h5>
		<section>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="status">File Type</label>
					<select class="form-control form-control" id="file_type" name="file_type">
						<option value="" disabled selected>Select type</option>
						<option value="1">Renter Photo</option>
						<option value="2">National Id Card</option>
						<option value="3">Aggrement Paper</option>
						<option value="4">Other Paper</option>
					</select>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="name">File Name</label>
					<input type="name" class="form-control" id="file_name" name="file_name" placeholder="Enter file name">
					<span class="help-block"></span>
				</div>
			</div>				
			<div class="col-md-3">
				<div class="form-group">
					<label for="photo" id="label">Upload File</label>
					<input type="file" class="form-control-file" id="added_file" name="file" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="col-md-3">
				<button type="button" style="margin-top: 35px;" id="file_add_btn" class="btn btn-xs btn-dark"><i class="fas fa-plus text-white"></i></button>
			</div>
		</div>
		</section>		
		</form>
	</div>
</div>
@push('javascript')
<link href="{{ asset('assets/jquery-steps/build/jquery.steps.css') }}" rel="stylesheet">
<script type="text/javascript">
var renterType = <?php echo json_encode($renterType)?>;
var billTypes = <?php echo json_encode($billTypes)?>;
var complexes = <?php echo json_encode($complexes)?>;
window.addEventListener("load",function(){
	$(function(){
        $('.pick-date').datetimepicker({
        	timepicker:false,
        	format: 'Y-m-d'
        });
    });
	//appending renter types at select option
	html_renter_type = '<option value="" disabled selected>Select Renter Type</option>';
	html_bill_type = '<option value="" disabled selected>Select Bill Type</option>';
	html_complexes = '<option value="" disabled selected>Select Complex</option>';
	$.each(renterType, function(ind,val){
		html_renter_type += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(billTypes, function(ind,val){
		html_bill_type += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(complexes, function(ind,val){
		html_complexes += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#renter_type_dropdown').html(html_renter_type);
	$('#bill_type_dropdown').html(html_bill_type);
	$('#complex_dropdown').html(html_complexes);

	var form = $("#add_form");
	form.steps({
		headerTag: "h5",
		bodyTag: "section",
		transitionEffect: "fade",
		enableAllSteps: true,
		labels: {
			finish: "Save & Exit",
			next: "Save & Next",
    		previous: "Previous",
		},
	});

	$(document).on('click', '#renter_info_add_btn', function(){
		$('#add_form .has-error').removeClass('has-error');
        $('#add_form').find('.help-block').empty();
		axios.post('api/renters', $('#add_form').serialize()).then(function(response){
    		window.location.href = utlt.siteUrl('renters');
    		toastr.success("Information Saved Successfully..");
    	}).catch(function(failData){
	    		$.each(failData.response.data.errors, function(inputName, errors){
                $("#add_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#add_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#add_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                         $('.help-block').css("color", "red");
                    });
                }
                else{
                    $("#add_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
    	});
	});
});
</script>
@endpush
@endsection
