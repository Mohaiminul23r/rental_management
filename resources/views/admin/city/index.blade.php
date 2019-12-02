@extends('layouts.master')
@section('pagetitle')
	City
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">City</a>
	</li>
@endsection

@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">City List</h4>
		</div>
	</div>
	@include('admin.city.add')
	@include('admin.city.edit')
	@include('admin.city.delete')
	<div class="card-body">
		<div class="table-responsive">
			<table id="cityDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
var cityDataTable = null;
window.addEventListener("load", function(){

    $(document).on('click', '#addCityModal', function(){
        utlt.GetAll('api/country/get-country','#add_country_name', 'country');
        $("#addCityModal").modal();
    });

    // Insert form data from modal

	$('#addCityBtn').click(function(){
        utlt.Add('api/cities', '#cityDataTable');
    });

    utlt['Add'] = function(url, dataTable){
    	$('#addCityForm .has-error').removeClass('has-error');
        $('#addCityForm').find('.help-block').empty();
        $.ajax({
            url : utlt.siteUrl(url),
            type : "POST",
            data : $('#addCityForm').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#addCityModal').modal('hide');
        }).fail(function(failData){
            $.each(failData.responseJSON.errors, function(inputName, errors){
                  $.each(failData.responseJSON.errors, function(inputName, errors){
                    $("#addCityForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addCityForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addCityForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });
                    }
                    else{
                        $("#addCityForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    }
    //end of add modal


    /*----------------edit city details----------------*/

    $('#editCityBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('api/cities', id, '#cityDataTable');
    });

    $(document).on('click', '.edit-modal', function() {
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('cities/'+id+'/edit'),
            type : "GET"
        }).done(function(resData){
                utlt.GetAll('api/country/get-country','#country_name', 'country',resData.country_id); 
                $('#id').val(resData.id);
                $('#name').val(resData.name);
        }).fail(function(failData){
            utlt.cLog(arguments);
            var htmlData ="";
            $.each(failData.responseJSON.errors,function(ind,val){
                $("#name").removeClass("hidden");
                $("#name").text(failData.responseJSON.errors.name);
            });
        });
        $("#editCityModal").modal();
    });

    /*-----------end of editing city details---------*/

    /*-----------delete city details---------*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#deleteCityModal").modal();
    });

    $('#deleteCityBtn').click(function(){
        var id = $("#id").val();
        utlt.Delete('api/cities', id, '#cityDataTable');
    });

   utlt['Delete'] = function(url, id, dataTable){
        $('#edit_form .has-error').removeClass('has-error');
        $('#edit_form').find('.help-block').empty();
        $.ajax({
            url : utlt.siteUrl(url+'/'+id),
            type : "DELETE",
            data : $('#delete_city_form').serialize()
        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#deleteCityModal').modal('hide');
        }).fail(function(failData){
            utlt.cLog(arguments);
        });
    }
    /*-----------end of deleting city---------*/
	var cityDataTable = $('#cityDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addCityModal",
				'class' : "btn btn-info btn-sm",
				'data-toggle' : "modal",
				'data-target' : "#addCityModal"
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
				var pageInfo = cityDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Country',
			'name' : 'country_name',
			'data' : 'countryName'
		},
		{
			'title' : 'City',
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
			url: utlt.siteUrl('api/cities'),
			dataSrc: 'data'
		},
	});
});	
</script>
@endsection