@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<a class="btn btn-secondary btn-round" href="{{ url('/renter_details') }}">
<i class="fas fa-angle-double-right text-info"></i><strong> View Details</strong></a>
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#multi_step_add_modal" id="add_rent_info_btn"><i class="fas fa-plus text-success"></i><strong> Add Rent Info.</strong></button>
@endsection
@section('card-title')
<b>Active Renter's List</b>
@endsection
@section('body')
	{{-- start modals --}}
    @include('active_renter.delete')
    @include('active_renter.update_ubill_modal')
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
var bill_type    = <?php echo json_encode($bill_type)?>;
var renterType    = <?php echo json_encode($renterType)?>;
var activeRenter    = <?php echo json_encode($activeRenter)?>;

window.addEventListener("load",function(){
//multi step active rental add
const mySteps = [{
        content: 
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
						'<select class="form-control" id="renter_name" name="renter_information_id">'+
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
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Shop Name</label>'+
						'<input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter shop name.">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="name">Level No.</label>'+
						'<input type="text" class="form-control" id="level_no" name="level_no" placeholder="Enter Level No.">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-4">'+
					'<div class="form-group">'+
						'<label for="date">Activation Date</label>'+
						'<input type="text" class="form-control" data-toggle="datepicker" name="rent_started_at" placeholder="yyyy-mm-dd">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="name">Rent Amount</label>'+
						'<input type="number" class="form-control" id="rent_amount" value="0.00" name="rent_amount" placeholder="rent amount">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="name">Advance Amount</label>'+
						'<input type="number" class="form-control" id="advance_amount" name="advance_amount" placeholder="advance amount" value="0.00">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-6" style="text-align: left;">'+
					'<button type="button" style="margin-top:45px;" id="save_rent_details" class="btn btn-primary btn-round">Save</button>'+
					'<button type="button" style="margin-top:45px;"  id="close_modal_btn" class="btn btn-warning btn-round">Cancel</button>'+
				'</div>'+	
			'</div>'+
			'</form>',
        label:'Adding Rent Details'
      },{
        content:
        '<form id="ubill_add_form" class="form-horizontal" role="form">'+
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<div class="form-group">'+
						'<label for="name">Select Active Renter</label>'+
						'<select class="form-control" id="ac_renter_id" name="active_renter_id">'+
						'</select>'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">House Rent</label>'+
						'<input type="number" class="form-control add-bill" name="house_rent" value="0.00" placeholder="house rent">'+
						'<span class="help-block"></span>'+
					'</div>'+	
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Electric Bill</label>'+
						'<input type="number" class="form-control add-bill" name="electric_bill" value="0.00"  placeholder="electric bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Water Bill</label>'+
						'<input type="number" name="water_bill" class="form-control add-bill" value="0.00"  placeholder="water bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Gas Bill</label>'+
						'<input type="number" class="form-control add-bill"  name="gas_bill" value="0.00" placeholder="gas bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Internet Bill</label>'+
						'<input type="number" class="form-control add-bill" name="internet_bill"  value="0.00"  placeholder="net bill">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Service Charge</label>'+
						'<input type="number" class="form-control add-bill"  name="service_charge" value="0.00" placeholder="service charge">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Other Charge</label>'+
						'<input type="number" class="form-control add-bill"  name="other_charge" value="0.00" placeholder="other charge">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-3">'+
					'<div class="form-group">'+
						'<label for="number">Monthly Total Rent</label>'+
						'<input type="number" class="form-control total-bill"  name="total_monthly_bill" value="0.00" placeholder="other charge" readonly>'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="col-md-6" style="text-align:left;">'+
						'<button type="button" style="margin-top: 45px;" id="save_utility_bills" class="btn btn-secondary btn-round">Save Utility Bill</button>'+
				'</div>'+
			'</div>'+
			'</form>',
        label: 'Adding Utility Bill Details'
      }]

//initializing multi-step modal
//Multistep modal plugin link-----https://www.jqueryscript.net/other/multi-step-modal-wizard.html
$('#multi_step_add_modal').MultiStep({
  data: mySteps,
  final:'You have successfully given rent details.',
  finalLabel:'Complete',
  title:'<b>Adding Rent Details for Renters</b>',
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
//datepicker details
$(function(){
  $('[data-toggle="datepicker"]').datepicker({
    autoHide: true,
    zIndex: 2048,
    format: 'yyyy-mm-dd',
  });	
});
//getting renter details
$(document).on('click', '#add_rent_info_btn', function(){
	//$('.btn-next').attr("disabled", "disabled");
	$('#rent_details_form1 .has-error').removeClass('has-error');
	$('#rent_details_form1').find('.help-block').empty();
	$('#ubill_add_form .has-error').removeClass('has-error');
	$('#ubill_add_form').find('.help-block').empty();
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	html_complex = '<option value="" disabled selected>Select Complex</option>';
	html_renterType     = '<option value="" disabled selected>Select Renter Type</option>';
	html_billType     = '<option value="" disabled selected>Select Bill Type</option>';
	$.each(renter, function(ind,val){
		html_renter += '<option value="'+val.id+'">'+val.renter_name+' ('+val.father_name+')</option>';
	});
	$.each(complex, function(ind,val){
		html_complex += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(renterType, function(ind,val){
		html_renterType += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$.each(bill_type, function(ind,val){
		html_billType += '<option value="'+val.id+'">'+val.name+'</option>';
	});
	$('#renter_name').html(html_renter);
	$('#complex_name').html(html_complex);
	$('#renter_type').html(html_renterType);
	$('#bill_type_id').html(html_billType);

	$('#close_modal_btn').click(function(){
		$('#multi_step_add_modal').modal('hide');
	});
});

//calculating the total bill and appending on total bill field
$(document).on("change", ".add-bill", function() {
    var sum = 0;
    $(".add-bill").each(function(){
        sum += +$(this).val();
    });
    $(".total-bill").val(sum);
});

//adding rent details at first step
$(document).on('click', '#save_rent_details', function(){
	$('#rent_details_form1 .has-error').removeClass('has-error');
	$('#rent_details_form1').find('.help-block').empty();
	axios.post('api/active_renters', $('#rent_details_form1').serialize()).then(function(response){
		//$('.btn-next').removeAttr("disabled", "disabled");
		$("#rent_details_form1").trigger("reset");
		$(document).find('.stepcurrent').removeClass("current").addClass("completed");
		$("[data-step=2]").find().addClass("current");
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
	axios.get('api/active_renter_details').then(function(response){
		$.each(response.data, function(ind,val){
			html_ac_renter += '<option value="'+val.id+'">'+ val.renter_name +'-'+ val.father_name +'(Father)'+'</option>';
		});
		$('#ac_renter_id').html(html_ac_renter);
	}).catch(function(failData){

	});
});

//adding utility bill details
	$(document).on('click','#save_utility_bills', function(){
		$('#ubill_add_form .has-error').removeClass('has-error');
		$('#ubill_add_form').find('.help-block').empty();
		axios.post('api/active_renter/utility_bills', $('#ubill_add_form').serialize()).then(function(response){	
			toastr.success('Utility bills added successfully.');
			$('#multi_step_add_modal').modal('hide');
		}).catch(function(failData){
				$.each(failData.response.data.errors, function(inputName, errors){
	              $.each(failData.response.data.errors, function(inputName, errors){
	                $("#ubill_add_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
	                if(typeof errors == "object"){
	                    $("#ubill_add_form [name="+inputName+"]").parent().find('.help-block').empty();
	                    $.each(errors, function(indE, valE){
	                        $("#ubill_add_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
	                        $('.help-block').css("color", "red");
	                    });
	                }else{
	                    $("#ubill_add_form [name="+inputName+"]").parent().find('.help-block').html(valE);
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

//add utility bill details for renter
$(document).on('click', '.update_ubill_modal', function(){
	var uid = $('#ubill_id').val($(this).data('uid'));
	var id2 = $(document).find('#ubill_update_form input[name="ubill_id2"]').val();
	$('#acrUbillupdateModal').modal();
	axios.get('api/get_ubill_details/'+id2).then(function(response){
		$('.add-bill').val("");
		$('#house_rent').val(response.data.house_rent);
		$('#electric_bill').val(response.data.electric_bill);
		$('#water_bill').val(response.data.water_bill);
		$('#gas_bill').val(response.data.gas_bill);
		$('#internet_bill').val(response.data.internet_bill);
		$('#service_charge').val(response.data.service_charge);
		$('#other_charge').val(response.data.other_charge);
		$('#total_monthly_bill').val(response.data.total_monthly_rent);
	}).catch(function(failData){

	});
});

//update utility bill details when update button clicked
$(document).on('click', '#update_ubill_btn', function(){
	var id3 = $('#ubill_id').val();
	axios.post('api/update_ubill_details/'+id3, $('#ubill_update_form').serialize()).then(function(response){
		$('#activeRenterDataTable').DataTable().ajax.reload();
		toastr.warning('Utility bills updated successfully.');
		$('#acrUbillupdateModal').modal('hide');
	}).catch(function(failData){

	});
});

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
				if(row.utility_bill == null){
					$action_dropdown =	
					'<div class="dropdown show">'+
					  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
					  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
					    // '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
					    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
                        '<a class="dropdown-item add_ubill_modal" data-id = '+ data +'><i class="fa fa-plus text-success"></i> Add Utility Bill</a>'+
                        '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
					  '</div>'+
					'</div>';
					return $action_dropdown;
				}
				else if(row.utility_bill != null){
					$action_dropdown =	
					'<div class="dropdown show">'+
					  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
					  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
					    // '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
					    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
                        '<a class="dropdown-item update_ubill_modal" data-id = '+ data +' data-uid = '+row.utility_bill.id+'><i class="fa fa-external-link-alt text-primary"></i> Update Utility Bill</a>'+
                        '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
					  '</div>'+
					'</div>';
					return $action_dropdown;
				}
			}
		},
		{
			'title' : 'Renter Name',
			'name' : 'renterName',
			'data' : 'renterName'
		},
		{
			'title' : 'Complex Name',
			'name' : 'complexName',
			'data' : 'complexName'
		},
		{
			'title' : 'Renter Type',
			'name' : 'renterTypeName',
			'data' : 'renterTypeName'
		},
		{
			'title' : 'Rent Strarted At',
			'name' : 'rent_started_at',
			'data' : 'rent_started_at'
		},
		{
			'title' : 'Advance Paid',
			'name' : 'advance_amount',
			'data' : 'advance_amount',
			'render' : function(data, type, row, ind){
				return data + ' tk';
			}
		},
		{
			'title' : 'Monthly Total Rent',
			'name' : 'total_monthly_rent',
			'data' : 'total_monthly_rent',
			'render' : function(data, type, row, ind){
				if(row.utility_bill != null){
					var total_rent = row.utility_bill.total_monthly_rent;
					return total_rent + ' tk';
				}else{
					var bill_msg = '<span style="color:red;"><b>Bill Not Added</b</span>';
					return bill_msg;
				}
			}
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
// end datatable
 });
</script>
@endsection