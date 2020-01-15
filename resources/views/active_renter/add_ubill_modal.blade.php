<!-- Modal -->
<div class="modal fade" id="activeRenterUbillAddModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" style="text-align: center;">
				<span class="fw-mediumbold">
				<b>Add Utility Bill Details for Active Renter</b></span> 
			</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="utility_bills_add_form" class="form-horizontal" role="form">
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
						<input type="number" class="form-control" id="water_bill" value="0.00" name="water_bill" placeholder="Enter Water Bill">
						<span class="help-block"></span>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" id="wbill_check" name="is_wbill_required" value="Yes">
							<span class="form-check-sign">Water bill is not required.</span>
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Gas Bill</label>
						<input type="number" class="form-control" id="gas_bill" value="0.00" name="gas_bill" placeholder="Enter Gas Bill">
						<span class="help-block"></span>
					</div>
				<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" id="gbill_check" name="is_gbill_required" value="Yes">
							<span class="form-check-sign">Gas bill is not required.</span>
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Service Charge</label>
						<input type="number" class="form-control" id="service_charge" value="0.00" name="service_charge" placeholder="Enter service charge">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Other Charge</label>
						<input type="number" class="form-control" id="other_charge" value="0.00"  name="other_charge" placeholder="Other Charge Amount">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="modal-footer" float="right">
				<button type="button" id="save_utility_bills" class="btn btn-primary btn-round">Save Utility Bill</button>
				<button type="button" class="btn btn-warning btn-round" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>