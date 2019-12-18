<!-- Modal -->
<div class="modal fade" id="advancePaymentEditModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Update Advance Payment Details</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="advance_payment_edit_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-md-4">
					<input type="hidden" name="ap_id" id="ap_id">
					<div class="form-group">
						<label for="name">Renter Name</label>
						<select class="form-control" id="add_renter_name" name="renter_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Complex Name</label>
						<select class="form-control" id="add_complex_name" name="complex_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Shop Name</label>
						<select class="form-control" id="add_shop_name" name="shop_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Amount</label>
						<input type="name" name="payment_amount" id="add_payment_amount" class="form-control" placeholder="Enter Payment Amount">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="date">Payment Date</label>
						<input type="date" class="form-control" id="add_date_of_payment" name="date_of_payment">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group" >
						<label for="status">Payment Status</label>
						<select class="form-control form-control" id="add_status" name="status">
							<option value="" disabled selected>Select</option>
							<option value="1" id="paid">Paid</option>
							<option value="0" id="unpaid">Unpaid</option>
						</select>
							<span class="help-block"></span>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer no-bd">
				<button type="button" id="editPaymentBtn" class="btn btn-primary">Edit</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>