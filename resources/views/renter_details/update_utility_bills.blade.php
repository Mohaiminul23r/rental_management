<!-- update Utility bill details Modal -->
<div class="modal fade" id="update_utility_bill_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Update Utility Bills</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="utility_bills_update_form" class="form-horizontal" role="form">
                <input type="hidden" name="ubill_id_2" id="ubill_id_2">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Bill Type</label>
                        <select class="form-control" id="bill_type_id_2" name="bill_type_id">
                        </select>
                        <span class="help-block"></span>
                    </div>   
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number">Water Bill</label>
                        <input type="number" class="form-control" id="water_bill_2" value="0.00" name="water_bill" placeholder="Enter Water Bill">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="wbill_check_2" name="is_wbill_required" value="Yes">
                            <span class="form-check-sign">Water bill is not required.</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number">Gas Bill</label>
                        <input type="number" class="form-control" id="gas_bill_2" value="0.00" name="gas_bill" placeholder="Enter Gas Bill">
                        <span class="help-block"></span>
                    </div>
                <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="gbill_check_2" name="is_gbill_required" value="Yes">
                            <span class="form-check-sign">Gas bill is not required.</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number">Service Charge</label>
                        <input type="number" class="form-control" id="service_charge_2" value="0.00" name="service_charge" placeholder="Enter service charge">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number">Other Charge</label>
                        <input type="number" class="form-control" id="other_charge_2" value="0.00"  name="other_charge" placeholder="Other Charge Amount">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="update_ubill_btn" class="btn btn-primary btn-round">Update Utility Bills</button>
        <button type="button" class="btn btn-warning btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of update Utility bill details Modal -->