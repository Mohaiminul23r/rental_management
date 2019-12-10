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
var countries = <?php echo json_encode($country) ?>;
window.addEventListener("load", function(){
    //adding thana
    $(document).on('click', '#addBtn', function(){
        document.getElementById("addCityForm").reset();
        $('#addCityForm .has-error').removeClass('has-error');
        $('#addCityForm').find('.help-block').empty();
        html_country = '<option value="" disabled selected>Select Country</option>';
        $.each(countries, function(ind, val){
            html_country += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $('#add_country_name').html(html_country);    
    });
    $('#addCityBtn').click(function(){ 
        axios.post('api/cities', $('#addCityForm').serialize()).then(function(response){
            $('#cityDataTable').DataTable().ajax.reload();
            $('#addCityModal').modal('hide');
            toastr.success('City added successfully.');
        }).catch(function(failData){
             $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#addCityForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addCityForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addCityForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#addCityForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    });
    //end of adding thana

    //edit city details
    $(document).on('click', '.edit-city-modal', function(){
        var id = $(this).data('id');
        $("#editCityModal").modal();
        html_con = '<option value="" disabled selected>Select Country</option>';
         axios.get('api/cities/'+id+'/edit').then(function(response){
            $.each(countries, function(ind, val){
                if(val.id == response.data.country_id){
                    html_con += '<option value="'+val.id+'" selected>'+val.name+'</option>';
                }else{
                    html_con += '<option value="'+val.id+'">'+val.name+'</option>';
                }
            });
            $('#country_name').html(html_con);    
            $('#city_name').val(response.data.name);
        }).catch(function(failData){
            alert("Something wrong..");
        });

        $('#editCityBtn').click(function(){
            $('#edit_city_form .has-error').removeClass('has-error');
            $('#edit_city_form').find('.help-block').empty();
            axios.put('api/cities/'+id, $('#edit_city_form').serialize())
            .then(function(response){
                $('#cityDataTable').DataTable().ajax.reload();
                $('#editCityModal').modal('hide');
                toastr.success('Edited Successfully.'); 
            }).catch(function(failData){
                 $.each(failData.response.data.errors, function(inputName, errors){
                $("#edit_city_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_city_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_city_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#edit_city_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
           });
        }); 
    });
    //end of editing city details

    //start of deleteing city details
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#deleteCityModal").modal();
    });
     $('#deleteCityBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/cities/'+id, $('#delete_city_form').serialize()).then(function(response){
            $('#cityDataTable').DataTable().ajax.reload();
            $('#deleteCityModal').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete city.");
        });
     });  
     //end of deleting city details

     //start of datatable
	var cityDataTable = $('#cityDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addBtn",
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
				return '<span class="edit-city-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
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
    //end of data table
});	
</script>
@endsection