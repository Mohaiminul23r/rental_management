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
			<h3>Upload Documents</h3>
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
});
</script>
@endpush
@endsection
