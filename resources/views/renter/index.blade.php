@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection

@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addRentalModal" id="addBtn">Add Renter Details</button>
@endsection
@section('card-title')
<b>List of Renter Details</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('renter.add')
	@include('renter.edit')
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
		var renterForm = document.getElementById('renter_add_form');
	    var formData = new FormData(renterForm);
   	    formData.append('photo', document.getElementById('photo').files[0]);
   	    formData.append('nid_photo', document.getElementById('nid_photo').files[0]);
		axios.post('api/renters', formData).then(function(resData){
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

	//edit renter details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$('#editRentalModal').modal();
		$('#renter_edit_form .has-error').removeClass('has-error');
        $('#renter_edit_form').find('.help-block').empty();
		html_countries       = '<option value="" disabled selected>Select Country</option>';
		html_thanas          = '<option value="" disabled selected>Select Thana</option>';
		html_cities          = '<option value="" disabled selected>Select City</option>';
		html_renter_types    = '<option value="" disabled selected>Select Renter Type</option>';

		axios.get('api/renters/'+id+'/edit').then(function(response){
			console.log(response);
			$.each(country, function(ind,val){
				if(val.id == response.data.address.country_id){
					html_countries += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_countries += '<option value="'+val.id+'">'+val.name+'</option>';
				}	
			});
			$.each(thana, function(ind,val){
				if(val.id == response.data.address.thana_id){
					html_thanas += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_thanas += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$.each(city, function(ind,val){
				if(val.id == response.data.address.city_id){
					html_cities += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_cities += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$.each(renterType, function(ind,val){
				if(val.id == response.data.renter_type_id){
					html_renter_types += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_renter_types += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$('#add_country_name').html(html_countries);
			$('#add_thana_name').html(html_thanas);
			$('#add_city_name').html(html_cities);
			$('#type_name').html(html_renter_types);
			$('#add_first_name').val(response.data.first_name);
			$('#add_email').val(response.data.email);
			//$('#add_last_name').val(response.data.last_name);
			$('#add_father_name').val(response.data.father_name);
			$('#add_mother_name').val(response.data.mother_name);
			$('#add_phone').val(response.data.phone);
			$('#add_mobile').val(response.data.mobile);
			$('#add_nid_no').val(response.data.nid_no);
			$('#address_line').val(response.data.address.address_line1);
			$('#post_code').val(response.data.address.postal_code);
			// $('#add_photo').val(response.data.photo);
			$('#edit_nid_photo').attr("src", response.data.photo);
			$('#edit_renter_photo').attr("src", response.data.nid_photo);
			 $('#add_date_of_birth').val(response.data.date_of_birth);
			 if(response.data.status == 1){
			 	$('#active').attr("selected","selected");
			 }
			 if(response.data.status == 2){
			 	$('#inactive').attr("selected","selected");
			 }
			 if(response.data.gender == "Female"){
			 	$('#gender_female').attr("checked","checked");
			 }
			 if(response.data.gender == "Male"){
			 	$('#gender_male').attr("checked","checked");
			 }
		}).catch(function(failData){
			alert("Something wrong.");
		});

		$('#renterEditBtn').click(function(){
			axios.put('api/renters/'+id, $('#renter_edit_form').serialize())
			.then(function(response){
				$('#renterDataTable').DataTable().ajax.reload();
                $('#editRentalModal').modal('hide');
                toastr.success('Edited Successfully.'); 
			}).catch(function(failData){
				$.each(failData.response.data.errors, function(inputName, errors){
                $("#renter_edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#renter_edit_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#renter_edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#renter_edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
			});
		});
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
                    '<a class="dropdown-item edit-modal" data-id = '+ data +'><i class="fa fa-edit text-secondary"></i> Edit Renter Details</a>'+
                    '<a class="dropdown-item view-modal" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
				  '</div>'+
				'</div>';
			return $action_dropdown;
		}
	},
	{
		'title' : 'Renter Name',
		'name' : 'first_name',
		'data' : 'first_name'
	},
	{
		'title' : 'Father Name',
		'name' : 'father_name',
		'data' : 'father_name'
	},
	{
		'title' : 'Renter Type',
		'name' : 'renter_type',
		'data' : 'renterTypeName'
	},
	{
		'title' : 'Modile No',
		'name' : 'mobile',
		'data' : 'mobile'
	},
	{
		'title' : 'NID No.',
		'name' : 'nid_no',
		'data' : 'nid_no'
	},
	{
		'title' : 'Renter Photo',
		'name' : 'photo',
		'data' : 'photo',
		'width': '30px',
        'render': function (data, type, row, ind) {
            return '<img height="50" width="45" class="avatar-img" src="'+data+'" alt="something">';
        }
	},
	{
		'title' : 'Active Status',
		'name' : 'status',
		'data' : 'status',
		'render': function (data, type, row, ind) {
            if(data == 1){
            	return "Active";
            }else{
            	return "inactive";
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