@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-info btn-round" id="addBtn" data-toggle="modal" data-target="#apartmentAddModal">Add Complex+</a>
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
		<table id="apartmentDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var apartmentDataTable = null;

window.addEventListener("load",function(){

//add apartment
	$(document).on('click', '#addBtn', function(){
		document.getElementById("add_apartment_form").reset();
		$('#add_apartment_form .has-error').removeClass('has-error');
      	$('#add_apartment_form').find('.help-block').empty();	
	});
	$('#addApartmentBtn').click(function(){	
		axios.post('api/apartments', $('#add_apartment_form').serialize()).then(function(response){
			$('#apartmentDataTable').DataTable().ajax.reload();
	        $('#apartmentAddModal').modal('hide');
	        toastr.success('Apartment added successfully.');
		}).catch(function(failData){
			 $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#add_apartment_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#add_apartment_form [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#add_apartment_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#add_apartment_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
		});
	});
//end of adding apartment

//edit apartment details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$('#apt_id').val(id);
		$("#apartmentEditModal").modal();
		 axios.get('api/apartments/'+id+'/edit').then(function(response){
          	$('#add_apartment_no').val(response.data.apartment_no);
          	$('#add_apartment_name').val(response.data.name);
          	$('#add_rent_amount').val(response.data.rent_amount);
          	$('#add_description').val(response.data.description);
        }).catch(function(failData){
            alert("Something wrong..");
        });
	});

	 $('#editApartmentBtn').click(function(){
 		var id = $(document).find('#edit_apartment_form input[name="apt_id"]').val();
     	$('#edit_apartment_form .has-error').removeClass('has-error');
  		$('#edit_apartment_form').find('.help-block').empty();
        axios.put('api/apartments/'+id, $('#edit_apartment_form').serialize())
        .then(function(response){
            $('#apartmentDataTable').DataTable().ajax.reload();
            $('#apartmentEditModal').modal('hide');
            toastr.success('Edited Successfully.'); 
        }).catch(function(failData){
            $.each(failData.response.data.errors, function(inputName, errors){
            $("#edit_apartment_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
            if(typeof errors == "object"){
                $("#edit_apartment_form [name="+inputName+"]").parent().find('.help-block').empty();
                $.each(errors, function(indE, valE){
                    $("#edit_apartment_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                });
            }else{
                $("#edit_apartment_form [name="+inputName+"]").parent().find('.help-block').html(valE);
            }
        });
       });
    }); 
//end of editing apartment details

//start of deleteing apartment
	$(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
	$('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/apartments/'+id, $('#delete_form').serialize()).then(function(response){
            $('#apartmentDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete apartment!!");
        });
  	 });  
//end of deleting apartment

//datatable value
var apartmentDataTable = $('#apartmentDataTable').DataTable({

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
				var pageInfo = apartmentDataTable.page.info();
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
			url: utlt.siteUrl('api/apartments'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection