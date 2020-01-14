<!-- Modal -->
<div class="modal fade" id="electricBillAddModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Add Electric Bill Details</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="add_ebill_form" class="form-horizontal" role="form">
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
						<label for="number">Minimum Unit</label>
						<input type="number" name="minimum_unit" class="form-control" placeholder="Enter Minimum Unit">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Duty on KWH</label>
						<input type="number" name="duty_on_kwh" class="form-control" placeholder="Enter Kilowatt Hour">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Demand Charge</label>
						<input type="number" name="demand_charge" class="form-control" placeholder="Enter Demanded Charge">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Machine Charge</label>
						<input type="number" name="machine_charge" class="form-control" placeholder="Electric Machine Charge">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Service Charge</label>
						<input type="number" name="service_charge" class="form-control" placeholder="Enter Service Charge">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">VAT</label>
						<input type="number" name="vat" class="form-control" placeholder="Enter Value Added Tax">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Delay Charge</label>
						<input type="number" name="delay_charge" class="form-control" placeholder="Enter Delay Charge">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			</div>
			<div class="modal-footer no-bd">
				<button type="button" id="add_ebill_modal_Btn" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>