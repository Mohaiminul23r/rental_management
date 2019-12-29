@extends('layouts.master2')
@section('pagetitle')
	Create Bill for Renters
@endsection
@section('card-title')
<b>Create Bills</b>
@endsection
@section('body')
<div class="container-fluid">
	<div class="align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm" style="background: cadetblue;">
       <form id="renter_info_search_form" class="form-horizontal" role="form">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="hidden" name="renter_search_id" id="renter_search_id">
					<label for="name"><strong  style="color: white; font-size: 15px;">Renter Name</strong></label>
					<select class="form-control" id="renter_name" name="renter_id">
					</select>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="col-md-4">
					
			</div>
		</div>
			{{-- 	including modals --}}
			@include('create_bill.create_ebill_modal')
			{{-- @include('create_bill.create_gbill_modal')
			@include('create_bill.create_monthly_rent_modal')
			@include('create_bill.create_wbill_modal') --}}
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
</div>
<div class="container p-3 my-3 border" id="index_container">
	<div class="container p-3 my-3 border" id="checkbox_container">
	</div>
	<div class="row">
		<div class="col-md-4" id="card_div">
		</div>
		<div class="col-md-8" id="bill_details">
			<div class="container p-3 my-3 border" style="background: gainsboro;">
			  <h4 style="text-align: center;"><strong>Electric Bill Details</strong></h4>
			  <div class="card-tools" style="text-align: right;">
				{{-- <a href="#" class="btn btn-info btn-border btn-round btn-sm">
					<span class="btn-label">
						<i class="fa fa-print"></i>
					</span>
					Download
				</a> --}}
				<button class="btn btn-info btn-border btn-round btn-sm"><i class="fa fa-print"></i>Download</button>
			  </div>
			  <div class="table-responsive">
			  	<table class="table-striped" width="100%">
				  <thead>
				    <tr>
				      <th scope="col"></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">Renter Name:</th>
				      <td><p style="margin: 0px;" id="show_renter_name"></p></td>
				    </tr>
				    <tr>
				      <th scope="row">Father Name:</th>
				      <td><p style="margin: 0px;" id="father_name"></p></td>
				    </tr>
				    <tr>
				      <th scope="row">Mother Name:</th>
				      <td><p style="margin: 0px;" id="mother_name"></p></td>
				    </tr>
				  </tbody>
				</table>
				<form id="edit_ebill_button">
					<input type="hidden" name="ebill_id" id="ebill_id">
					<div style="text-align: center;">
						<button type="button" class="btn btn-info btn-round">Update</button>
					</div>
				</form>
			  </div>	
			</div>
		</div>
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
	$('#renter_name').html(html_renter);
	//$('#renter_name').select2();

	$("#renter_name").change(function() {
		var id = $(this).children(":selected").attr("id");
		$('#renter_search_id').val(id);
	$('.datepicker').datepicker();
	});

	$('#create_gas_bill_modal').click(function(){
		alert("ok");
		$('#create_gas_bill_modal').modal();
	});

	//datepicker details
	 $(function() {
      $('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
        format: 'dd-mm-yyyy',
      });
    });

	 //checkboxes
	 checkbox = 
	 '<h3 style="text-align: center;"><strong>Create Bills For <p id="view_renter_name"></p></strong></h3>'+
	 ' <div class="row">'+
	  	'<div class="col-md-3">'+
			'<div class="form-check">'+
				'<label class="form-check-label">'+
					'<input class="form-check-input" type="checkbox" value="" id="electric_bill_check_box">'+
					'<span class="form-check-sign">Create Electric Bill</span>'+
				'</label>'+
			'</div>'+
		'</div>'+
		'<div class="col-md-3">'+
			'<div class="form-check">'+
				'<label class="form-check-label">'+
					'<input class="form-check-input" type="checkbox" value="" id="gas_bill_check_box">'+
					'<span class="form-check-sign">Create Gas Bill</span>'+
				'</label>'+
			'</div>'+	
		'</div>'+
		'<div class="col-md-3">'+
			'<div class="form-check">'+
				'<label class="form-check-label">'+
					'<input class="form-check-input" type="checkbox" value="" id="water_bill_check_box">'+
					'<span class="form-check-sign">Create Water Bill</span>'+
				'</label>'+
			'</div>'	+
		'</div>'+
		'<div class="col-md-3">'+
			'<div class="form-check">'+
				'<label class="form-check-label">'+
					'<input class="form-check-input" type="checkbox" value="" id="monthly_rent_check_box">'+
					'<span class="form-check-sign">Create Monthly Rent</span>'+
				'</label>'+
			'</div>'+	
		'</div>'+		
	  '</div>',

	  electric_bill_card = 
	  	'<div class="card" style="max-width: 20rem;" id="ebill_card">'+
				'<div class="card-header">'+
					'<h4 class="card-title"><strong>Create Electric Bill</strong></h4>'+
				'</div>'+
			'<div class="card-body">'+
			 '<table class="table-striped" width="100%">'+
                   ' <p class="mt-2"><strong>General Electric Bill Details</strong></p>'+
                    '<thead>'+
                        '<tr>'+
                          '<th scope="col" width="50%"></th>'+
                          '<th scope="col"></th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>' +
                        '<tr>'+
                          '<th scope="row"><strong>Bill Type:</strong></th>'+
                         ' <td><p style="margin: 2px;" id="ebill_type"></p></td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row"><strong>Meter No:</strong></th>'+
                          '<td><p style="margin: 2px;" id="electric_meter_no"></p></td>'+
                        '</tr>' +
                        '<tr>'+
                          '<th scope="row"><strong>Opening Reading:</strong></th>'+
                          '<td><p style="margin: 2px;" id="opening_reading"></p></td>'+
                        '</tr>'+
                         '<tr>'+
                          '<th scope="row"><strong>Is Electric Bill Fixed:</strong></th>'+
                          '<td><p style="margin: 2px;" id="is_ebill_fixed"></p></td>'+
                        '</tr>' +                             
                       '<tr>'+
                          '<th scope="row"><strong>Fixed Bill Amount:</strong></th>'+
                          '<td><p style="margin: 2px;" id="fix_ebill_amount"></p></td>'+
                        '</tr>' +
                    '</tbody>'+
                '</table>'+
			'</div>'+
			'<div class="card-footer" style="text-align: center;">'+
				'<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create_ebill_modal">Create Electric Bill</button>'+
			'</div>'+
		'</div>',

		gas_bill_card = 

			'<div class="card" style="max-width: 20rem;" id="gbill_card">'+
					'<div class="card-header">'+
					'<h4 class="card-title"><strong>Create Gas Bill</strong></h4>'+
					'</div>'+
				'<div class="card-body">'+	
					'<table class="table-striped" width="100%">'+
	                    '<p class="mt-2"><strong>Gas bill details for the renter</strong></p>'+
	                    '<thead>'+
	                        '<tr>'+
	                          '<th scope="col" width="50%"></th>'+
	                          '<th scope="col"></th>'+
	                        '</tr>'+
	                    '</thead>'+
	                    '<tbody> '+
	                        '<tr>'+
	                          '<th scope="row"><strong>Bill Type:</strong></th>'+
	                          '<td><p style="margin: 2px;" id="ebill_type"></p></td>'+
	                        '</tr>'+
	                        '<tr>'+
	                          '<th scope="row"><strong>Shop Name:</strong></th>'+
	                          '<td><p style="margin: 2px;" id="shop_name"></p></td>'+
	                        '</tr>'+ 
	                        '<tr>'+
	                          '<th scope="row"><strong>Complex Name:</strong></th>'+
	                          '<td><p style="margin: 2px;" id="complex_no"></p></td>'+
	                        '</tr>' +
	                    '</tbody>'+
	                '</table>'+
				'</div>'+
				'<div class="card-footer" style="text-align: center;">'+
					'<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create_gbill_modal">Create Gas Bill</button>'+
				'</div>'+
				'</div>',
		monthly_rent_card =
			'<div class="card" style="max-width: 20rem;" id="mrent_card">'+
				'<div class="card-header">'+
				'<h4 class="card-title"><strong>Create Monthly Rent</strong></h4>'+
				'</div>'+
			'<div class="card-body">'+
				'<table class="table-striped" width="100%">'+
                    '<p class="mt-2"><strong>Monthly rent details for renter</strong></p>'+
                    '<thead>'+
                        '<tr>'+
                          '<th scope="col" width="50%"></th>'+
                          '<th scope="col"></th>'+
                        '</tr>'+
                    '</thead>'+
                   ' <tbody> '+
                        '<tr>'+
                          '<th scope="row"><strong>Renter Type:</strong></th>'+
                         ' <td><p style="margin: 2px;" id="renter_type"></p></td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row"><strong>Complex Name:</strong></th>'+
                          '<td><p style="margin: 2px;" id="complex_name"></p></td>'+
                        '</tr>' +
                        '<tr>'+
                          '<th scope="row"><strong>Shop Name:</strong></th>'+
                          '<td><p style="margin: 2px;" id="complex_no"></p></td>'+
                        '</tr>'+
                       ' <tr>'+
                          '<th scope="row"><strong>Monthly Rent:</strong></th>'+
                          '<td><p style="margin: 2px;" id="monthly_rent"></p></td>'+
                        '</tr> '+
                    '</tbody>'+
                '</table>'+
			'</div>'+
			'<div class="card-footer" style="text-align: center;">'+
				'<button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#create_monthly_rent_modal">Create Monthly Rent</button>'+
			'</div>'+
			'</div>',

		water_bill_card = 
			'<div class="card" style="max-width: 20rem;" id="wbill_card">'+
				'<div class="card-header">'+
				'<h4 class="card-title"><strong>Create Water Bill</strong></h4>'+
				'</div>'+
			'<div class="card-body">'+	
				'<table class="table-striped" width="100%">'+
                   ' <p class="mt-2"><strong>Water bill details for the renter</strong></p>'+
                    '<thead>'+
                        '<tr>'+
                          '<th scope="col" width="50%"></th>'+
                          '<th scope="col"></th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody> '+
                        '<tr>'+
                          '<th scope="row"><strong>Bill Type:</strong></th>'+
                          '<td><p style="margin: 2px;" id="ebill_type"></p></td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row"><strong>Shop Name:</strong></th>'+
                          '<td><p style="margin: 2px;" id="shop_name"></p></td>'+
                        '</tr> '+
                        '<tr>'+
                          '<th scope="row"><strong>Complex Name:</strong></th>'+
                          '<td><p style="margin: 2px;" id="complex_no"></p></td>'+
                        '</tr>' +
                    '</tbody>'+
                '</table>'+
			'</div>'+
			'<div class="card-footer" style="text-align: center;">'+
				'<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#create_wbill_modal">Create Water Bill</button>'+
			'</div>'+
			'</div>',

	 //search by name
	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			console.log(response);
			$('#checkbox_container').html(checkbox);
			$('#view_renter_name').text(response.data.renter.first_name+' '+ response.data.renter.last_name+' Father Name- '+response.data.renter.father_name);

				//getting ebill details if check box is checked 
				$('#electric_bill_check_box').change(function(){
				  if ($(this).is(':checked')){
				    $('#card_div').html(electric_bill_card);
				  }else{
				    $('#ebill_card').remove();
				  }
				});

				//getting gbill details if check box is checked 
				$('#gas_bill_check_box').change(function(){
				  if ($(this).is(':checked')){
				    $('#card_div').html(gas_bill_card);
				  }else{
				    $('#gbill_card').remove();
				  }
				});

				//getting wbill details if check box is checked 
				$('#water_bill_check_box').change(function(){
				  if ($(this).is(':checked')){
				    $('#card_div').html(water_bill_card);
				  }else{
				    $('#wbill_card').remove();
				  }
				});

				//getting monthly rent details if check box is checked 
				$('#monthly_rent_check_box').change(function(){
				  if ($(this).is(':checked')){
				    $('#card_div').html(monthly_rent_card);
				  }else{
				    $('#mrent_card').remove();
				  }
				});
		}).catch(function(failData){
			alert("Select renter name to create bill.");
		});
	});
});
</script>
@endpush