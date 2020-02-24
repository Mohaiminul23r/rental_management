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
	@include('settings.collector.edit')
    @include('settings.collector.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="collectorDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var collectorDataTable = null;
window.addEventListener("load",function(){
//add complex
	$(document).on('click', '#add_collector_btn', function(){
		$('#collector_add_form .has-error').removeClass('has-error');
        $('#collector_add_form').find('.help-block').empty();
        $(document).find('#collector_add_form').trigger('reset');	
	});
	$('#addComplexBtn').click(function(){	
		$('#add_complex_form .has-error').removeClass('has-error');
      	$('#add_complex_form').find('.help-block').empty();	
		axios.post('api/complexes', $('#add_complex_form').serialize()).then(function(response){
			$('#collectorDataTable').DataTable().ajax.reload();
	        $('#complexAddModal').modal('hide');
	        toastr.success('Complex added successfully.');
		}).catch(function(failData){
			 $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#add_complex_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#add_complex_form [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#add_complex_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#add_complex_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
		});
	});
//end of adding complex

//edit complex details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$('#complex_id').val(id);
		$("#complexEditModal").modal();
		 axios.get('api/complexes/'+id+'/edit').then(function(response){
          	$('#add_complex_no').val(response.data.complex_no);
          	$('#add_complex_name').val(response.data.name);
        }).catch(function(failData){
            alert("Something wrong..");
        });
	});

	 $('#editComplexBtn').click(function(){
 		var id = $(document).find('#edit_complex_form input[name="complex_id"]').val();
     	$('#edit_complex_form .has-error').removeClass('has-error');
  		$('#edit_complex_form').find('.help-block').empty();
        axios.put('api/complexes/'+id, $('#edit_complex_form').serialize())
        .then(function(response){
            $('#collectorDataTable').DataTable().ajax.reload();
            $('#complexEditModal').modal('hide');
            toastr.success('Edited Successfully.'); 
        }).catch(function(failData){
            $.each(failData.response.data.errors, function(inputName, errors){
            $("#edit_complex_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
            if(typeof errors == "object"){
                $("#edit_complex_form [name="+inputName+"]").parent().find('.help-block').empty();
                $.each(errors, function(indE, valE){
                    $("#edit_complex_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                });
            }else{
                $("#edit_complex_form [name="+inputName+"]").parent().find('.help-block').html(valE);
            }
        });
       });
    }); 
//end of editing complex details

//start of deleteing complex
	$(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
	$('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/complexes/'+id, $('#delete_form').serialize()).then(function(response){
            $('#collectorDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete complex!!");
        });
  	 });  
//end of deleting complex

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
				return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
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
			'data' : 'status'
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