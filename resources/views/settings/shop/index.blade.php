@extends('layouts.master2')
@section('pagetitle')
	Shop Information
@endsection
@section('button')
<a class="btn btn-info btn-round" id="addBtn" data-toggle="modal" data-target="#shopAddModal">Add+</a>
@endsection
@section('card-title')
<b>Shop List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('settings.shop.add')
	@include('settings.shop.edit')
    @include('settings.shop.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="shopDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var shopDataTable = null;
window.addEventListener("load",function(){

//add shop
$(document).on('click', '#addBtn', function(){
	document.getElementById("add_shop_form").reset();
	$('#add_shop_form .has-error').removeClass('has-error');
  	$('#add_shop_form').find('.help-block').empty();	
});
$('#addShopBtn').click(function(){	
	axios.post('api/shops', $('#add_shop_form').serialize()).then(function(response){
		$('#shopDataTable').DataTable().ajax.reload();
        $('#shopAddModal').modal('hide');
        toastr.success('Shop added successfully.');
	}).catch(function(failData){
		 $.each(failData.response.data.errors, function(inputName, errors){
              $.each(failData.response.data.errors, function(inputName, errors){
                $("#add_shop_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#add_shop_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#add_shop_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#add_shop_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
        });
	});
});
//end of adding shop

//edit apartment details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$("#shopEditModal").modal();
		 axios.get('api/shops/'+id+'/edit').then(function(response){
          	$('#add_shop_name').val(response.data.name);
          	$('#add_rent_amount').val(response.data.rent_amount);
          	$('#add_description').val(response.data.description);
        }).catch(function(failData){
            alert("Something wrong..");
        });
        $('#editShopBtn').click(function(){
         	$('#edit_shop_form .has-error').removeClass('has-error');
      		$('#edit_shop_form').find('.help-block').empty();
            axios.put('api/shops/'+id, $('#edit_shop_form').serialize())
            .then(function(response){
                $('#shopDataTable').DataTable().ajax.reload();
                $('#shopEditModal').modal('hide');
                toastr.success('Edited Successfully.'); 
            }).catch(function(failData){
                $.each(failData.response.data.errors, function(inputName, errors){
                $("#edit_shop_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_shop_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_shop_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    });
                }else{
                    $("#edit_shop_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
           });
        }); 
	});
//end of editing apartment details
//start of deleteing shop
	$(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
	$('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/shops/'+id, $('#delete_form').serialize()).then(function(response){
            $('#shopDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete this shop!!");
        });
  	 });  
//end of deleting apartment
//datatable value
var shopDataTable = $('#shopDataTable').DataTable({

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
				var pageInfo = shopDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Shop Name',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Rent Amount',
			'name' : 'rent_amount',
			'data' : 'rent_amount',
			'render' : function(data, type, row, ind){
				return data + ' tk';
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
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/shops'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection