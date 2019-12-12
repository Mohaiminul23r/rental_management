@extends('layouts.master2')
@section('pagetitle')
	Apartment Information
@endsection
{{-- @section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Apartment</a>
	</li>
@endsection --}}
@section('button')
<a class="btn btn-info btn-round" id="addBtn" data-toggle="modal" data-target="#apartmentAddModal">Add+</a>
@endsection
@section('card-title')
Apartment List
@endsection
@section('body')
	{{-- start modals --}}
	@include('settings.apartment.add')
	@include('settings.apartment.edit')
    @include('settings.apartment.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="apartmentDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var apartmentDataTable = null;
window.addEventListener("load",function(){

//datatable value
var apartmentDataTable = $('#apartmentDataTable').DataTable({

		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		// {
		// 	text : 'Add+',
		// 	attr : {
		// 		'id' : "modalAdd",
		// 		'class' : "btn btn-info btn-sm",
		// 		'data-toggle' : "modal",
		// 		'data-target' : "#modalAdd"
		// 	}
		// }
		],
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '40px',
			'align' : 'center',
			'render' : function(data, type, row, ind){
				var pageInfo = apartmentDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'House No.',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Apartment Name',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Apartment No.',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '135px',
			'render' : function(data, type, row, ind){
				return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/apartments'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection