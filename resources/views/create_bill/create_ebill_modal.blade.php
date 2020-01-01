<!-- Create Electric Bill Modal-->
<div class="modal fade" id="create_ebill_modal_2" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h4 class="modal-title" style="text-align: center;">
				<span class="fw-mediumbold">
				<b>Create Electric Bill for the Renter</b></span> 
			</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
	<form id="ebill_create_form" class="form-horizontal" role="form">
	<div class="row">
    	<input type="hidden" name="active_renters_id" id="active_renter_id_2">
    	<div class="col-md-4">
			<div class="form-group">
				<label for="name">Bill No</label>
				<input type="number" name="bill_no" class="form-control" placeholder="Enter Bill No">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Select Year</label>
				<select class="custom-select" name="billing_year">
				  <option disabled selected vlaue="">Select Year</option>
				  <option value="2019">2019</option>
				  <option value="2020">2020</option>
				  <option value="2021">2021</option>
				  <option value="2022">2022</option>
				</select>
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Billing Month</label>
				<select class="custom-select" name="billing_month">
				  <option disabled selected vlaue="">Select Month</option>
				  <option value="1">January</option>
				  <option value="2">February</option>
				  <option value="3">March</option>
				  <option value="4">April</option>
				  <option value="5">May</option>
				  <option value="6">June</option>
				  <option value="7">July</option>
				  <option value="8">August</option>
				  <option value="9">September</option>
				  <option value="10">October</option>
				  <option value="11">November</option>
				  <option value="12">December</option>
				</select>
				<span class="help-block"></span>
			</div>	
		</div>
    </div>
    <div class="container p-3 my-3 border">
    	<div class="row">
		  <div class="col-md-4">
			<div class="form-group">
				<label for="name">Date of Issue</label>
				<input type="text" data-toggle="datepicker" name="date_of_issue" class="form-control" placeholder="Enter Date of Issue">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Last Payment Date</label>
				<input type="text" data-toggle="datepicker"  name="last_payment_date" class="form-control" placeholder="Enter Last Payment Date">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Total Electric Bill</label>
				<input type="number" name="total_ebill" class="form-control" placeholder="Enter Total Electric Bill">
				<span class="help-block"></span>
			</div>	
		</div>
		</div>	
    </div>
    <div class="row">
    	<div class="col-md-12" style="text-align: center;">
    		<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" id="add_more">
					<span class="form-check-sign" style="margin: -10px; color: green; text-align: center;">Add More Details</span>
				</label>
			</div>
    	</div>
    </div>
    <div class="row hidden_div">
    	<div class="col-md-4">
			<div class="form-group">
				<label for="name">Unit Rate</label>
				<input type="number" name="unit_rate" class="form-control" placeholder="Enter the Unit Rate">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Present Reading</label>
				<input type="number" name="present_reading" class="form-control" placeholder="Enter Prenent Reading">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Consumed Unit</label>
				<input type="number" name="consumed_unit" class="form-control" placeholder="Enter consumed unit">
				<span class="help-block"></span>
			</div>	
		</div>
    </div>
    <div class="row hidden_div">
    	<div class="col-md-4">
			<div class="form-group">
				<label for="name">Service Charge</label>
				<input type="number" name="service_charge" class="form-control" placeholder="Enter Service Charge">
				<span class="help-block"></span>
			</div>	
		</div>
    	<div class="col-md-4">
			<div class="form-group">
				<label for="name">Electric Bill</label>
				<input type="number" name="electric_bill" class="form-control" placeholder="Enter Electric Charge">
				<span class="help-block"></span>
			</div>	
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Principle Amount</label>
				<input type="number" name="principle_amount" class="form-control"placeholder="Enter Principle Amount">
				<span class="help-block"></span>
			</div>	
		</div>
    </div>
  </div>
	<div class="modal-footer no-bd">
		<button type="button" id="save_ebill_btn" class="btn btn-round btn-primary">Create Electric Bill</button>
		<button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Close</button>
	</div>
	</form>
	</div>
</div>
</div>
<!-- End Modal -->