<!-- Modal -->
<div class="modal fade" id="activeRenterAddModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Add Renter Active Details</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="add_advance_payment_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Renter Type</label>
						<select class="form-control" id="renter_type" name="renter_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Renter Name</label>
						<select class="form-control" id="renter_name" name="renter_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Complex Name</label>
						<select class="form-control" id="complex_name" name="complex_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Shop Name</label>
						<select class="form-control" id="shop_name" name="shop_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Level No.</label>
						<input type="text" class="form-control" id="level_no" name="level_no" placeholder="Enter Level No.">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="date">Activation Date</label>
						<input type="date" class="form-control" name="active_date">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Rent Amount</label>
						<input type="text" class="form-control" id="rent_amount" name="rent_amount" placeholder="Enter Rent Amount">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h6 style="text-align: center; color: blue;"><b>Utility Bill Details</b></h6>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Bill Type</label>
						<select class="form-control" id="bill_type_id" name="bill_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Water Bill</label>
						<input type="number" class="form-control" id="water_bill" name="water_bill" placeholder="Enter Water Bill">
						<span class="help-block"></span>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							<span class="form-check-sign">Water bill is not required.</span>
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Gas Bill</label>
						<input type="number" class="form-control" id="gas_bill" name="gas_bill" placeholder="Enter Gas Bill">
						<span class="help-block"></span>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							<span class="form-check-sign">Gas bill is not required.</span>
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="number">Service Charge</label>
						<input type="number" class="form-control" id="service_charge" name="service_charge" placeholder="Enter Water Bill">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="number">Other Charge</label>
						<input type="number" class="form-control" id="other_charge" name="other_charge" placeholder="Other Charge Amount">
						<span class="help-block"></span>
					</div>
				</div>
				{{-- <div class="col-md-4">
					<div class="form-group" >
						<label for="status">Active Status</label>
						<select class="form-control form-control" id="status" name="status">
							<option value="" disabled selected>Select</option>
							<option value="1">Paid</option>
							<option value="0">Unpaid</option>
						</select>
							<span class="help-block"></span>
					</div>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<h6 style="text-align: center; color: blue;"><b>Electric Bill Details</b></h6>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Electric Meter No.</label>
						<input type="text" class="form-control" id="electric_meter_no" name="electric_meter_no" placeholder="Electric Meter No.">
						<span class="help-block"></span>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="">
							<span class="form-check-sign">Fix electric bill.</span>
						</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Opening Reading</label>
						<input type="text" class="form-control" id="opening_reading" name="opening_reading" placeholder="Opening Meter Reading">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer no-bd">
				<button type="button" id="addPaymentBtn" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>