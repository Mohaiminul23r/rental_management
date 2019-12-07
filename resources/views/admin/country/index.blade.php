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

    //add country modal
    $('#addBtn').click(function(){
        utlt.Add('api/countries', '#countryDataTable');
    });

    utlt['Add'] = function(url, dataTable){
    	$('#addForm .has-error').removeClass('has-error');
        $('#addForm').find('.help-block').empty();
        $.ajax({
            url : utlt.siteUrl(url),
            type : "POST",
            data : $('#addForm').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#modalAdd').modal('hide');
        }).fail(function(failData){
            $.each(failData.responseJSON.errors, function(inputName, errors){
                  $.each(failData.responseJSON.errors, function(inputName, errors){
                    $("#addForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });
                    }
                    else{
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    }
    //end of add modal

    //edit country
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('api/countries', id, '#countryDataTable');
    });

    $(document).on('click', '.edit-modal', function() {
     var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('api/countries/'+id+'/edit'),
            type : "GET"
        }).done(function(resData){
            console.log(resData);
              $('#id').val(resData.id);
              $('#name').val(resData.name);
        }).fail(function(failData){
            utlt.cLog(arguments);
        });
        $("#editCountryModal").modal();
    });

    utlt['Edit'] = function(url, id, dataTable){
        $('#edit_form .has-error').removeClass('has-error');
        $('#edit_form').find('.help-block').empty();
        $(this).removeData('modal');
        $.ajax({
            url : utlt.siteUrl(url+'/'+id),
            type : "PUT",
            data : $('#edit_form').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#editCountryModal').modal('hide');
            toastr.success('Edited Successfully.'); 
        }).fail(function(failData){
            $.each(failData.responseJSON.errors, function(inputName, errors){
                $("#edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    });
                }
                else{
                    $("#edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
        });
    }
    /*end Edit method*/

   // Start jquery for Delete 
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });

    $('#deleteBtn').click(function(){
        var id = $("#id").val();
        utlt.Delete('api/countries', id, '#countryDataTable');
    });

    utlt['Delete'] = function(url, id, dataTable){
        $('#edit_form .has-error').removeClass('has-error');
        $('#edit_form').find('.help-block').empty();
        $.ajax({
            url : utlt.siteUrl(url+'/'+id),
            type : "DELETE",
            data : $('#delete_form').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
        }).fail(function(failData){
            utlt.cLog(arguments);
        });
    }
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