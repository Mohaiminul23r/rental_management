@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection

@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRentalModal" id="addBtn"><i class="fas fa-plus text-success"></i> Add Renter Details</button>
@endsection
@section('card-title')
<b>Add Renter Information</b>
@endsection
@section('body')
<div class="container p-3 my-3 border">
<form id="add_form" class="form-horizontal" role="form" enctype="multipart/form-data">
	<h3>Personal Info.</h3>
	<section>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="name">Renter Name</label>
				<input type="name" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
				<span class="help-block"></span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="name">Father's Name</label>
				<input type="name" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name">
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
				<input type="name" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="name">Mobile No.</label>
				<input type="name" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Nmber">
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
				<input type="name" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
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
				<select class="form-control form-control" id="renter_type_name" name="renter_type_id">
				</select>
				<span class="help-block"></span>
			</div>	
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
			    <label for="present_address">Present Address</label>
			    <textarea class="form-control" id="present_address" rows="5" placeholder="Enter present address"></textarea>
			 </div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
			    <label for="permanent_address">Permanent Address</label>
			    <textarea class="form-control" id="permanent_address" rows="5" placeholder="Enter parmanent address"></textarea>
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
	</section>
	<h3>Upload Documents</h3>
    <section>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="status">File Type</label>
				<select class="form-control form-control" id="document_type" name="document_type">
					<option value="" disabled selected>Select type</option>
					<option value="1">Renter Image</option>
					<option value="2">National Id Card</option>
					<option value="3">Aggrement Paper</option>
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
				<input type="file" class="form-control-file" id="upload_document" name="upload_document">
				<span class="help-block"></span>
			</div>
		</div>
	</div>
	<div class="row" style="text-align: right;">
		<div class="col-md-12">
			<button type="button" class="btn btn-info btn-round btn-sm"><i class="fas fa-plus text-white"></i> Add File</button>
		</div>
	</div>
	<div class="container p-3 my-3 border">
		<div class="row">
			<div class="table-responsive">
				<table id="filesDataTable" class="display table table-striped table-hover">
				</table>
			</div>
		</div>
	</div>
	</section>
</form>
</div>
</div>
@push('javascript')
<script type="text/javascript">
window.addEventListener("load",function(){
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

	//datatable value
	var filesDataTable = $('#filesDataTable').DataTable({
		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '40px',
			'align' : 'center',
			'render' : function(data, type, row, ind){
				var pageInfo = filesDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'File Type',
			'name' : 'file_type',
			'data' : 'file_type'
		},
		{
			'title' : 'File Name',
			'name' : 'file_name',
			'data' : 'file_name'
		},
		{
			'title' : 'File',
			'name' : 'uploaded_file',
			'data' : 'uploaded_file'
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '25px',
			'render' : function(data, type, row, ind){
				$action_dropdown =	
					'<div class="dropdown show">'+
					  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
					  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
					    // '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
					    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
	                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
					  '</div>'+
					'</div>';
				return $action_dropdown;
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/uploaded_files'),
			dataSrc: 'data'
		},
	});
	// end datatable
});
</script>
@endpush
@endsection
