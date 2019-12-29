<div class="modal fade" id="create_ebill_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><strong>Create Electric Bill</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-4">
				<div class="form-group">
					<label for="name">Bill No</label>
					<input type="number" name="bill_no" class="form-control" id="bill_no" placeholder="Enter Bill No">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Select Year</label>
					<select class="custom-select" name="billing_year" id="billing_year">
					  <option selected>Select Year</option>
					  <option value="2019">2019</option>
					  <option value="2020">2020</option>
					  <option value="2021">2021</option>
					  <option value="2022">2022</option>
					</select>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Billing Month</label>
					<select class="custom-select" name="billing_month" id="billing_month">
					  <option selected>Select Month</option>
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
				</div>	
			</div>
        </div>
        <div class="row">
        	<div class="col-md-4">
				<div class="form-group">
					<label for="name">Unit Rate</label>
					<input type="number" name="unit_rate" class="form-control" id="unit_rate" placeholder="Enter Bill No">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Present Reading</label>
					<input type="number" name="present_reading" class="form-control" id="present_reading" placeholder="Enter Prenent Reading">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Consumed Unit</label>
					<input type="number" name="consumed_unit" class="form-control" id="consumed_unit" placeholder="Enter consumed unit">
					<span class="help-block"></span>
				</div>	
			</div>
        </div>
        <div class="row">
        	<div class="col-md-4">
				<div class="form-group">
					<label for="name">Electric Charge</label>
					<input type="number" name="electric_charge" class="form-control" id="electric_charge" placeholder="Enter Electric Charge">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Principle Amount</label>
					<input type="number" name="present_reading" class="form-control" id="principle_amount" placeholder="Enter Principle Amount">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Service Charge</label>
					<input type="number" name="service_charge" class="form-control" id="service_charge" placeholder="Enter Service Charge">
					<span class="help-block"></span>
				</div>	
			</div>
        </div>
        <div class="container p-3 my-3 border">
        	<div class="row">
			  <div class="col-md-4">
				<div class="form-group">
					<label for="name">Date of Issue</label>
					<input type="text" data-toggle="datepicker" name="date_of_issue" class="form-control" id="date_of_issue" placeholder="Enter Date of Issue">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Last Payment Date</label>
					<input type="text" data-toggle="datepicker"  name="last_payment_date" class="form-control" id="last_payment_date" placeholder="Enter Last Payment Date">
					<span class="help-block"></span>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Total Electric Bill</label>
					<input type="number" name="total_electric_bill" class="form-control" id="total_electric_bill" placeholder="Enter Total Electric Bill">
					<span class="help-block"></span>
				</div>	
			</div>
		</div>	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create Electric Bill</button>
      </div>
    </div>
  </div>
</div>