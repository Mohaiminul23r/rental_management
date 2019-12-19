@extends('layouts.master2')
@section('pagetitle')
	Active Renters
@endsection
@section('button')
<a href="#" class="btn btn-white btn-border btn-round mr-2">Activate +</a>
<a class="btn btn-info btn-round" id="addBtn" data-toggle="modal" data-target="#activeRenterAddModal">Add Renter</a>
@endsection
@section('card-title')
<b>Active Renter List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('active_renter.add')
	@include('active_renter.edit')
    @include('active_renter.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="activeRenterDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var activeRenterDataTable = null;

window.addEventListener("load",function(){

//datatable value
var activeRenterDataTable = $('#activeRenterDataTable').DataTable({

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
				var pageInfo = activeRenterDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Complex Name',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Renter Name',
			'name' : 'apartment_no',
			'data' : 'apartment_no'
		},
		{
			'title' : 'Rent Amount',
			'name' : 'rent_amount',
			'data' : 'rent_amount',
			'render' : function(data, type, row, ind){
				return data + ' tk';
			}
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
			url: utlt.siteUrl('api/active_renters'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection