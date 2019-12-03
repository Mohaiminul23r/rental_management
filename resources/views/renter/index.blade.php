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
window.addEventListener("load", function(){

	//adding renter details
	$('#renterAddBtn').click(function(){
		axios.post('api/renters',$('#renter_add_form').serialize()).then(function(resData){
			$('#renterDataTable').DataTable().ajax.reload();
			$('#addRentalModal').modal('hide');
		}).catch(function(resData){
			utlt.cLog(arguments);
			alert("Something wrong");
		});
	});
	//end of adding renter details

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
				toastr.success('Success', 'Successfully Deleted', {
					tatToDismiss: true,
					toastClass: 'toast',
					showMethod: 'fadeIn',
					showDuration: 300
				});	
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
			'id' : "addRentalModal",
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
		'data' : 'nid_photo'
	},
	{
		'title' : 'Renter Photo',
		'name' : 'photo',
		'data' : 'photo'
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
		'data' : 'status'
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