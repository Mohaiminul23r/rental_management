@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-white btn-border btn-round mr-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-left text-success"></i> Back</a>
@endsection
@section('card-title')
<b>Add Renter Information</b>
@endsection
@section('body')
<div class="container p-3 my-3 border">
	<div class="row">
		<form id="add_form" class="form-horizontal" role="form" enctype="multipart/form-data">
			<h3>Personal Info.</h3>
			<section>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Renter Name<span style="color: red;"> *</span></label>
						<input type="name" name="renter_name" class="form-control" id="renter_name" placeholder="Enter First Name (*)" required>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Father's Name<span style="color: red;"> *</span></label>
						<input type="name" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name (*)" required>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Email Address</label>
						<input type="name" name="email" class="form-control" id="email" placeholder="example@gmail.com">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Phone No.</label>
						<input type="name" name="phone_no" class="form-control" id="phone" placeholder="Enter Phone Number">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Mobile No.<span style="color: red;"> *</span></label>
						<input type="name" name="mobile_no" class="form-control" id="mobile" placeholder="Enter Mobile Nmber (*)" required>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Occupation</label>
						<input type="name" name="occupation" class="form-control" id="occupation" placeholder="Enter Profession">
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
						<input type="name" name="nid_no" class="form-control" id="nid_no" placeholder="Enter NID no.">
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
						<input type="text" class="form-control" data-toggle="datepicker" name="date_of_birth" placeholder="yyyy-mm-dd">
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
			<div style="text-align: center;">
				<button type="button" id="renter_info_add_btn" class="btn btn-info btn-sm btn-round">Save Renter Information</button>
			</div>
			</section>
			<h3>Upload Documents</h3>
		    <section>
			<div class="row" id="file_div">
				<input type="hidden" name="renter_information_id" id="renter_information_id" value="null">
				<div class="col-md-4">
					<div class="form-group">
						<label for="status">File Type</label>
						<select class="form-control form-control" id="file_type" name="file_type">
							<option value="" disabled selected>Select type</option>
							<option value="1">Renter Image</option>
							<option value="2">National Id Card</option>
							<option value="3">Aggrement Paper</option>
							<option value="4">Other paper</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">File Name</label>
						<input type="name" class="form-control" id="file_name" name="file_name" placeholder="Enter file name">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="photo" id="label">Upload File</label>
						<input type="file" class="form-control-file" id="added_file" name="file" required>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row" style="text-align: right;">
				<div class="col-md-12">
					<button type="button" id="file_add_btn" class="btn btn-info btn-round btn-sm"><i class="fas fa-plus text-white"></i> Add File</button>
				</div>
			</div>
			<div class="container p-3 my-3 border">
				<h5 style="text-align: center;"><b>List of Uploaded Files</b></h5>
				<div class="table table-bordered table-responsive">
					<table class="table" style="width: 100%;">
					  <thead>
					    <tr>
					      <th scope="col" style="width: 10%;">SL</th>
					      <th scope="col" style="width: 25%;">File Type</th>
					      <th scope="col" style="width: 25%;">File Name</th>
					      <th scope="col" style="width: 25%;">File</th>
					      <th scope="col" style="width: 15%;">Action</th>
					    </tr>
					  </thead>
					  <tbody id="file_table_body">
					    
					  </tbody>
					</table>
				</div>
			</div>
			</section>
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

	// adding renter informaiton step by step
	var form = $("#add_form");
	form.steps({
	    headerTag: "h3",
	    bodyTag: "section",
	    transitionEffect: "slideLeft",
	    onStepChanging: function (event, currentIndex, newIndex)
	    {
	    	return true;
	    },
	    onFinishing: function (event, currentIndex)
	    {
	       
	    },
	    onFinished: function (event, currentIndex)
	    {
	       
	    }
	});

	$(document).on('click', '#renter_info_add_btn', function(){
		$('#add_form .has-error').removeClass('has-error');
        $('#add_form').find('.help-block').empty();
		axios.post('api/renters', $('#add_form').serialize()).then(function(response){
    		toastr.success("Information Saved Successfully..");
    		axios.get('api/get_renter_informaiton_id').then(function(response){
    			var last_data = response.data.length-1;
    			$.each(response.data, function(index, value){
    				for(var i=0; i<response.data.length; i++){
    					if(index == last_data){
    						$('#renter_information_id').val(value.id);
    						break;
    					}
    				}
    			});
    		}).catch(function(failData){
    			alert("Failed to get renter informaiton id !!");
    		});
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
				console.log(value);
				$('#file_table_body').append(table_row);
				$('#file_type_row').text(value.file_type);
				$('#file_name_row').text(value.file_name);
				$('#file_row').text(value.file_path);
			});
		}).catch(function(failData){
			alert("Failed go get files.");
		});
	}
	
	// //datatable value
	// var filesDataTable = $('#filesDataTable').DataTable({
	// 	dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
	// 	initComplete : function(){

	// 	},
	// 	lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
	// 	columns : [
	// 	{
	// 		'title' : '#SL',
	// 		'name' : 'SL',
	// 		'data' : 'id',
	// 		'width' : '40px',
	// 		'align' : 'center',
	// 		'render' : function(data, type, row, ind){
	// 			var pageInfo = filesDataTable.page.info();
	// 			return (ind.row + 1) + pageInfo.start;
	// 		}
	// 	},
	// 	{
	// 		'title' : 'File Type',
	// 		'name' : 'file_type',
	// 		'data' : 'file_type'
	// 	},
	// 	{
	// 		'title' : 'File Name',
	// 		'name' : 'file_name',
	// 		'data' : 'file_name'
	// 	},
	// 	{
	// 		'title' : 'File',
	// 		'name' : 'uploaded_file',
	// 		'data' : 'uploaded_file'
	// 	},
	// 	{
	// 		'title' : 'OPT',
	// 		'name' : 'opt',
	// 		'data' : 'id',
	// 		'width' : '25px',
	// 		'render' : function(data, type, row, ind){
	// 			$action_dropdown =	
	// 				'<div class="dropdown show">'+
	// 				  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
	// 				  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
	// 				    // '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
	// 				    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
	//                     '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
	// 				  '</div>'+
	// 				'</div>';
	// 			return $action_dropdown;
	// 		}
	// 	}
	// 	],
	// 	serverSide : true,
	// 	processing : true,
	// 	ajax: {
	// 		url: utlt.siteUrl('api/uploaded_files'),
	// 		dataSrc: 'data'
	// 	},
	// });
	// // end datatable
});
</script>
@endpush
@endsection
