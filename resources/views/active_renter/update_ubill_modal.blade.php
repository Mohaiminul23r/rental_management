<!-- Modal -->
<div class="modal fade" id="acrUbillupdateModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" style="text-align: center;">
				<span class="fw-mediumbold">
				<b>Update Utility Bills</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form id="ubill_update_form" class="form-horizontal" role="form">
				<input type="hidden" name="ubill_id2" id="ubill_id">
				<input type="hidden" name="acr_id" id="acr_id">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">House Rent</label>
						<input type="number" class="form-control add-bill" name="house_rent" id="house_rent" value="0.00" placeholder="house rent">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Electric Bill</label>
						<input type="number" class="form-control add-bill" name="electric_bill" id="electric_bill" value="0.00"  placeholder="electric bill">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Water Bill</label>
						<input type="number" name="water_bill" class="form-control add-bill" id="water_bill" value="0.00"  placeholder="water bill">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Gas Bill</label>
						<input type="number" class="form-control add-bill"  name="gas_bill" id="gas_bill" value="0.00" placeholder="gas bill">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Internet Bill</label>
						<input type="number" class="form-control add-bill" name="internet_bill" id="internet_bill" value="0.00"  placeholder="net bill">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Service Charge</label>
						<input type="number" class="form-control add-bill"  name="service_charge" id="service_charge" value="0.00" placeholder="service charge">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Other Charge</label>
						<input type="number" class="form-control add-bill"  name="other_charge"  id="other_charge" value="0.00" placeholder="other charge">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="number">Monthly Total Rent</label>
						<input type="number" class="form-control total-bill"  name="total_monthly_bill" id="total_monthly_bill" value="0.00" placeholder="other charge" readonly>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="update_ubill_btn" class="btn btn-outline-info btn-round">Update</button>
				<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>