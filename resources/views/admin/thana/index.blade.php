@extends('layouts.master')
@section('pagetitle')
	Thana
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Thana</a>
	</li>
@endsection
@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Thana List</h4>
		</div>
	</div>
	@include('admin.thana.add')
	<div class="card-body">
		<div class="table-responsive">
			<table id="thanaDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
window.addEventListener("load",function(){

$(document).on('click', '#addThanaModal', function(){
	
});
	//datatable value
var thanaDataTable = $('#thanaDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addThanaModal",
				'class' : "btn btn-info btn-sm",
				'data-toggle' : "modal",
				'data-target' : "#addThanaModal"
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
				var pageInfo = thanaDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'City',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Thana',
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
			url: utlt.siteUrl('api/thanas'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection