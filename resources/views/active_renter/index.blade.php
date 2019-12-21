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
						'<select class="form-control" id="complex_name" name="complex_id">'+
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
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="date">Activation Date</label>'+
						'<input type="date" class="form-control" name="rent_started_at">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Rent Amount</label>'+
						'<input type="text" class="form-control" id="rent_amount" name="rent_amount" placeholder="Enter Rent Amount">'+
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
						'<input type="number" class="form-control" id="water_bill" name="water_bill" placeholder="Enter Water Bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="wbill_check" name="" value="">'+
							'<span class="form-check-sign">Water bill is not required.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="number">Gas Bill</label>'+
						'<input type="number" class="form-control" id="gas_bill" name="gas_bill" placeholder="Enter Gas Bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="gbill_check" value="">'+
							'<span class="form-check-sign">Gas bill is not required.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="number">Service Charge</label>'+
						'<input type="number" class="form-control" id="service_charge" name="service_charge" placeholder="Enter Water Bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="number">Other Charge</label>'+
						'<input type="number" class="form-control" id="other_charge" name="other_charge" placeholder="Other Charge Amount">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
			'</div>',
        skip:true,
        label: 'Utility Bills'
      },{
        content:
        	'<div class="row">'+
				'<div class="col-md-12">'+
					'<h6 style="text-align: center; color: blue;"><b>Electric Bill Details</b></h6>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Electric Meter No.</label>'+
						'<input type="text" class="form-control" id="electric_meter_no" name="electric_meter_no" placeholder="Electric Meter No.">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-check">'+
						'<label class="form-check-label">'+
							'<input class="form-check-input" type="checkbox" id="check_ebill_fix" value="Yes">'+
							'<span class="form-check-sign">Fix electric bill.</span>'+
						'</label>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Opening Reading</label>'+
						'<input type="text" class="form-control" id="opening_reading" name="opening_reading" placeholder="Opening Meter Reading">'+
						'<span class="help-block"></span>'+
					'</div>'+
					'<div class="form-group">'+
						'<label for="name">Fix Electric Bill Amount</label>'+
						'<input type="number" class="form-control" id="electric_bill_amount" disabled="disabled" name="electric_meter_no" placeholder="Fix Electric Bill Amount">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
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
	//$('.btn-next').attr("disabled", "disabled");
	$('#rent_details_form1 .has-error').removeClass('has-error');
	$('#rent_details_form1').find('.help-block').empty();
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
			$('#electric_bill_amount').removeAttr("disabled", "disabled");
		}else{
			$('#electric_bill_amount').attr("disabled", "disabled");
		}
	});

	//changing check box fields for fix water bills
	$('input#wbill_check').on('change', function(e) {
		var isDisabled = $(this).is(':checked');
		if(isDisabled){
			$('#water_bill').val("0.00");
			$('#water_bill').attr("disabled", "disabled");
		}else{
			$('#water_bill').val(" ");
			$('#water_bill').removeAttr("disabled", "disabled");
		}
	});

	//changing check box fields for fix gas bills
	$('input#gbill_check').on('change', function(e) {
		var isDisabled = $(this).is(':checked');
		if(isDisabled){
			$('#gas_bill').val("0.00");
			$('#gas_bill').attr("disabled", "disabled");
		}else{
			$('#gas_bill').val(" ");
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

//delete active renter details
$(document).on('click', '.delete-modal', function(){
	$('#id').val($(this).data('id'));
	$('#active_renter_delete_modal').modal();
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
});
//end of delete active renter details

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
			'width' : '135px',
			'render' : function(data, type, row, ind){
				return '<span class="edit-modal btn btn-link btn-primary btn-lg" data-id = '+data+'><i class="fa fa-edit"></i></span><span class="delete-modal btn btn-link btn-danger" data-id = '+data+'><i class="fa fa-times"></i></span>';
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
		ajax: {
			url: utlt.siteUrl('api/active_renters'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection