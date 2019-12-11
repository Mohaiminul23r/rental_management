@extends('layouts.master')
@section('pagetitle')
	Renter Details
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Renter</a>
	</li>
@endsection
@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Renters List</h4>
		</div>
	</div>
	<div class="card-body">
		{{-- start modals --}}
		@include('renter.add')
		@include('renter.edit')
        @include('renter.delete')
		{{-- end modals --}}
		<div class="table-responsive">
			<table id="renterDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
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
			$('#add_last_name').val(response.data.last_name);
			$('#add_father_name').val(response.data.father_name);
			$('#add_mother_name').val(response.data.mother_name);
			$('#add_phone').val(response.data.phone);
			$('#add_mobile').val(response.data.mobile);
			$('#add_nid_no').val(response.data.nid_no);
			$('#address_line').val(response.data.address.address_line1);
			$('#post_code').val(response.data.address.postal_code);
			// $('#add_photo').val(response.data.photo);
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
		$('#deleteBtn').click(function(){
			var id = $('#id').val();
			axios.delete('api/renters'+'/'+id, {
				data: $('delete_form').serialize()
			}).then(function(resData){
				$('#renterDataTable').DataTable().ajax.reload();
				$('#modalDelete').modal('hide');
				toastr.warning('Renter Deleted Successfully.');	
			}).catch(function(failData){
				utlt.cLog(arguments);
			});
		});
	});
	//end of delete renter details
	
	//start of data table
	var renterDataTable = $('#renterDataTable').DataTable({

	dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
	initComplete : function(){

	},
	lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
	buttons : [
	{
		text : 'Add New Renter',
		attr : {
			'id' : "addBtn",
			'class' : "btn btn-info btn-sm",
			'data-toggle' : "modal",
			'data-target' : "#addRentalModal"
		}
	}
	],
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
		'width' : '135px',
		'render' : function(data, type, row, ind){
			return '<span class="edit-modal btn btn-link btn-primary btn-lg" data-id = '+data+'><i class="fa fa-edit"></i></span><span class="delete-modal btn btn-link btn-danger" data-id = '+data+'><i class="fa fa-times"></i></span>';
		}
	},
	{
		'title' : 'First Name',
		'name' : 'first_name',
		'data' : 'first_name'
	},
	{
		'title' : 'Last Name',
		'name' : 'last_name',
		'data' : 'last_name'
	},
	{
		'title' : 'Father Name',
		'name' : 'father_name',
		'data' : 'father_name'
	},
	{
		'title' : 'Mother Name',
		'name' : 'mother_name',
		'data' : 'mother_name'
	},
	{
		'title' : 'Phone',
		'name' : 'phone',
		'data' : 'phone'
	},
	{
		'title' : 'Modile No',
		'name' : 'mobile',
		'data' : 'mobile'
	},
	{
		'title' : 'Gender',
		'name' : 'gender',
		'data' : 'gender'
	},
	{
		'title' : 'NID No.',
		'name' : 'nid_no',
		'data' : 'nid_no'
	},

	{
		'title' : 'NID Photo',
		'name' : 'nid_photo',
		'data' : 'nidPhoto',
		'render': function (data, type, row, ind) {
            return '<img height="50" width="45" src="'+data+'" alt="something">';
        }
	},
	{
		'title' : 'Renter Photo',
		'name' : 'photo',
		'data' : 'photo',
		'width': '30px',
        'render': function (data, type, row, ind) {
            return '<img height="50" width="45" src="'+data+'" alt="something">';
        }
	},
	{
		'title' : 'Date of Birth',
		'name' : 'date_of_birth',
		'data' : 'date_of_birth'
	},
	{
		'title' : 'Renter Type',
		'name' : 'renter_type',
		'data' : 'renterTypeName'
	},
	{
		'title' : 'Address (Area)',
		'name' : 'address_line1',
		'data' : 'address_line1'
	},
	{
		'title' : 'Thana',
		'name' : 'name',
		'data' : 'thanaName'
	},
	{
		'title' : 'Post Code',
		'name' : 'postal_code',
		'data' : 'postCode'
	},
	{
		'title' : 'City',
		'name' : 'name',
		'data' : 'cityName'
	},
	{
		'title' : 'Country',
		'name' : 'name',
		'data' : 'countryName'
	},
	{
		'title' : 'Active Status',
		'name' : 'status',
		'data' : 'status',
		// 'render': function (data, type, row, ind) {
  //           return (data) ? 'Active' : '<span class="text-danger">Inactive</span>';
  //       }
	}
	],
	serverSide : true,
	processing : true,
	responsive : true,
	ajax: {
		url: utlt.siteUrl('api/renters'),
		dataSrc: 'data'
	},
	});
	//end of data table
});	
</script>
@endsection