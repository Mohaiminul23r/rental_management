@extends('layouts.master')
@section('pagetitle')
	Country
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Country</a>
	</li>
@endsection
@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Country List</h4>
		</div>
	</div>
	<div class="card-body">
		{{-- start modals --}}
		@include('admin.country.add')
		@include('admin.country.edit')
        @include('admin.country.delete')
		{{-- end modals --}}
		<div class="table-responsive">
			<table id="countryDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
// datatable starts
var countryDataTable = null;
window.addEventListener("load",function(){

    $.fn.dataTable.ext.errMode = 'none';

	$("#modalAdd").on("hidden.bs.modal", function() {
        document.getElementById("addForm").reset();
        $('#addForm .has-error').removeClass('has-error');
        $('#addForm').find('.help-block').empty();
    });

     $("#editCountryModal").on("hidden.bs.modal", function() {
        document.getElementById("edit_form").reset();
        $('#editCountryModal .has-error').removeClass('has-error');
        $('#editCountryModal').find('.help-block').empty();
    });

    $("#modalDelete").on("hidden.bs.modal", function() {
        document.getElementById("delete_form").reset();
        $('#delete_form .has-error').removeClass('has-error');
        $('#delete_form').find('.help-block').empty();
    });

    $('#addBtn').click(function(){
    	$('#addForm .has-error').removeClass('has-error');
        $('#addForm').find('.help-block').empty();
        axios.post('api/countries',$('#addForm').serialize())
        .then(function(response){
            $('#countryDataTable').DataTable().ajax.reload();
            $('#modalAdd').modal('hide');
            toastr.success('Country added successfully.');
        }).catch(function(failData){
            $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#addForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });
                    }else{
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    });
    //end of add modal

    //edit country
    $(document).on('click', '.edit-modal', function() {
         var id = $(this).data('id');
        $("#editCountryModal").modal();
        axios.get('api/countries/'+id+'/edit').then(function(response){
            $('#id').val(response.data.id);
            $('#country_name').val(response.data.name);
        }).catch(function(failData){
            alert("Something wrong..");
        });

        $('#editBtn').click(function(){
           // var id = $('#id').val();
            axios.put('api/countries/'+id, $('#edit_form').serialize())
            .then(function(response){
                $('#countryDataTable').DataTable().ajax.reload();
                $('#editCountryModal').modal('hide');
                toastr.success('Edited Successfully.'); 
            }).catch(function(failData){
                 $.each(failData.response.data.errors, function(inputName, errors){
                $("#edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    });
                }else{
                    $("#edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
           });
        }); 
    });
        /*end Edit method*/

  //delete country 
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });

    $('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/countries/'+id, $('#delete_form').serialize()).then(function(response){
            $('#countryDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete country.");
        });
    });  
    //end of delete

//datatable value
var countryDataTable = $('#countryDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "modalAdd",
				'class' : "btn btn-info btn-sm",
				'data-toggle' : "modal",
				'data-target' : "#modalAdd"
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
				var pageInfo = countryDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Name',
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
			url: utlt.siteUrl('api/countries'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection