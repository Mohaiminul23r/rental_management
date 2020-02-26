@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-white btn-border btn-round mr-2" id="add_collector_btn" href="{{ route('collectors.create') }}"><i class="fas fa-plus text-success"></i> Add Collector Details</a>
@endsection
@section('card-title')
<b>Bill Collector List</b>
@endsection
@section('body')
	{{-- start modals --}}
    @include('settings.collector.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="collectorDataTable" class="display table table-striped table-hover  table-bordered">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var collectorDataTable = null;
window.addEventListener("load",function(){
//refresh form fields
	$(document).on('click', '#add_collector_btn', function(){
		$('#collector_add_form .has-error').removeClass('has-error');
        $('#collector_add_form').find('.help-block').empty();
        $(document).find('#collector_add_form').trigger('reset');	
	});

//start of deleteing collector
	$(document).on('click', '.delete-modal', function() {
        $('#c_id').val($(this).data('id'));
        $("#collectorModalDelete").modal();
    });
	$('#collectorDeleteBtn').click(function(){
        var id = $("#c_id").val();
        axios.delete('api/collectors/'+id, $('#collector_delete_form').serialize()).then(function(response){
            $('#collectorDataTable').DataTable().ajax.reload();
            $('#collectorModalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete this collector!!");
        });
  	 });  
//end of deleting collector

//datatable value
var collectorDataTable = $('#collectorDataTable').DataTable({
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
				var pageInfo = collectorDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '135px',
			'render' : function(data, type, row, ind){
			$action_dropdown =	
				'<div class="dropdown show">'+
				  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
				  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
                    '<a href="'+utlt.siteUrl("api/collectors/"+data+"/edit")+'" class="dropdown-item edit-modal" data-id = '+ data +'><i class="fa fa-edit text-secondary"></i> Edit Collector Info.</a>'+
                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
				  '</div>'+
				'</div>';
			return $action_dropdown;
		}
		},
		{
			'title' : 'Collector Name',
			'name' : 'collector_name',
			'data' : 'collector_name'
		},
		{
			'title' : 'Father Name',
			'name' : 'father_name',
			'data' : 'father_name'
		},
		{
			'title' : 'Contact No.',
			'name' : 'contact_no',
			'data' : 'contact_no'
		},
		{
			'title' : 'Gender',
			'name' : 'gender',
			'data' : 'gender'
		},
		{
			'title' : 'Status',
			'name' : 'status',
			'data' : 'status',
			'render': function(data, type, row, ind){
				if(data == 0){
					return "Inactive";
				}else{
					return "Active";
				}
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/collectors'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection