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
	@include('admin.thana.edit')
	@include('admin.thana.delete')
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

var city = <?php echo json_encode($city)?>;


window.addEventListener("load",function(){
	
	//adding thana
	$(document).on('click', '#addBtn', function(){
		document.getElementById("addThanaForm").reset();
		$('#addThanaForm .has-error').removeClass('has-error');
      	$('#addThanaForm').find('.help-block').empty();
		html_city = '<option value="" disabled selected>Select City</option>';
		$.each(city, function(ind, val){
			html_city += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$('#city_name').html(html_city);	
	});

	$('#addThanaBtn').click(function(){	
		axios.post('api/thanas', $('#addThanaForm').serialize()).then(function(response){
			$('#thanaDataTable').DataTable().ajax.reload();
	        $('#addThanaModal').modal('hide');
	        toastr.success('Thana added successfully.');
		}).catch(function(failData){
			 $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#addThanaForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addThanaForm [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#addThanaForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#addThanaForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
		});
	});
	//end of adding thana

	//edit thana details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$("#editThanaModal").modal();
		html_city = '<option value="" disabled selected>Select City</option>';
		 axios.get('api/thanas/'+id+'/edit').then(function(response){
			$.each(city, function(ind, val){
				if((val.id) == (response.data.city_id)){
					html_city += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_city += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$('#add_city_name').html(html_city);	
            $('#add_thana_name').val(response.data.name);
        }).catch(function(failData){
            alert("Something wrong..");
        });

        $('#editThanaBtn').click(function(){
         	$('#edit_thana_form .has-error').removeClass('has-error');
      		$('#edit_thana_form').find('.help-block').empty();
            axios.put('api/thanas/'+id, $('#edit_thana_form').serialize())
            .then(function(response){
                $('#thanaDataTable').DataTable().ajax.reload();
                $('#editThanaModal').modal('hide');
                toastr.success('Edited Successfully.'); 
            }).catch(function(failData){
                 $.each(failData.response.data.errors, function(inputName, errors){
                $("#edit_thana_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_thana_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_thana_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    });
                }else{
                    $("#edit_thana_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
           });
        }); 
	});
	//end of editing thana details

	//start of deleteing thana
	$(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
	 $('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/thanas/'+id, $('#delete_form').serialize()).then(function(response){
            $('#thanaDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete thana.");
        });
  	 });  
  	 //end of deleting thana

//starting datatable 
var thanaDataTable = $('#thanaDataTable').DataTable({

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
			'data' : 'cityName'
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