<!-- update electric bill details Modal -->
<div class="modal fade" id="update_electric_bill_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Electric Bills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="electric_bills_add_form" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Electric Meter No.</label>
                        <input type="text" class="form-control" id="electric_meter_no" name="electric_meter_no" placeholder="Electric Meter No.">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="check_ebill_fix" name="is_ebill_fixed" value="No">
                            <span class="form-check-sign">Fix electric bill.</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Opening Reading</label>
                        <input type="text" class="form-control" id="opening_reading" name="opening_reading" placeholder="Opening Meter Reading">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Fix Electric Bill Amount</label>
                        <input type="number" class="form-control" id="electric_bill_amount" disabled="disabled" value="0.00" name="fix_ebill_amount" placeholder="Fix Electric Bill Amount">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Active Renter</label>
                        <select class="form-control" id="active_renter_id2" name="active_renter_id2">
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Electric Bill Types</label>
                        <select class="form-control" id="electricity_bills_id" name="electricity_bill_id">
                        </select>
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
<!-- End of update electric bill details Modal -->