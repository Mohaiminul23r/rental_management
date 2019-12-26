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
					<input type="number" name="first_name" class="form-control" id="bill_no" placeholder="Enter Bill No">
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
				{{-- <div class="form-group">
					<label for="name">Date of Issue</label>
					<input type="date" name="electric_charge" class="form-control" id="date_of_issue" placeholder="Enter Date of Issue">
					<span class="help-block"></span>
				</div> --}}	
				<div class="input-group date" data-provide="datepicker">
				    <input type="text" class="form-control" data-provide="datepicker">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
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
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>