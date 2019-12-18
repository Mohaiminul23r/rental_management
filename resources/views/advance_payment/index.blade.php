@extends('layouts.master2')
@section('pagetitle')
	Advance Payments
@endsection
@section('button')
<a class="btn btn-info btn-round" id="add_advance_Btn" data-toggle="modal" data-target="#advancePaymentAddModal">Add+</a>
@endsection
@section('card-title')
<b>Advance Payment List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('advance_payment.add')
	@include('advance_payment.edit')
    @include('advance_payment.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="advancePaymentDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var advancePaymentDataTable = null;

var renter  = <?php echo json_encode($renter)?>;
var complex = <?php echo json_encode($complex)?>;
var shop    = <?php echo json_encode($shop)?>;

window.addEventListener("load",function(){

//add advance details
$(document).on('click', '#add_advance_Btn', function(){
	document.getElementById("add_advance_payment_form").reset();
	$('#add_advance_payment_form .has-error').removeClass('has-error');
  	$('#add_advance_payment_form').find('.help-block').empty();	
  		
});

$(document).on('click', '#add_advance_Btn', function(){
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	html_complex = '<option value="" disabled selected>Select Complex</option>';
	html_shop     = '<option value="" disabled selected>Select Shop</option>';
	$.each(renter, function(ind,val){
		html_renter += '<option value="'+val.id+'">'+val.first_name+'</option>';
	});
	$.each(complex, function(ind,val){
		html_complex += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(shop, function(ind,val){
		html_shop += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#renter_name').html(html_renter);
	$('#complex_name').html(html_complex);
	$('#shop_name').html(html_shop);
});

$('#addPaymentBtn').click(function(){	
	axios.post('api/advance_payments', $('#add_advance_payment_form').serialize()).then(function(response){
		$('#advancePaymentDataTable').DataTable().ajax.reload();
        $('#advancePaymentAddModal').modal('hide');
        toastr.success('Payment added successfully.');
	}).catch(function(failData){
		 $.each(failData.response.data.errors, function(inputName, errors){
              $.each(failData.response.data.errors, function(inputName, errors){
                $("#add_advance_payment_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#add_advance_payment_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#add_advance_payment_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#add_advance_payment_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
        });
	});
});
//end of adding advance payment

//edit renter details
$(document).on('click', '.edit-modal', function(){
	var id = $(this).data('id');
	$('#ap_id').val(id);
	$('#advancePaymentEditModal').modal();
	$('#advance_payment_edit_form .has-error').removeClass('has-error');
	$('#advance_payment_edit_form').find('.help-block').empty();	
	html_renters   = '<option value="" disabled selected>Select Renter</option>';
	html_complexes = '<option value="" disabled selected>Select Complex</option>';
	html_shops     = '<option value="" disabled selected>Select Shop</option>';
	axios.get('api/advance_payments/'+id+'/edit').then(function(response){
		$.each(renter, function(ind,val){
			if(val.id == response.data.renter_id){
				html_renters += '<option value="'+val.id+'" selected>'+val.first_name+'</option>';
			}else{
				html_renters += '<option value="'+val.id+'">'+val.name+'</option>';
			}	
		});
		$.each(complex, function(ind,val){
			if(val.id == response.data.apartment_id){
				html_complexes += '<option value="'+val.id+'" selected>'+val.name+'</option>';
			}else{
				html_complexes += '<option value="'+val.id+'">'+val.name+'</option>';
			}
		});
		$.each(shop, function(ind,val){
			if(val.id == response.data.shop_id){
				html_shops += '<option value="'+val.id+'" selected>'+val.name+'</option>';
			}else{
				html_shops += '<option value="'+val.id+'">'+val.name+'</option>';
			}
		});	
		$('#add_renter_name').html(html_renters);
		$('#add_complex_name').html(html_complexes);
		$('#add_shop_name').html(html_shops);
		$('#add_date_of_payment').val(response.data.date_of_payment);
		$('#add_payment_amount').val(response.data.payment_amount);
		if(response.data.status == 1){
		 	$('#paid').attr("selected","selected");
		 }
		if(response.data.status == 0){
		 	$('#unpaid').attr("selected","selected");
		 }
	}).catch(function(failData){
		alert("Something wrong.");
	});
});

$('#editPaymentBtn').click(function(){
	var id = $(document).find('#advance_payment_edit_form input[name="ap_id"]').val();
	axios.put('api/advance_payments/'+id, $('#advance_payment_edit_form').serialize())
	.then(function(response){
		$('#advancePaymentDataTable').DataTable().ajax.reload();
        $('#advancePaymentEditModal').modal('hide');
        toastr.success('Edited Successfully.'); 
	}).catch(function(failData){
		$.each(failData.response.data.errors, function(inputName, errors){
        $("#advance_payment_edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
        if(typeof errors == "object"){
            $("#advance_payment_edit_form [name="+inputName+"]").parent().find('.help-block').empty();
            $.each(errors, function(indE, valE){
                $("#advance_payment_edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                $('.help-block').css("color", "red");
            });
        }else{
            $("#advance_payment_edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
        }
    });
	});
});
//end of editing payment details

//delete advance payment details
$(document).on('click', '.delete-modal', function(){
	$('#id').val($(this).data('id'));
	$('#advance_payment_delete_modal').modal();
	$('#ap_deleteBtn').click(function(){
		var id = $('#id').val();
		axios.delete('api/advance_payments'+'/'+id, {
			data: $('delete_form').serialize()
		}).then(function(resData){
			$('#advancePaymentDataTable').DataTable().ajax.reload();
			$('#advance_payment_delete_modal').modal('hide');
			toastr.warning('Payment Deleted Successfully.');	
		}).catch(function(failData){
			utlt.cLog(arguments);
		});
	});
});
//end of delete advance payment details

//datatable value
var advancePaymentDataTable = $('#advancePaymentDataTable').DataTable({

		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
	
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '20px',
			'align' : 'center',
			'render' : function(data, type, row, ind){
				var pageInfo = advancePaymentDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Renter Name',
			'name' : 'renterFirstName',
			'data' : 'renterFirstName'
		},
		{
			'title' : 'Complex',
			'name' : 'complexName',
			'data' : 'complexName'
		},
		{
			'title' : 'Shop Name',
			'name' : 'shopName',
			'data' : 'shopName'
		},
		{
			'title' : 'Payment Date',
			'name' : 'date_of_payment',
			'data' : 'date_of_payment'
		},
		{
			'title' : 'Amount',
			'name' : 'payment_amount',
			'data' : 'payment_amount',
			'width' : '40px',
			'render' : function(data, type, row, ind){
				return data + ' tk';
			}
		},
		{
			'title' : 'Status',
			'name' : 'status',
			'data' : 'status',
			'render' : function(data, type, row, ind){
				if(data == 1){
					return "Paid";
				}else{
					return "Unpaid";
				}

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
			url: utlt.siteUrl('api/advance_payments'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection