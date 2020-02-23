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
<div class="container p-3 border" style="background: aliceblue;">
	<div class="row">
		<form id="add_form" class="form-horizontal" role="form" enctype="multipart/form-data">
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
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">NID No.</label>
						<input type="name" name="nid_no" class="form-control" id="nid_no" placeholder="Enter NID no." autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nationality</label>
						<input type="name" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" value="Bangladeshi">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Date of Birth</label>
						<input type="text" class="form-control" data-toggle="datepicker" name="date_of_birth" placeholder="yyyy-mm-dd" autocomplete="off">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="rentertype">Renter Type</label>
						<select class="form-control form-control" id="renter_type_2" name="renter_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					    <label for="present_address">Present Address</label>
					    <textarea class="form-control" id="present_address" name="present_address" placeholder="Enter present address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="permanent_address">Permanent Address</label>
					    <textarea class="form-control" id="permanent_address"  name="permanent_address" placeholder="Enter parmanent address"></textarea>
					    <span class="help-block"></span>
					 </div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="status">Active Status</label>
						<select class="form-control form-control" id="status" name="status">
							<option value="" disabled selected>Select</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		<div style="text-align: right;">
			<button type="button"  id="renter_info_add_btn" class="btn btn-outline-success btn-outline-successs btn-round">Save Renter Info.</button>
		</div>	
		</form>
	</div>
</div>
@push('javascript')
<script type="text/javascript">
var renterType = <?php echo json_encode($renterType)?>;
window.addEventListener("load",function(){
	//appending renter types at select option
	html_renter_type = '<option value="" disabled selected>Select Renter Type</option>';
	$.each(renterType, function(ind,val){
		html_renter_type += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#renter_type_2').html(html_renter_type);

	//datepicker details
	$(function(){
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'yyyy-mm-dd',
		  });
	});

	$(document).on('click', '#renter_info_add_btn', function(){
		$('#add_form .has-error').removeClass('has-error');
        $('#add_form').find('.help-block').empty();
		axios.post('api/renters', $('#add_form').serialize()).then(function(response){
    		window.location.href = utlt.siteUrl('renters');
    		toastr.success("Information Saved Successfully..");
    		// axios.get('api/get_renter_informaiton_id').then(function(response){
    		// 	var last_data = response.data.length-1;
    		// 	$.each(response.data, function(index, value){
    		// 		for(var i=0; i<response.data.length; i++){
    		// 			if(index == last_data){
    		// 				$('#renter_information_id').val(value.id);
    		// 				break;
    		// 			}
    		// 		}
    		// 	});
    		// }).catch(function(failData){
    		// 	alert("Failed to get renter informaiton id !!");
    		// });

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

	$(document).on('click', '#file_add_btn', function(){
		var file_add_form = document.getElementById('add_form');
	    var formData = new FormData(file_add_form);
   	    formData.append('added_file', document.getElementById('added_file').files[0]);
		axios.post('api/renters/add_file', formData).then(function(response){
			toastr.success("File added Successfully");
			get_files();
		}).catch(function(failData){
			alert("Failed to add file.");
		});
	});

	var table_row = '<tr>'+
				      '<th scope="row" id="sl_no"></th>'+
				      '<td><p id="file_type_row"></p></td>'+
				      '<td><p id="file_name_row"></p></td>'+
				      '<td><p id="file_row"></p></td>'+
				      '<td style="text-align: center;">'+
				      	'<a type="button" id="file_remove_btn" class="btn btn-warning btn-xs"><i class="fas fa-trash-alt text-white"></i></a>'+
				      '</td>'+
				    '</tr>';

	function get_files(){
		var id = $('#file_div').find("input#renter_information_id").val();
		axios.get('api/renters/added_files/'+id).then(function(response){
			$.each(response.data.files, function(index, value){
				$('#file_table_body').append(table_row);
				$('#file_type_row').text(value.file_type);
				$('#file_name_row').text(value.file_name);
				$('#file_row').text(value.file_path);
			});
		}).catch(function(failData){
			alert("Failed go get files.");
		});
	}
});
</script>
@endpush
@endsection
