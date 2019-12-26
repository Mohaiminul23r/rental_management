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
		{{-- <div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="date">Payment Date</label>
					<input type="date" class="form-control" name="date_of_payment">
					<span class="help-block"></span>
				</div>	
			</div>
		</div> --}}
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
<div class="container p-3 my-3 border">
	<div class="container p-3 my-3 border">
	  <h3 style="text-align: center;"><strong>Create Bills For the Renters</strong></h3>
	  <div class="row">
	  	<div class="col-md-3">
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" value="" id="electric_bill">
					<span class="form-check-sign">Create Electric Bill</span>
				</label>
			</div>	
		</div>
		<div class="col-md-3">
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" value="" id="gas_bill">
					<span class="form-check-sign">Create Gas Bill</span>
				</label>
			</div>	
		</div>
		<div class="col-md-3">
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" value="" id="water_bill">
					<span class="form-check-sign">Create Water Bill</span>
				</label>
			</div>	
		</div>
		<div class="col-md-3">
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" value="" id="monthly_rent">
					<span class="form-check-sign">Create Monthly Rent</span>
				</label>
			</div>	
		</div>		
	  </div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card" style="max-width: 20rem;">
				<div class="card-header">
					<h4 class="card-title"><strong>Create Electric Bill</strong></h4>
				</div>
			<div class="card-body">
			 <table class="table-striped" width="100%">
                    <p class="mt-2"><strong>General Electric Bill Details</strong></p>
                    <thead>
                        <tr>
                          <th scope="col" width="50%"></th>
                          <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                          <th scope="row"><strong>Bill Type:</strong></th>
                          <td><p style="margin: 2px;" id="ebill_type"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Meter No:</strong></th>
                          <td><p style="margin: 2px;" id="electric_meter_no"></p></td>
                        </tr> 
                        <tr>
                          <th scope="row"><strong>Opening Reading:</strong></th>
                          <td><p style="margin: 2px;" id="opening_reading"></p></td>
                        </tr>
                         <tr>
                          <th scope="row"><strong>Is Electric Bill Fixed:</strong></th>
                          <td><p style="margin: 2px;" id="is_ebill_fixed"></p></td>
                        </tr>                              
                       <tr>
                          <th scope="row"><strong>Fixed Bill Amount:</strong></th>
                          <td><p style="margin: 2px;" id="fix_ebill_amount"></p></td>
                        </tr> 
                    </tbody>
                </table>
			</div>
			<div class="card-footer" style="text-align: center;">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create_ebill_modal">Create Electric Bill</button>
			</div>
		{{-- 	create electric bill modal --}}
			@include('create_bill.create_ebill_modal')
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="max-width: 20rem;">
				<div class="card-header">
				<h4 class="card-title"><strong>Create Gas Bill</strong></h4>
				</div>
			<div class="card-body">
				<h4 class="card-title">Ugg Boots</h4>
				<p class="card-text">Best ugg boots on the planet. Free shipping, 24/7 customer service.</p>
			</div>
			<div class="card-footer">
				By Uuuuggghhh.com
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="max-width: 20rem;">
				<div class="card-header">
				<h4 class="card-title"><strong>Create Monthly Rent</strong></h4>
				</div>
			<div class="card-body">
				<h4 class="card-title">Ugg Boots</h4>
				<p class="card-text">Best ugg boots on the planet. Free shipping, 24/7 customer service.</p>
			</div>
			<div class="card-footer">
				By Uuuuggghhh.com
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
	});

	$('.datepicker').datepicker();

	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			console.log(response);

		}).catch(function(failData){

		});
	});
});
</script>
@endpush