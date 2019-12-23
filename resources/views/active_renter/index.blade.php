@extends('layouts.master2')
@section('pagetitle')
	Active Renters
@endsection
@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#multi_step_add_modal" id="add_rent_info_btn">Add Rent Info.</button>
@endsection
@section('card-title')
<b>Active Renter List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('active_renter.edit')
    @include('active_renter.delete')
	{{-- end modals --}}
	<div id="multi_step_add_modal" class="multi-step">
	
	</div>
	<div class="table-responsive">
		<table id="activeRenterDataTable" class="display table table-striped table-hover">
		</table>
	</div>
<script type="text/javascript">
// datatable starts
var activeRenterDataTable = null;
var renter  = <?php echo json_encode($renter)?>;
var complex = <?php echo json_encode($complex)?>;
var shop    = <?php echo json_encode($shop)?>;
var bill_type    = <?php echo json_encode($bill_type)?>;
var renterType    = <?php echo json_encode($renterType)?>;
var activeRenter    = <?php echo json_encode($activeRenter)?>;
var electricity_bill    = <?php echo json_encode($electricity_bill)?>;
@php
	//dd($electricity_bill);
@endphp

window.addEventListener("load",function(){
//multi step active rental add
const mySteps = [{
        content: 
			'<div class="row">'+
				'<div class="col-md-12">'+
					'<h6 style="text-align: center; color: blue;"><b>Add Rent Details</b></h6>'+
				'</div>'+
			'</div>'+
			'<form id="rent_details_form1" class="form-horizontal" role="form">'+
        	'<div class="row">'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Renter Type</label>'+
						'<select class="form-control" id="renter_type" name="renter_type_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>	'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Renter Name</label>'+
						'<select class="form-control" id="renter_name" name="renter_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>	'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Complex Name</label>'+
						'<select class="form-control" id="complex_name" name="apartment_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Shop Name</label>'+
						'<select class="form-control" id="shop_name" name="shop_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Level No.</label>'+
						'<input type="text" class="form-control" id="level_no" name="level_no" placeholder="Enter Level No.">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="date">Activation Date</label>'+
						'<input type="date" class="form-control" name="rent_started_at">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Rent Amount</label>'+
						'<input type="number" class="form-control" id="rent_amount" value="0.00" name="rent_amount" placeholder="Enter Rent Amount">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Advance Amount</label>'+
						'<input type="number" class="form-control" id="advance_amount" name="advance_amount" placeholder="Enter Advance Amount" value="0.00">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
			'</div>'+
			'<div>'+
				'<button type="button" style="align:left;" id="save_rent_details" class="btn btn-primary">Save</button>'+
				'<button type="button"  id="close_modal_btn" class="btn btn-success">Cancel</button>'+
			'</div>'+
			'</form>',
        label:'Rent Info.'
      },{
        content:
        '<form id="utility_bills_add_form" class="form-horizontal" role="form">'+
       ' <div class="row">'+
				'<div class="col-md-12">'+
					'<h6 style="text-align: center; color: blue;"><b>Utility Bill Details</b></h6>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Bill Type</label>'+
						'<select class="form-control" id="bill_type_id" name="bill_type_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="number">Water Bill</label>'+
						'<input type="number" class="form-control" id="water_bill" value="0.00" name="water_bill" placeholder="Enter Water Bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="wbill_check" name="is_wbill_required" value="Yes">'+
							'<span class="form-check-sign">Water bill is not required.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="number">Gas Bill</label>'+
						'<input type="number" class="form-control" id="gas_bill" value="0.00" name="gas_bill" placeholder="Enter Gas Bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="gbill_check" name="is_gbill_required" value="Yes">'+
							'<span class="form-check-sign">Gas bill is not required.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="number">Service Charge</label>'+
						'<input type="number" class="form-control" id="service_charge" value="0.00" name="service_charge" placeholder="Enter service charge">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="number">Other Charge</label>'+
						'<input type="number" class="form-control" id="other_charge" value="0.00"  name="other_charge" placeholder="Other Charge Amount">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Active Renter</label>'+
						'<select class="form-control" id="ac_renter_id" name="active_renter_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
			'</div>'+
			'<div>'+
				'<button type="button" style="align:left;" id="save_utility_bills" class="btn btn-primary">Save Utility Bill</button>'+
			'</div>'+
			'</form>',
        skip:true,
        label: 'Utility Bills'
      },{
        content:
         '<form id="electric_bills_add_form" class="form-horizontal" role="form">'+
        	'<div class="row">'+
				'<div class="col-md-12">'+
					'<h6 style="text-align: center; color: blue;"><b>Electric Bill Details</b></h6>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Electric Meter No.</label>'+
						'<input type="text" class="form-control" id="electric_meter_no" name="electric_meter_no" placeholder="Electric Meter No.">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="check_ebill_fix" name="is_ebill_fixed" value="No">'+
							'<span class="form-check-sign">Fix electric bill.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Opening Reading</label>'+
						'<input type="text" class="form-control" id="opening_reading" name="opening_reading" placeholder="Opening Meter Reading">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-group">'+
						'<label for="name">Fix Electric Bill Amount</label>'+
						'<input type="number" class="form-control" id="electric_bill_amount" disabled="disabled" value="0.00" name="fix_ebill_amount" placeholder="Fix Electric Bill Amount">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Active Renter</label>'+
						'<select class="form-control" id="active_renter_id2" name="active_renter_id2">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-group">'+
						'<label for="name">Electric Bill Types</label>'+
						'<select class="form-control" id="electricity_bills_id" name="electricity_bill_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+		
				'</div>'+
			'</div>'+
			'<div>'+
				'<button type="button" style="align:left;" id="save_electric_bills" class="btn btn-primary">Save Electric Bill</button>'+
			'</div>'+
			'</form>',
        skip: true,
        label: 'Electric Bills'
      }]

//initializing multi-step modal
$('#multi_step_add_modal').MultiStep({
  data: mySteps,
  final:'You have successfully given rent details.',
  finalLabel:'Complete',
  title:'Adding Rent Details for Renters',
  modalSize:'lg',
  prevText:'Previous',
  skipText:'Skip',
  nextText:'Next',
  finishText:'Finish',
  onClose:function() {

  },
  onDestroy:function($elem) {

  }
});

//getting renter details
$(document).on('click', '#add_rent_info_btn', function(){
	$('.btn-next').attr("disabled", "disabled");
	$('#rent_details_form1 .has-error').removeClass('has-error');
	$('#rent_details_form1').find('.help-block').empty();
	$('#electric_bills_add_form .has-error').removeClass('has-error');
	$('#electric_bills_add_form').find('.help-block').empty();
	$('#utility_bills_add_form .has-error').removeClass('has-error');
	$('#utility_bills_add_form').find('.help-block').empty();
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	html_complex = '<option value="" disabled selected>Select Complex</option>';
	html_shop     = '<option value="" disabled selected>Select Shop</option>';
	html_renterType     = '<option value="" disabled selected>Select Renter Type</option>';
	html_billType     = '<option value="" disabled selected>Select Bill Type</option>';
	$.each(renter, function(ind,val){
		html_renter += '<option value="'+val.id+'">'+val.first_name+'</option>';
	});
	$.each(complex, function(ind,val){
		html_complex += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(shop, function(ind,val){
		html_shop += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(renterType, function(ind,val){
		html_renterType += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(bill_type, function(ind,val){
		html_billType += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#renter_name').html(html_renter);
	$('#complex_name').html(html_complex);
	$('#shop_name').html(html_shop);
	$('#renter_type').html(html_renterType);
	$('#bill_type_id').html(html_billType);
	$('#close_modal_btn').click(function(){
	$('#multi_step_add_modal').modal('hide');
});

	//changing check box fields for fix electric bills
	$('input#check_ebill_fix').on('change', function(e) {
		var isDisabled = $(this).is(':checked');
		if(isDisabled){
			$('#electric_bill_amount').val("");
			$('#check_ebill_fix').val("Yes");
			$('#electric_bill_amount').removeAttr("disabled", "disabled");
		}else{
			$('#electric_bill_amount').attr("disabled", "disabled");
			$('#electric_bill_amount').val("0.00");
			$('#check_ebill_fix').val("No");
		}
	});

	//changing check box fields for fix water bills
	$('input#wbill_check').on('change', function(e) {
		var isDisabled = $(this).is(':checked');
		if(isDisabled){
			$('#water_bill').val("0.00");
			$('#wbill_check').val("No");
			$('#water_bill').attr("disabled", "disabled");
		}else{
			$('#water_bill').val("");
			$('#water_bill').removeAttr("disabled", "disabled");
			$('#wbill_check').val("Yes");
		}
	});

	//changing check box fields for fix gas bills
	$('input#gbill_check').on('change', function(e) {
		var isDisabled = $(this).is(':checked');
		if(isDisabled){
			$('#gas_bill').val("0.00");
			$('#gbill_check').val("No");
			$('#gas_bill').attr("disabled", "disabled");
		}else{
			$('#gas_bill').val("");
			$('#gbill_check').val("Yes");
			$('#gas_bill').removeAttr("disabled", "disabled");
		}
	});
});

//adding rent details at first step
$(document).on('click', '#save_rent_details', function(){
	axios.post('api/active_renters', $('#rent_details_form1').serialize()).then(function(response){
		$('.btn-next').removeAttr("disabled", "disabled");
		$('#activeRenterDataTable').DataTable().ajax.reload();
		toastr.success('Successfully Added. Go Next.');
	}).catch(function(failData){
		 $.each(failData.response.data.errors, function(inputName, errors){
              $.each(failData.response.data.errors, function(inputName, errors){
                $("#rent_details_form1 [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#rent_details_form1 [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#rent_details_form1 [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#rent_details_form1 [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
        });
	});

});
//end of adding step 1

//getting values at step-2
$(document).on('click', '.btn-next',function(){
	html_ac_renter = '<option value="" disabled selected>Select Active Renter</option>';
	html_ac_renters = '<option value="" disabled selected>Select Active Renter</option>';
	html_electric_bill = '<option value="" disabled selected>Select Electric Bill Type</option>';
	axios.get('api/active_renter_details').then(function(response){
		$.each(response.data, function(ind,val){
			html_ac_renter += '<option value="'+val.id+'">'+ val.first_name +'-'+ val.father_name +'(Father)'+'</option>';
		});
		$.each(response.data, function(ind,val){
			html_ac_renters += '<option value="'+val.id+'">'+ val.first_name +'-'+ val.father_name +'(Father)'+'</option>';
		});
		$('#ac_renter_id').html(html_ac_renter);
		$('#active_renter_id2').html(html_ac_renters);
	}).catch(function(failData){

	});
	$.each(electricity_bill, function(ind,val){
		html_electric_bill += '<option value="'+val.id+'">'+ val.bill_type.name +'</option>';
	});
	$('#electricity_bills_id').html(html_electric_bill);
});


//adding utility bill details
	$(document).on('click','#save_utility_bills', function(){
		axios.post('api/active_renter/utility_bills', $('#utility_bills_add_form').serialize()).then(function(response){	
			toastr.success('Utility bills added successfully.');
		}).catch(function(failData){
				$.each(failData.response.data.errors, function(inputName, errors){
	              $.each(failData.response.data.errors, function(inputName, errors){
	                $("#utility_bills_add_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
	                if(typeof errors == "object"){
	                    $("#utility_bills_add_form [name="+inputName+"]").parent().find('.help-block').empty();
	                    $.each(errors, function(indE, valE){
	                        $("#utility_bills_add_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
	                        $('.help-block').css("color", "red");
	                    });
	                }else{
	                    $("#utility_bills_add_form [name="+inputName+"]").parent().find('.help-block').html(valE);
	                }
	            });
	        });
		});
	});

//adding electric bill details
	$(document).on('click','#save_electric_bills', function(){
		axios.post('api/active_renter/electric_bills', $('#electric_bills_add_form').serialize()).then(function(response){
			toastr.success('Electric bills added successfully.');
		}).catch(function(failData){
			$.each(failData.response.data.errors, function(inputName, errors){
	              $.each(failData.response.data.errors, function(inputName, errors){
	                $("#electric_bills_add_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
	                if(typeof errors == "object"){
	                    $("#electric_bills_add_form [name="+inputName+"]").parent().find('.help-block').empty();
	                    $.each(errors, function(indE, valE){
	                        $("#electric_bills_add_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
	                        $('.help-block').css("color", "red");
	                    });
	                }else{
	                    $("#electric_bills_add_form [name="+inputName+"]").parent().find('.help-block').html(valE);
	                }
	            });
	        });
		});
	});

//delete active renter details
$(document).on('click', '.delete-modal', function(){
	$('#id').val($(this).data('id'));
	$('#active_renter_delete_modal').modal();
});

$('#ar_deleteBtn').click(function(){
	var id = $('#id').val();
	axios.delete('api/active_renters'+'/'+id, {
		data: $('ar_delete_form').serialize()
	}).then(function(resData){
		$('#activeRenterDataTable').DataTable().ajax.reload();
		$('#active_renter_delete_modal').modal('hide');
		toastr.warning('Active Renter Deleted Successfully.');	
	}).catch(function(failData){
		alert("Can not delete this active renter.");
	});
});
//end of delete active renter details
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//datatable value
var activeRenterDataTable = $('#activeRenterDataTable').DataTable({

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
				var pageInfo = activeRenterDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '25px',
			'render' : function(data, type, row, ind){
				// return '<span class="edit-modal btn btn-link btn-primary btn-lg" data-id = '+data+'><i class="fa fa-edit"></i></span><span class="delete-modal btn btn-link btn-danger" data-id = '+data+'><i class="fa fa-times"></i></span>';
				return '<span class="delete-modal glyphicon glyphicon-trash" data-id = '+data+' data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></span>';
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
			'title' : 'Renter Type',
			'name' : 'renterTypeName',
			'data' : 'renterTypeName'
		},
		{
			'title' : 'Level No',
			'name' : 'level_no',
			'data' : 'level_no'
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
			'title' : 'Rent Strarted At',
			'name' : 'rent_started_at',
			'data' : 'rent_started_at'
		}
		],
		serverSide : true,
		processing : true,
		responsive : true,
		ajax: {
			url: utlt.siteUrl('api/active_renters'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection