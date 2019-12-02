@extends('layouts.master')
@section('pagetitle')
	Renter Type
@endsection

@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Renter Type</a>
	</li>
@endsection

@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Renter Type List</h4>
		</div>
	{{-- start of modals --}}
	@include('admin.rentertype.add')
	@include('admin.rentertype.delete')
	{{-- end of modals --}}
	<div class="card-body">
		<div class="table-responsive">
			<table id="rentertypeDatatable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
window.addEventListener("load", function(){

	$('#addRenterTypeModal').on('hidden.bs.modal', function(){
	    $(this).find('form').trigger('reset');
	    $('#addRenterTypeForm .has-error').removeClass('has-error');
        $('#addRenterTypeForm').find('.help-block').empty();
	});

  //add country modal
    $('#addRenterTypeBtn').click(function(){
        utlt.Add('api/rentertypes', '#rentertypeDatatable');
    });

    utlt['Add'] = function(url, dataTable){
    	$('#addRenterTypeForm .has-error').removeClass('has-error');
        $('#addRenterTypeForm').find('.help-block').empty();
        $.ajax({
            url : utlt.siteUrl(url),
            type : "POST",
            data : $('#addRenterTypeForm').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#addRenterTypeModal').modal('hide');
        }).fail(function(failData){
            $.each(failData.responseJSON.errors, function(inputName, errors){
                  $.each(failData.responseJSON.errors, function(inputName, errors){
                    $("#addRenterTypeForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addRenterTypeForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addRenterTypeForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });
                    }
                    else{
                        $("#addRenterTypeForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    }

    //delete renter type
    $(document).on('click', '.delete-modal', function(){
    	$('#id').val($(this).data('id'));
    	$('#deleteRenterTypeModal').modal();
    });

    $('#deleteBtn').click(function(){
    	var id = $("#id").val();
    	utlt.Delete('api/rentertypes', id, '#rentertypeDatatable');
    });

    utlt['Delete'] = function(url, id, dataTable){
        $.ajax({
            url : utlt.siteUrl(url+'/'+id),
            type : "DELETE",
            data : $('#delete_form').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#deleteRenterTypeModal').modal('hide');
        }).fail(function(failData){
            utlt.cLog(arguments);
        });
    }
    //end of delete

	var rentertypeDatatable = $('#rentertypeDatatable').DataTable({
		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addRenterTypeModal",
				'class' : "btn btn-info btn-sm",
				'data-toggle' : "modal",
				'data-target' : "#addRenterTypeModal"
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
				var pageInfo = rentertypeDatatable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Renter Type',
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
			url: utlt.siteUrl('api/rentertypes'),
			dataSrc: 'data'
		},

	});
});	
</script>
@endsection