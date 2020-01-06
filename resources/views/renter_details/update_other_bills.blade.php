<!-- update other bill details Modal -->
<div class="modal fade" id="update_other_bill_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Other Billings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="edit_ebill_form" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="ebill_id" id="ebill_id">
                    <div class="form-group">
                        <label for="name">Bill Type</label>
                        <select class="form-control" id="add_bill_type_id" name="bill_type_id">
                        </select>
                        <span class="help-block"></span>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Minimum Unit</label>
                        <input type="name" name="minimum_unit" class="form-control" id="add_minimum_unit" placeholder="Enter Minimum Unit">
                        <span class="help-block"></span>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Duty on KWH</label>
                        <input type="name" name="duty_on_kwh" class="form-control" id="add_duty_on_kwh" placeholder="Enter Kilowatt Hour">
                        <span class="help-block"></span>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Demand Charge</label>
                        <input type="name" name="demand_charge" class="form-control" id="add_demand_charge" placeholder="Enter Demanded Charge">
                        <span class="help-block"></span>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Machine Charge</label>
                        <input type="name" name="machine_charge" class="form-control" id="add_machine_charge" placeholder="Electric Machine Charge">
                        <span class="help-block"></span>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Service Charge</label>
                        <input type="name" name="service_charge" class="form-control" id="add_service_charge" placeholder="Enter Service Charge">
                        <span class="help-block"></span>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">VAT</label>
                        <input type="name" name="vat" class="form-control" id="add_vat" placeholder="Enter Value Added Tax">
                        <span class="help-block"></span>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Delay Charge</label>
                        <input type="name" name="delay_charge" class="form-control" id="add_delay_chargee" placeholder="Enter Delay Charge">
                        <span class="help-block"></span>
                    </div>  
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-round">Update</button>
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of update other bill details Modal -->