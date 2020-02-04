@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#complexAddModal" id="addBtn"><i class="fas fa-plus text-success"></i><strong> Add Complex</strong></button>
@endsection
@section('card-title')
<b>Complex List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('settings.complex.add')
	@include('settings.complex.edit')
    @include('settings.complex.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="complexDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var complexDataTable = null;
window.addEventListener("load",function(){
//add complex
	$(document).on('click', '#addBtn', function(){
		document.getElementById("add_complex_form").reset();
		$('#add_complex_form .has-error').removeClass('has-error');
      	$('#add_complex_form').find('.help-block').empty();	
	});
	$('#addComplexBtn').click(function(){	
		$('#add_complex_form .has-error').removeClass('has-error');
      	$('#add_complex_form').find('.help-block').empty();	
		axios.post('api/complexes', $('#add_complex_form').serialize()).then(function(response){
			$('#complexDataTable').DataTable().ajax.reload();
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
            $('#complexDataTable').DataTable().ajax.reload();
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
            $('#complexDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete complex!!");
        });
  	 });  
//end of deleting complex

//datatable value
var complexDataTable = $('#complexDataTable').DataTable({

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
				var pageInfo = complexDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Complex No.',
			'name' : 'complex_no',
			'data' : 'complex_no'
		},
		{
			'title' : 'Complex Name',
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
			url: utlt.siteUrl('api/complexes'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection