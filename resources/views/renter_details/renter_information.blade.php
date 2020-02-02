@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('card-title')
<b>Manage Active Renter Details</b>
@endsection
@section('body')
<div class="container-fluid">
	<div class="align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm" style="background: cadetblue;">
       <form id="renter_info_search_form" class="form-horizontal" role="form">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="hidden" name="renter_search_id" id="renter_search_id">
					<label for="name"><strong  style="font-size: 18px;">Renter Name</strong></label>
					<select class="form-control" id="search_renter_name" name="renter_id">
					</select>
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-3">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6" align="center">
				<button type="button" id="search_renter_info_btn" class="btn btn-secondary btn-round">Search</button>
			</div>
			<div class="col-md-3">
			</div>
		</div>	
		</form>
    </div>
	<div class="row">
		
	</div>
	<div class="row" id="renter_info_div">
		
	</div>
	<div class="row">
		@include('renter_details.add')
		@include('renter_details.update_rent_details')
		@include('renter_details.update_other_bills')
		@include('renter_details.update_utility_bills')
		@include('renter_details.update_electric_bill')
	</div>
</div>
@endsection

@push('javascript')
<script type="text/javascript">
	var complex = <?php echo json_encode($complex)?>;
	var renterType = <?php echo json_encode($renterType)?>;
	var bill_type_2 = <?php echo json_encode($bill_type)?>;
	var renter_info  = <?php echo json_encode($renter_info)?>;
	var activeRenter  = <?php echo json_encode($activeRenter)?>;

window.addEventListener("load",function(){
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	$.each(activeRenter, function(ind,val){
		html_renter += '<option id="'+val.id+'" value="'+val.id+'">'+val.renter_name+' -'+ val.father_name +' (Father)'+'</option>';
	});
	$('#search_renter_name').html(html_renter);
	$("#search_renter_name").change(function() {
		var id = $(this).children(":selected").attr("id");
		$('#renter_search_id').val(id);
	});

	//getting values at update

	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			data(response);
		}).catch(function(failData){
			alert("Select renter name to see details !!");
		});
	});
	
	//datepicker details
	$(function(){
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'yyyy-mm-dd',
		  });
	});

	//getting values at update rent details
	$(document).on('click', '.update-rd-btn', function(){
		$('#update_rent_details_modal').modal();
		$('#update_rent_details_form .has-error').removeClass('has-error');
        $('#update_rent_details_form').find('.help-block').empty();

		renter_name_2 = '<option value="" disabled selected>Select Renter</option>';
		complex_name_2 = '<option value="" disabled selected>Select Complex</option>';
		html_renterType_2  = '<option value="" disabled selected>Select Renter Type</option>';
		html_billType_2     = '<option value="" disabled selected>Select Bill Type</option>';

		var ubill_id = $(document).find('#update_rent_details_form input[name="utility_bill_id"]').val();
		var id = ubill_id;
		axios.get('api/get_utility_bill_details/'+id).then(function(response){
			//console.log(response);
			$.each(renter_info, function(ind,val){
				if(val.first_name == response.data.active_renter.renter.first_name){
					renter_name_2 += '<option id="'+val.id+'" value="'+val.id+'" selected>'+val.first_name+' -'+ val.father_name +' (Father)'+'</option>';
				}else{
					renter_name_2 += '<option id="'+val.id+'" value="'+val.id+'">'+val.first_name+' -'+ val.father_name +' (Father)'+'</option>';
				}
			});
			$.each(complex, function(ind,val){
				if(val.name == response.data.active_renter.apartment.name){
					complex_name_2 += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					complex_name_2 += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$.each(renterType, function(ind,val){
				if(val.name == response.data.active_renter.renter_type.name){
					html_renterType_2 += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_renterType_2 += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});
			$('#renter_name_2').html(renter_name_2);
			$('#complex_name_2').html(complex_name_2);
			$('#renter_type_2').html(html_renterType_2);

			$('#activation_date_2').val(response.data.active_renter.rent_started_at);
			$('#level_no_2').val(response.data.active_renter.level_no);
			$('#rent_amount_2').val(response.data.active_renter.rent_amount);
			$('#advance_amount_2').val(response.data.active_renter.advance_amount);

		}).catch(function(failData){
			alert("Can not update rent details !!");
		});
	});

	//update the rent details
	$('#update_rd_btn').click(function(){
		var up_id = $('#active_renter_id_3').val();
		var id = up_id;
		axios.post('api/update_renter_details/'+id, $('#update_rent_details_form').serialize()).then(function(response){
			$('#update_rent_details_modal').modal('hide');
			toastr.success('Successfully updated rent info. ');
		}).catch(function(failData){
			$.each(failData.response.data.errors, function(inputName, errors){
                $("#update_rent_details_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#update_rent_details_form [name="+inputName+"]").parent().find('.help-block').empty();

                    $.each(errors, function(indE, valE){
                        $("#update_rent_details_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                         $('.help-block').css("color", "red");
                    });
                }
                else{
                    $("#update_rent_details_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            }); 
		});
	});

	//update utility bill details of active renters & getting values at modal
	$(document).on('click', '.update-ubill-btn', function(){
		$('#update_utility_bill_details_modal').modal();
		$('#utility_bills_update_form .has-error').removeClass('has-error');
        $('#utility_bills_update_form').find('.help-block').empty();
        $('#utility_bills_update_form').trigger('reset');
        html_bill_type_2 = '<option value="" disabled selected>Select Bill Type</option>';
        var ubill_id = $(document).find('#update_rent_details_form input[name="utility_bill_id"]').val();
		var id = ubill_id;
		if(id == undefined || id == null || id == ""){
			alert("no id");
		}
        axios.get('api/get_utility_bill_details/'+id).then(function(response){
        	//console.log(response);
			$.each(bill_type_2, function(ind,val){
				if(val.name == response.data.bill_type.name){
					html_bill_type_2 += '<option value="'+val.id+'" selected>'+val.name+'</option>';
				}else{
					html_bill_type_2 += '<option value="'+val.id+'">'+val.name+'</option>';
				}
			});

			$('#bill_type_id_2').html(html_bill_type_2);
			$('#water_bill_2').val(response.data.water_bill);
			$('#gas_bill_2').val(response.data.gas_bill);
			$('#service_charge_2').val(response.data.service_charge);
			$('#other_charge_2').val(response.data.other_charge);
			if(typeof response.data.water_bill == null || response.data.water_bill == undefined || response.data.water_bill == "0.00"){
				$('#wbill_check_2').attr("checked", "checked");
				$('#water_bill_2').attr("disabled", "disabled");
				$('#water_bill_2').val("0.00");
			}
			if(typeof response.data.gas_bill == null || response.data.gas_bill == undefined || response.data.gas_bill == "0.00"){
				$('#gbill_check_2').attr("checked", "checked");
				$('#gas_bill_2').attr("disabled", "disabled");
				$('#gas_bill_2').val("0.00");
			}

				//changing check box fields for fix gas bills at update utility bill settings
				$('input#gbill_check_2').on('change', function(e) {
					var isDisabled = $(this).is(':checked');
					if(isDisabled){
						$('#gas_bill_2').val("0.00");
						$('#gbill_check_2').val("No");
						$('#gas_bill_2').attr("disabled", "disabled");
					}else{
						$('#gas_bill_2').val("");
						$('#gbill_check_2').val("Yes");
						$('#gas_bill_2').removeAttr("disabled", "disabled");
						$('#gas_bill_2').val(response.data.gas_bill);
					}
				});

				//changing check box fields for fix water bills at update utility bill settings
				$('input#wbill_check_2').on('change', function(e) {
					var isDisabled = $(this).is(':checked');
					if(isDisabled){
						$('#water_bill_2').val("0.00");
						$('#wbill_check_2').val("No");
						$('#water_bill_2').attr("disabled", "disabled");
					}else{
						$('#water_bill_2').val("");
						$('#water_bill_2').removeAttr("disabled", "disabled");
						$('#wbill_check_2').val("Yes");
						$('#water_bill_2').val(response.data.water_bill);
					}
				});
        }).catch(function(failData){
        	alert("Can not update utility bills !!");
        });
	});

	//update utility bills when update btn is clicked
	$('#update_ubill_btn').click(function(){
		var id = $(document).find('#utility_bills_update_form input[name="ubill_id_2"]').val();
		axios.post('api/update_utility_bills/'+id, $('#utility_bills_update_form').serialize()).then(function(response){
			$('#update_utility_bill_details_modal').modal('hide');
			utility_bill_show(response);
			toastr.success('Successfully updated utility bills.');
		}).catch(function(failData){
			alert("Update Failed !!");
		});
	});

	//update electric bill details of active renters and getting and settings billings
	$(document).on('click', '.update-ebill-btn', function(){
		$('#update_electric_bill_details_modal').modal();
		$('#electric_bills_edit_form .has-error').removeClass('has-error');
        $('#electric_bills_edit_form').find('.help-block').empty();
        $('#electric_bills_edit_form').trigger('reset');
		html_bill_type = '<option value="" disabled selected>Select Electric Bill Type</option>';
		var ubill_id = $(document).find('#update_rent_details_form input[name="utility_bill_id"]').val();
		var id = ubill_id;
        axios.get('api/get_utility_bill_details/'+id).then(function(response){
        	//console.log(response);
			$.each(electricity_bill, function(ind,val){
				if(val.bill_type.name == response.data.electricity_bill.bill_type.name){
					html_bill_type += '<option value="'+val.id+'" selected>'+val.bill_type.name+'</option>';
				}else{
					html_bill_type += '<option value="'+val.id+'">'+val.bill_type.name+'</option>';
				}
			});
			$('#electricity_bills_id_2').html(html_bill_type);
			$('#electric_meter_no_2').val(response.data.electric_meter_no);
			$('#opening_reading_2').val(response.data.opening_reading);
			$('#electric_bill_amount_2').val(response.data.fix_ebill_amount);

			if(typeof response.data.fix_ebill_amount == null || response.data.fix_ebill_amount == undefined || response.data.fix_ebill_amount == "0.00"){
				$('#electric_bill_amount_2').attr("disabled", "disabled");
				$('#electric_bill_amount_2').val("0.00");	
			}else{
				$('#electric_bill_amount_2').removeAttr("disabled", "disabled");
				$('#electric_bill_amount_2').val(response.data.fix_ebill_amount);
				$('#check_ebill_fix_2').attr("checked", "checked");
			}

				//changing check box fields for fix gas bills at update utility bill settings
				$('input#check_ebill_fix_2').on('change', function(e) {
					var isDisabled = $(this).is(':checked');
					if(isDisabled){
						$('#electric_bill_amount_2').val(response.data.fix_ebill_amount);
						$('#check_ebill_fix_2').val("Yes");
						$('#electric_bill_amount_2').removeAttr("disabled", "disabled");
					}else{
						$('#electric_bill_amount_2').attr("disabled", "disabled");
						$('#electric_bill_amount_2').val("0.00");
					}
				});

			//$('#electricity_bills_id_2').val(response.data.opening_reading);
			//$('#check_ebill_fix_2').val(response.data.is_ebill_fixed);
			//$('#check_ebill_fix_2').val(response.data.electricity_bill.bill_type.name);
		}).catch(function(){
			alert("Can not set previous value.");
		});	
	});

	//update ebill button code
	$('#update_ebill_btn_1').click(function(){
		var id = $(document).find('#electric_bills_edit_form input[name="ubill_id_3"]').val();
		axios.post('api/update_electric_bills/'+id, $('#electric_bills_edit_form').serialize()).then(function(response){
			$('#update_electric_bill_details_modal').modal('hide');
			toastr.success('Successfully updated Electric bill details !!');
		}).catch(function(failData){
			$.each(failData.response.data.errors, function(inputName, errors){
                $("#electric_bills_edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#electric_bills_edit_form [name="+inputName+"]").parent().find('.help-block').empty();

                    $.each(errors, function(indE, valE){
                        $("#electric_bills_edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                         $('.help-block').css("color", "red");
                    });
                }
                else{
                    $("#electric_bills_edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
		});
	});

	//update other service charges of active renters
	$(document).on('click', '.update-obill-btn', function(){
		$('#update_other_bill_details_modal').modal();
		$('#update_other_bill_details_form .has-error').removeClass('has-error');
        $('#update_other_bill_details_form').find('.help-block').empty();
        $('#update_other_bill_details_form').trigger('reset');
		var other_bill_id = $(document).find('#update_rent_details_form input[name="utility_bill_id"]').val();
		var id = other_bill_id;
		axios.get('api/get_other_bill_details/'+id).then(function(response){
			console.log(response);
			if(response.data.electricity_bill != 'undefined' && response.data.electricity_bill != null){
				$('#add_minimum_unit_2').val(response.data.electricity_bill.minimum_unit);
				$('#add_duty_on_kwh_2').val(response.data.electricity_bill.duty_on_kwh);
				$('#add_demand_charge_2').val(response.data.electricity_bill.demand_charge);
				$('#add_machine_charge_2').val(response.data.electricity_bill.machine_charge);
				$('#add_service_charge_2').val(response.data.electricity_bill.service_charge);
				$('#add_vat_2').val(response.data.electricity_bill.vat);
				$('#add_delay_charge_2').val(response.data.electricity_bill.delay_charge);
				$('#electricity_bill_id').val(response.data.electricity_bill.id);
			}
		}).catch(function(failData){
			alert("Can not get other bill details !!");
		});
	});
});

//update other billing details 
$('#update_other_bill_btn').click(function(){
	var id = $(document).find('#electric_bills_edit_form input[name="ubill_id_3"]').val();
	axios.post('api/update_other_bill_details/'+id, $('#update_other_bill_details_form').serialize()).then(function(response){
		$('#update_other_bill_details_modal').modal('hide');
		toastr.success('Successfully updated other bills.');
	}).catch(function(failData){
		$.each(failData.response.data.errors, function(inputName, errors){
            $("#update_other_bill_details_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
            if(typeof errors == "object"){
                $("#update_other_bill_details_form [name="+inputName+"]").parent().find('.help-block').empty();

                $.each(errors, function(indE, valE){
                    $("#update_other_bill_details_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                     $('.help-block').css("color", "red");
                });
            }
            else{
                $("#update_other_bill_details_form [name="+inputName+"]").parent().find('.help-block').html(valE);
            }
        });
	});
});

//removing alters at view active renter details
var first_click = true;
$("#ubill_list").click(function(){
	if(first_click){
		$("#notify_ubill_div").delay(3200).fadeOut(300);
		first_click = false;
	}else{

	}
});

var ebill_first_click = true;
$("#ebill_list").click(function(){
	if(ebill_first_click){
		$("#notify_ebill_div").delay(3200).fadeOut(300);
		ebill_first_click = false;
	}else{

	}
});

var obill_first_click = true;
$("#obill_list").click(function(){
	if(obill_first_click){
		$("#notify_obill_div").delay(3200).fadeOut(300);
		obill_first_click = false;
	}else{

	}
});

//function for showing data after searching
function data(response){
	//console.log(response);
	$('.container').removeAttr('style');
	$(document).find('.profile-values td p').text("");
	$('#update_rd_div').css('display','inherit');
	$('#update_ubill_div').css('display','inherit');
	$('#update_ebill_div').css('display','inherit');
	$('#update_obill_div').css('display','inherit');
	$('#notify_obill_div').css('display','inherit');
	$('#notify_ubill_div').css('display','inherit');
	$('#notify_ebill_div').css('display','inherit');
	if(response.data.utility_bill != 'undefined' && response.data.utility_bill != null){
		//console.log(response.data.utility_bill.id);
		$('#utility_bill_id_2').val(response.data.utility_bill.id);
		$('#ubill_id_2').val(response.data.utility_bill.id);
		$('#ubill_id_3').val(response.data.utility_bill.id);
		$('#active_renter_id_3').val(response.data.id);
		$('#active_renter_id_4').val(response.data.id);
	}
	
	//general information
	if(typeof response.data.renter != 'undefined' &&  response.data.renter != null){
			$('#renter_name').text(response.data.renter.first_name);
			$('#father_name').text(response.data.renter.father_name);
			if(typeof response.data.renter.email!= 'undefined' &&  response.data.renter.email!= null){
				$('#email_address').text(response.data.renter.email);
			}else{
				$('#email_address').text("Null");
			}
			$('#date_of_birth').text(response.data.renter.date_of_birth);
			$('#nid_no').text(response.data.renter.nid_no);
			$('#renter_photo').attr("src", response.data.renter.photo);
			$('#nid_photo').attr("src", response.data.renter.nid_photo);
			$('#phone').text(response.data.renter.phone);
			$('#mobile').text(response.data.renter.mobile);	
	}

	//rent details
	if(typeof response.data.renter_type != 'undefined' &&  response.data.renter_type != null){
		$('#renter_type').text(response.data.renter_type.name);
	}

	if(typeof response.data.apartment != 'undefined' &&  response.data.apartment != null){
		$('#complex_no').text(response.data.apartment.apartment_no);
		$('#apartment_name').text(response.data.apartment.name);
	}

	if(typeof response.data != 'undefined' &&  response.data != null){
		$('#level_no').text(response.data.level_no);
		$('#rent_amount').text(response.data.rent_amount);
		$('#advance_amount').text(response.data.advance_amount);
		$('#rent_started_at').text(response.data.rent_started_at);
	}

	//getting and apending address
	if(typeof response.data.renter.address != 'undefined' &&  response.data.renter.address != null){
		$address = response.data.renter.address.address_line1 + ' , ' + response.data.renter.address.thana.name+ ' , ' + 'Post- '+ response.data.renter.address.postal_code + ' , ' + response.data.renter.address.city.name + ' , ' + response.data.renter.address.country.name;
		$('#address').text($address);
	}

	//utility billing details
	if(typeof response.data.utility_bill != 'undefined' &&  response.data.utility_bill != null){
		$('#bill_type').text(response.data.utility_bill.bill_type.name);

			if(typeof response.data.utility_bill.water_bill == null || response.data.utility_bill.water_bill == undefined || response.data.utility_bill.water_bill == "0.00"){
					$('#is_water_bill_required').text("Not Required");
					$('#water_bill').text("0.00");
				}else{
					$('#is_water_bill_required').text("Required");
					$('#water_bill').text(response.data.utility_bill.water_bill);
				}

			if(typeof response.data.utility_bill.gas_bill == null || response.data.utility_bill.gas_bill == undefined || response.data.utility_bill.gas_bill == "0.00"){
				$('#is_gas_bill_required').text("Not Required");
				$('#gas_bill').text("0.00");
			}else{
				$('#is_gas_bill_required').text("Required");
				$('#gas_bill').text(response.data.utility_bill.gas_bill);
			}

		$('#other_charge').text(response.data.utility_bill.other_charge);
		$('#service_charge').text(response.data.utility_bill.service_charge);

		//electricity billing details
		if(typeof response.data.utility_bill.electricity_bill != 'undefined' &&  response.data.utility_bill.electricity_bill != null){
			$('#ebill_type').text(response.data.utility_bill.electricity_bill.bill_type.name);
				//other billing charges
			$('#minimum_unit').text(response.data.utility_bill.electricity_bill.minimum_unit);
			// $('#duty_on_kwh').text(response.data.utility_bill.electricity_bill.duty_on_kwh);
			$('#demand_charge').text(response.data.utility_bill.electricity_bill.demand_charge);
			$('#machine_charge').text(response.data.utility_bill.electricity_bill.machine_charge);
			$('#service_charge_2').text(response.data.utility_bill.electricity_bill.service_charge);
			$('#vat').text(response.data.utility_bill.electricity_bill.vat);
			$('#delay_charge').text(response.data.utility_bill.electricity_bill.delay_charge);
		}
		$('#electric_meter_no').text(response.data.utility_bill.electric_meter_no);
		$('#opening_reading').text(response.data.utility_bill.opening_reading);
		if(typeof response.data.utility_bill.fix_ebill_amount != 'undefined' &&  response.data.utility_bill.fix_ebill_amount != null){
			$('#fix_ebill_amount').text(response.data.utility_bill.fix_ebill_amount);
			$('#is_ebill_fixed').text("Electric bill is fixed.");	
		}else{
			$('#fix_ebill_amount').text("0.00");
			$('#is_ebill_fixed').text("Electric bill is not fixed.");
		}
	}
}

// function utility_bill_show(response){
// 	//$(document).find('#Utility_bills td p').text("");
// 	//utility billing details
// 	if(typeof response.data.utility_bill != 'undefined' &&  response.data.utility_bill != null){
// 		$('#bill_type').text(response.data.utility_bill.bill_type.name);
// 			if(typeof response.data.utility_bill.water_bill == null || response.data.utility_bill.water_bill == undefined || response.data.utility_bill.water_bill == "0.00"){
// 					$('#is_water_bill_required').text("Not Required");
// 					$('#water_bill').text("0.00");
// 				}else{
// 					$('#is_water_bill_required').text("Required");
// 					$('#water_bill').text(response.data.utility_bill.water_bill);
// 				}

// 			if(typeof response.data.utility_bill.gas_bill == null || response.data.utility_bill.gas_bill == undefined || response.data.utility_bill.gas_bill == "0.00"){
// 				$('#is_gas_bill_required').text("Not Required");
// 				$('#gas_bill').text("0.00");
// 			}else{
// 				$('#is_gas_bill_required').text("Required");
// 				$('#gas_bill').text(response.data.utility_bill.gas_bill);
// 			}
// 		$('#other_charge').text(response.data.utility_bill.other_charge);
// 		$('#service_charge').text(response.data.utility_bill.service_charge);
// 	}
// } 
</script>
@endpush
