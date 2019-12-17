@extends('layouts.master2')
@section('pagetitle')
	House Information
@endsection

@section('button')
<a class="btn btn-info btn-round" id="addBtn" data-toggle="modal" data-target="#houseAddModal">Add+</a>
@endsection
@section('card-title')
<b>House List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('settings.house.add')
	@include('settings.house.edit')
    @include('settings.house.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="houseDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var houseDataTable = null;
window.addEventListener("load",function(){

	//adding house
	$(document).on('click', '#addBtn', function(){
		document.getElementById("add_house_form").reset();
		$('#add_house_form .has-error').removeClass('has-error');
      	$('#add_house_form').find('.help-block').empty();	
	});

	$('#addHouseBtn').click(function(){	
		axios.post('api/houses', $('#add_house_form').serialize()).then(function(response){
			$('#houseDataTable').DataTable().ajax.reload();
	        $('#houseAddModal').modal('hide');
	        toastr.success('House added successfully.');
		}).catch(function(failData){
			 $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#add_house_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#add_house_form [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#add_house_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#add_house_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
		});
	});
	//end of adding thana

//datatable value
var houseDataTable = $('#houseDataTable').DataTable({

		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
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
				var pageInfo = houseDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'House No.',
			'name' : 'house_number',
			'data' : 'house_number'
		},
		{
			'title' : 'House Name',
			'name' : 'house_name',
			'data' : 'house_name'
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
			url: utlt.siteUrl('api/houses'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection