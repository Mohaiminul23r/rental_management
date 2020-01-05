<!-- update rent details Modal -->
<div class="modal fade" id="update_rent_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Update Rent Details for Active Reners</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container p-3 my-3 border">
		<form id="update_rent_details_form" class="form-horizontal" role="form">
    	<div class="row">
			<div class="col-md-4">
				<input type="hidden" name="utility_bill_id" id="utility_bill_id_2">
				<input type="hidden" name="active_renter_id_3" id="active_renter_id_3">
				<div class="form-group">
					<label for="name">Renter Type</label>
					<select class="form-control" id="renter_type_2" name="renter_type_id">
					</select>
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Renter Name</label>
					<select class="form-control" id="renter_name_2" name="renter_id">
					</select>
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Complex Name</label>
					<select class="form-control" id="complex_name_2" name="apartment_id">
					</select>
					<span class="help-block"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Shop Name</label>
					<select class="form-control" id="shop_name_2" name="shop_id">
					</select>
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Level No.</label>
					<input type="text" class="form-control" id="level_no_2" name="level_no" placeholder="Enter Level No.">
					<span class="help-block"></span>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Activation Date</label>
					<input type="text" class="form-control" id="activation_date_2" data-toggle="datepicker" name="rent_started_at" placeholder="yyyy-mm-dd">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Rent Amount</label>
					<input type="number" class="form-control" id="rent_amount_2" value="0.00" name="rent_amount" placeholder="Enter Rent Amount">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Advance Amount</label>
					<input type="number" class="form-control" id="advance_amount_2" name="advance_amount" placeholder="Enter Advance Amount" value="0.00">
					<span class="help-block"></span>
				</div>	
			</div>
		</div>
		</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" id="update_rd_btn" class="btn btn-primary btn-round">Update Rent Dtails</button>
        <button type="button" class="btn btn-warning btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of update rent details Modal -->