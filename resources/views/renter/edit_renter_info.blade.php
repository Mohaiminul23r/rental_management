@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-white btn-border btn-round mr-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-left text-success"></i> View List</a>
@endsection
@section('card-title')
<b>Update Renter Information</b>
@endsection
@section('body')
<div class="container p-3 border" style="background: lavender;">
	<div class="row">
		<form id="edit_form" class="form-horizontal" role="form">
			<div class="row">
				<input type="hidden" name="r_id" id="r_id">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Renter Name<span style="color: red;"> *</span></label>
						<input type="name" name="renter_name" class="form-control" id="edit_renter_name" placeholder="Enter First Name (*)" required>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Father's Name<span style="color: red;"> *</span></label>
						<input type="name" name="father_name" class="form-control" id="edit_father_name" placeholder="Enter Father's Name (*)" required>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="edit_mother_name" placeholder="Enter Mother's Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Email Address</label>
						<input type="name" name="email" class="form-control" id="edit_email" placeholder="example@gmail.com">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Phone No.</label>
						<input type="name" name="phone_no" class="form-control" id="edit_phone" placeholder="Enter Phone Number">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mobile No.<span style="color: red;"> *</span></label>
						<input type="name" name="mobile_no" class="form-control" id="edit_mobile" placeholder="Enter Mobile Nmber (*)" required>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Occupation</label>
						<input type="name" name="occupation" class="form-control" id="edit_occupation" placeholder="Enter Profession">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Gender</label><br/>
						<label class="form-radio-label">
							<input class="form-radio-input" type="radio" name="gender" id="gender_male" value="Male" checked>
							<span class="form-radio-sign">Male</span>
						</label>
						<label class="form-radio-label ml-3">
							<input class="form-radio-input" type="radio" id="gender_female" name="gender" value="Female">
							<span class="form-radio-sign">Female</span>
						</label>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">NID No.</label>
						<input type="name" name="nid_no" class="form-control" id="edit_nid_no" placeholder="Enter NID no.">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nationality</label>
						<input type="name" class="form-control" id="edit_nationality" name="nationality" placeholder="Enter Nationality" value="Bangladeshi">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Date of Birth</label>
						<input type="text" class="form-control" id="edit_dob" data-toggle="datepicker" name="date_of_birth" placeholder="yyyy-mm-dd">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="rentertype">Renter Type</label>
						<select class="form-control form-control" id="edit_renter_type_2" name="renter_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					    <label for="present_address">Present Address</label>
					    <textarea class="form-control" id="edit_present_address" name="present_address" placeholder="Enter present address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="permanent_address">Permanent Address</label>
					    <textarea class="form-control" id="edit_permanent_address"  name="permanent_address" placeholder="Enter parmanent address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="status">Active Status</label>
						<select class="form-control form-control" id="edit_status" name="status">
							<option value="" disabled selected>Select</option>
							<option id="active" value="1">Active</option>
							<option id="inactive" value="0">Inactive</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		<div style="text-align: right;">
			<button type="button"  id="renter_info_edit_btn" class="btn btn-outline-success btn-outline-successs btn-round">Update Renter Info.</button>
		</div>	
		</form>
	</div>
</div>
@push('javascript')
<script type="text/javascript">
var renterType = <?php echo json_encode($renterType)?>;
var renter_id =  <?php echo json_encode($renter_id)?>;
window.addEventListener("load",function(){
	//appending renter types at select option
	html_renter_type = '<option value="" disabled selected>Select Renter Type</option>';
	$.each(renterType, function(ind,val){
		html_renter_type += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#edit_renter_type_2').html(html_renter_type);

	//datepicker details
	$(function(){
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'yyyy-mm-dd',
		  });
	});

	//edit renter details
	axios.get(''+utlt.siteUrl("api/get_added_renter_info/"+renter_id)+'').then(function(response){
		 $('#r_id').val(response.data.id);
		 $('#edit_renter_name').val(response.data.renter_name);
		 $('#edit_father_name').val(response.data.father_name);
		 $('#edit_mother_name').val(response.data.mother_name);
		 $('#edit_email').val(response.data.email);
		 $('#edit_phone').val(response.data.phone_no);
		 $('#edit_mobile').val(response.data.mobile_no);
		 $('#edit_nid_no').val(response.data.nid_no);
		 $('#edit_nationality').val(response.data.nationality);
		 $('#edit_dob').val(response.data.date_of_birth);
		 $('#edit_occupation').val(response.data.occupation);
		 $('#edit_present_address').val(response.data.present_address);
		 $('#edit_permanent_address').val(response.data.permanent_address);
		 if(response.data.status == 1){
		 	$('#active').attr("selected","selected");
		 }
		 if(response.data.status == 0){
		 	$('#inactive').attr("selected","selected");
		 }
		 if(response.data.gender == "Female"){
		 	$('#gender_female').attr("checked","checked");
		 }
		 if(response.data.gender == "Male"){
		 	$('#gender_male').attr("checked","checked");
		 }
		$.each(renterType, function(ind,val){
			if(val.id == response.data.renter_type_id){
				html_renter_type += '<option value="'+val.id+'" selected>'+val.name+'</option>';
			}else{
				html_renter_type += '<option value="'+val.id+'">'+val.name+'</option>';
			}
		});
		$('#edit_renter_type_2').html(html_renter_type);
	}).catch(function(failData){
		alert("Can not get submitted data !!");
	});

	//edit renter details when button is clicked
	$('#renter_info_edit_btn').click(function(){
		var renter_id = $(document).find('#edit_form input[name="r_id"]').val();
		var id = renter_id;
		axios.put(''+utlt.siteUrl("api/renters/"+id)+'', $('#edit_form').serialize())
		.then(function(response){
			$('#renterDataTable').DataTable().ajax.reload();
			window.location.href = utlt.siteUrl('renters');
            toastr.success('Renter Info. Updated Successfully'); 
		}).catch(function(failData){
				$.each(failData.response.data.errors, function(inputName, errors){
	            $("#edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
	            if(typeof errors == "object"){
	                $("#edit_form [name="+inputName+"]").parent().find('.help-block').empty();
	                $.each(errors, function(indE, valE){
	                    $("#edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
	                    $('.help-block').css("color", "red");
	                });
	            }else{
	                $("#edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
	            }
	        });
		});
	});
});
</script>
@endpush
@endsection
