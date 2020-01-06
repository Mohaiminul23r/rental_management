@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-info btn-round" id="add_eb_Btn" data-toggle="modal" data-target="#electricBillAddModal"><i class="fas fa-plus text-white"></i><strong> Add eBill</strong></a>
@endsection
@section('card-title')
<b>Electric Bill Details</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('settings.electric_bill.add')
	@include('settings.electric_bill.edit')
    @include('settings.electric_bill.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="electricityBillDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var electricityBillDataTable = null;

var bill_type = <?php echo json_encode($bill_type)?>;

window.addEventListener("load",function(){

//add electric bill details
	$(document).on('click', '#add_eb_Btn', function(){
		document.getElementById("add_ebill_form").reset();
		$('#add_ebill_form .has-error').removeClass('has-error');
      	$('#add_ebill_form').find('.help-block').empty();
      	html_bill_type = '<option value="" disabled selected>Select Bill Type</option>';
		$.each(bill_type, function(ind,val){
			html_bill_type += '<option value="'+val.id+'">'+val.name+'</option>';
		});
		$('#bill_type_id').html(html_bill_type);
	});

	$('#add_ebill_modal_Btn').click(function(){	
		axios.post('api/electric_bills', $('#add_ebill_form').serialize()).then(function(response){
			$('#electricityBillDataTable').DataTable().ajax.reload();
	        $('#electricBillAddModal').modal('hide');
	        toastr.success('Bill added successfully.');
		}).catch(function(failData){
			 $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#add_ebill_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#add_ebill_form [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#add_ebill_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#add_ebill_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
		});
	});
//end of adding electric bill details

//edit electricity bill details
	$(document).on('click', '.edit-modal', function(){
		var id = $(this).data('id');
		$('#ebill_id').val(id);
		$("#electricBillEditModal").modal();
		 axios.get('api/electric_bills/'+id+'/edit').then(function(response){
		 	html_bill_types = '<option value="" disabled selected>Select Bill Type</option>';
			$.each(bill_type, function(ind,val){
				if(val.id == response.data.bill_type_id){
					html_bill_types += '<option value="'+val.id+'"selected>'+val.name+'</option>';
				}else{
					html_bill_types += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
		    $('#add_bill_type_id').html(html_bill_types);
          	$('#add_minimum_unit').val(response.data.minimum_unit);
          	$('#add_duty_on_kwh').val(response.data.duty_on_kwh);
          	$('#add_demand_charge').val(response.data.demand_charge);
          	$('#add_machine_charge').val(response.data.machine_charge);
          	$('#add_service_charge').val(response.data.service_charge);
          	$('#add_vat').val(response.data.vat);
          	$('#add_delay_chargee').val(response.data.delay_charge);
        }).catch(function(failData){
            alert("Something wrong..");
        });
	});

	 $('#edit_ebill_modal_Btn').click(function(){
 		var id = $(document).find('#edit_ebill_form input[name="ebill_id"]').val();
     	$('#edit_ebill_form .has-error').removeClass('has-error');
  		$('#edit_ebill_form').find('.help-block').empty();
        axios.put('api/electric_bills/'+id, $('#edit_ebill_form').serialize())
        .then(function(response){
            $('#electricityBillDataTable').DataTable().ajax.reload();
            $('#electricBillEditModal').modal('hide');
            toastr.success('Edited Successfully.'); 
        }).catch(function(failData){
            $.each(failData.response.data.errors, function(inputName, errors){
            $("#edit_ebill_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
            if(typeof errors == "object"){
                $("#edit_ebill_form [name="+inputName+"]").parent().find('.help-block').empty();
                $.each(errors, function(indE, valE){
                    $("#edit_ebill_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    $('.help-block').css("color", "red");
                });
            }else{
                $("#edit_ebill_form [name="+inputName+"]").parent().find('.help-block').html(valE);
            }
        });
       });
    }); 
//end of editing electricity bill details

//start of deleteing electric bill details
	$(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#eb_delete_modal").modal();
    });
	$('#eb_deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/electric_bills/'+id, $('#eb_delete_form').serialize()).then(function(response){
            $('#electricityBillDataTable').DataTable().ajax.reload();
            $('#eb_delete_modal').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete bill details!!");
        });
  	 });  
//end of deleting electric bill details

//datatable value
var electricityBillDataTable = $('#electricityBillDataTable').DataTable({

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
				var pageInfo = electricityBillDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '150px',
			'render' : function(data, type, row, ind){
				$action_dropdown =	
				'<div class="dropdown show">'+
				  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
				  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
                    '<a class="dropdown-item edit-modal" data-id = '+ data +'><i class="fa fa-edit text-secondary"></i> Edit eBill</a>'+
                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
				  '</div>'+
				'</div>';
			return $action_dropdown;
			}
		},
		{
			'title' : 'Bill Type',
			'name' : 'billTypeName',
			'data' : 'billTypeName'
		},
		{
			'title' : 'Minimum Unit',
			'name' : 'minimum_unit',
			'data' : 'minimum_unit'
		},
		{
			'title' : 'Duty On KWH',
			'name' : 'duty_on_kwh',
			'data' : 'duty_on_kwh'
		},
		{
			'title' : 'Demand Charge',
			'name' : 'demand_charge',
			'data' : 'demand_charge'
		},
		{
			'title' : 'Machine Charge',
			'name' : 'machine_charge',
			'data' : 'machine_charge'
		},
		{
			'title' : 'Service Charge',
			'name' : 'service_charge',
			'data' : 'service_charge'
		},
		{
			'title' : 'VAT',
			'name' : 'vat',
			'data' : 'vat'
		},
		{
			'title' : 'Delay Charge',
			'name' : 'delay_charge',
			'data' : 'delay_charge'
		}
		],
		serverSide : true,
		processing : true,
		responsive: true,
		ajax: {
			url: utlt.siteUrl('api/electric_bills'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection