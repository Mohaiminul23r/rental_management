@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection

@section('button')
{{-- <button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRentalModal" id="addBtn"><i class="fas fa-plus text-success"></i> Add Renter Details</button> --}}
<a class="btn btn-white btn-border btn-round mr-2" id="add_renter_btn" href="{{ route('renters.create') }}"><i class="fas fa-plus text-success"></i> Add Renter Details</a>
@endsection
@section('card-title')
<b>List of Renter Details</b>
@endsection
@section('body')
	{{-- start modals --}}
    @include('renter.delete')
    @include('renter.view_info')
	{{-- end modals --}}

	<div class="table-responsive">
		<table id="renterDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
var renterDataTable = null;
var renterType = <?php echo json_encode($renterType)?>;
var city = <?php echo json_encode($city)?>;
var thana = <?php echo json_encode($thana)?>;
var country = <?php echo json_encode($country)?>;

window.addEventListener("load", function(){
	//removing form data
	$('#addRentalModal').on('hidden.bs.modal', function(){
	    $(this).find('form').trigger('reset');
	    $('#renter_add_form .has-error').removeClass('has-error');
        $('#renter_add_form').find('.help-block').empty();
	});

    //datepicker details
	$(function(){
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'yyyy-mm-dd',
		  });
	});
	//adding renter details
	$('#renterAddBtn').click(function(){
		$('#renter_add_form .has-error').removeClass('has-error');
        $('#renter_add_form').find('.help-block').empty();
		var renterForm = document.getElementById('renter_add_form');
	    var formData = new FormData(renterForm);
   	    formData.append('photo', document.getElementById('photo').files[0]);
   	    formData.append('nid_photo', document.getElementById('nid_photo').files[0]);
		axios.post('api/renters', formData).then(function(response){
			$('#renterDataTable').DataTable().ajax.reload();
			$('#addRentalModal').modal('hide');
			toastr.success('Renter Added Successfully');
		}).catch(function(failData){
			//utlt.cLog(arguments);
		  $.each(failData.response.data.errors, function(inputName, errors){
                $("#renter_add_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#renter_add_form [name="+inputName+"]").parent().find('.help-block').empty();

                    $.each(errors, function(indE, valE){
                        $("#renter_add_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                         $('.help-block').css("color", "red");
                    });
                }
                else{
                    $("#renter_add_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
		});
	});
	//end of adding renter details

	//getting renter type details
	$(document).on('click', '#addBtn', function(){
		html_city = '<option value="" disabled selected>Select City</option>';
		html_thana = '<option value="" disabled selected>Select Thana</option>';
		html_country     = '<option value="" disabled selected>Select Country</option>';
		html_renter_type = '<option value="" disabled selected>Select Renter Type</option>';
		$.each(renterType, function(ind,val){
			html_renter_type += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$.each(country, function(ind,val){
			html_country += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$.each(thana, function(ind,val){
			html_thana += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$.each(city, function(ind,val){
			html_city += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$('#renter_type_name').html(html_renter_type);
		$('#country_name').html(html_country);
		$('#thana_name').html(html_thana);
		$('#city_name').html(html_city);
	});

	//delete renter details
	$(document).on('click', '.delete-modal', function(){
		$('#id').val($(this).data('id'));
		$('#modalDelete').modal();
	});

	$('#deleteBtn').click(function(){
		var id = $('#id').val();
		axios.delete('api/renters'+'/'+id, {
			data: $('delete_form').serialize()
		}).then(function(resData){
			$('#renterDataTable').DataTable().ajax.reload();
			$('#modalDelete').modal('hide');
			toastr.warning('Renter Deleted Successfully.');	
		}).catch(function(failData){
			alert("Can not delete this Renter !!");
		});
	});
	//end of delete renter details

	//view renter details
	$(document).on('click', '.view-modal', function(){
		$('#view_renter_info_modal').modal('show');
		var view_id = $(this).data('id');
		axios.get('api/renters/info/'+ view_id).then(function(response){
			//$(document).find('#intro_div p').empty();
			if(typeof response.data != 'undefined' &&  response.data != null){
				$('#renter_name_1').text(response.data.first_name);
				$('#father_name_1').text(response.data.father_name);
				$('#mobile_1').text(response.data.mobile);

				if(typeof response.data.mother_name != 'undefined' && response.data.mother_name !=null){
					$('#mother_name_1').text(response.data.mother_name);
				}else{
					$('#mother_name_1').text("Null");
				}
				
				if(typeof response.data.date_of_birth != 'undefined' && response.data.date_of_birth !=null){
					$('#date_of_birth_1').text(response.data.date_of_birth);
				}else{
					$('#date_of_birth_1').text("Null");
				}
				
				if(typeof response.data.email != 'undefined' && response.data.email !=null){
					$('#email_1').text(response.data.email);
				}else{
					$('#email_1').text("Null");
				}

				if(typeof response.data.photo != 'undefined' && response.data.photo !=null && response.data.photo != ""){
					$('#renter_image_1').attr("src", response.data.photo);
				}else{
					$('#renter_image_1').attr("alt", "Renter Photo is Not Uploaded");
				}

				if(typeof response.data.nid_photo != 'undefined' && response.data.nid_photo !=null && response.data.nid_photo != ""){
					$('#nid_image_1').attr("src", response.data.nid_photo);
				}else{
					$('#nid_image_1').attr("alt", "NID is Not Uploaded");
				}

				if(typeof response.data.phone != 'undefined' && response.data.phone !=null){
					$('#phone_1').text(response.data.phone);
				}else{
					$('#phone_1').text("N/A");
				}
				
				if(typeof response.data.nid_no != 'undefined' && response.data.nid_no !=null){
					$('#nid_no_1').text(response.data.nid_no);
				}else{
					$('#nid_no_1').text("Null");
				}

				if(typeof response.data.gender != 'undefined' && response.data.gender !=null){
					$('#gender_1').text(response.data.gender);
				}else{
					$('#gender_1').text("Null");
				}

				if(response.data.status == '0'){
					$('#status_1').text("Not Active");
				}else if(response.data.status == '1'){
					$('#status_1').text("Active");
				}
			}
				
				if(typeof response.data.rentertype != 'undefined' &&  response.data.rentertype != null){
					$('#renter_type_1').text(response.data.rentertype.name);
				}else{
					$('#renter_type_1').text("Null");
				}

				if(typeof response.data.address != 'undefined' &&  response.data.address != null){

					$address = response.data.address.address_line1 + ', ' + response.data.address.thana.name + ', '+ 'Post- ' + response.data.address.postal_code +', ' + response.data.address.country.name;
					$('#address_1').text($address);
					$('#country_name_1').text(response.data.address.country.name);
				}else{
					$('#address_1').text("Null");
					$('#country_name_1').text("Null");
				}
		}).catch(function(failData){
			alert("Can not view renter details !!");
		});
	});
	
	//start of data table
	var renterDataTable = $('#renterDataTable').DataTable({

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
			var pageInfo = renterDataTable.page.info();
			return (ind.row + 1) + pageInfo.start;
		}
	},
	{
		'title' : 'OPT',
		'name' : 'opt',
		'data' : 'id',
		'width' : '40px',
		'render' : function(data, type, row, ind){
			$action_dropdown =	
				'<div class="dropdown show">'+
				  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
				  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
				    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
                    '<a href="'+utlt.siteUrl("edit_renter_info/"+data)+'" class="dropdown-item edit-modal" data-id = '+ data +'><i class="fa fa-edit text-secondary"></i> Edit Renter Details</a>'+
                    '<a class="dropdown-item view-modal" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
				  '</div>'+
				'</div>';
			return $action_dropdown;
		}
	},
	{
		'title' : 'Renter Name',
		'name' : 'renter_name',
		'data' : 'renter_name'
	},
	{
		'title' : 'Father Name',
		'name' : 'father_name',
		'data' : 'father_name'
	},
	{
		'title' : 'Modile No',
		'name' : 'mobile_no',
		'data' : 'mobile_no'
	},
	// {
	// 	'title' : 'Renter Photo',
	// 	'name' : 'photo',
	// 	'data' : 'photo',
	// 	'width': '30px',
 //        'render': function (data, type, row, ind) {
 //            return '<img height="50" width="45" class="avatar-img" src="'+data+'" alt="renter photo">';
 //        }
	// },
	{
		'title' : 'Active Status',
		'name' : 'status',
		'data' : 'status',
		'render': function (data, type, row, ind) {
            if(data == 1){
            	return "Active";
            }else{
            	return "Inactive";
            }
        }
	}
	],
	serverSide : true,
	processing : true,
	// responsive : true,
	ajax: {
		url: utlt.siteUrl('api/renters'),
		dataSrc: 'data'
	},
	});
	//end of data table
});	
</script>
@endsection