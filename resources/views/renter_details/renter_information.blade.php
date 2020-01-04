@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('card-title')
<b>Renter Details</b>
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
	</div>
</div>
@endsection

@push('javascript')
<script type="text/javascript">
	// datatable starts
var renter_info  = <?php echo json_encode($renter_info)?>;
var activeRenter  = <?php echo json_encode($activeRenter)?>;

window.addEventListener("load",function(){
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	$.each(activeRenter, function(ind,val){
		html_renter += '<option id="'+val.id+'" value="'+val.id+'">'+val.first_name+' -'+ val.father_name +' (Father)'+'</option>';
	});
	$('#search_renter_name').html(html_renter);

	$("#search_renter_name").change(function() {
		var id = $(this).children(":selected").attr("id");
		$('#renter_search_id').val(id);
	});

	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			//console.log(response);
			$(document).find('.profile-values td p').text("");

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

			if(typeof response.data.shop != 'undefined' &&  response.data.shop != null){
				$('#shop_name').text(response.data.shop.name);
			}else{
				$('#shop_name').text("Null");
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
				$('#is_water_bill_required').text(response.data.utility_bill.is_wbill_required);
				$('#water_bill').text(response.data.utility_bill.water_bill);
				$('#is_gas_bill_required').text(response.data.utility_bill.is_gbill_required);
				$('#gas_bill').text(response.data.utility_bill.gas_bill);
				$('#other_charge').text(response.data.utility_bill.other_charge);
				$('#service_charge').text(response.data.utility_bill.service_charge);

				//electricity billing details
				if(typeof response.data.utility_bill.electricity_bill != 'undefined' &&  response.data.utility_bill.electricity_bill != null){
					$('#ebill_type').text(response.data.utility_bill.electricity_bill.bill_type.name);
						//other billing charges
					$('#minimum_unit').text(response.data.utility_bill.electricity_bill.minimum_unit);
					$('#duty_on_kwh').text(response.data.utility_bill.electricity_bill.duty_on_kwh);
					$('#demand_charge').text(response.data.utility_bill.electricity_bill.demand_charge);
					$('#machine_charge').text(response.data.utility_bill.electricity_bill.machine_charge);
					$('#service_charge-1').text(response.data.utility_bill.electricity_bill.service_charge);
					$('#vat').text(response.data.utility_bill.electricity_bill.vat);
					$('#delay_charge').text(response.data.utility_bill.electricity_bill.delay_charge);
				}
				$('#electric_meter_no').text(response.data.utility_bill.electric_meter_no);
				$('#opening_reading').text(response.data.utility_bill.opening_reading);
				$('#is_ebill_fixed').text(response.data.utility_bill.is_ebill_fixed);
				$('#fix_ebill_amount').text(response.data.utility_bill.fix_ebill_amount);	
			}	
		}).catch(function(failData){
			alert("Select renter name to see details !!");
		});
	});
});
</script>
@endpush
