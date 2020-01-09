<!-- update electric bill details Modal -->
<div class="modal fade" id="update_electric_bill_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Update Electric Bills</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="electric_bills_edit_form" class="form-horizontal" role="form">
            <div class="row">
                <input type="hidden" name="ubill_id_3" id="ubill_id_3">
                <input type="hidden" name="active_renter_id_4" id="active_renter_id_4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Electric Meter No.</label>
                        <input type="text" class="form-control" id="electric_meter_no_2" name="electric_meter_no" placeholder="Electric Meter No.">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Opening Reading</label>
                        <input type="text" class="form-control" id="opening_reading_2" name="opening_reading" placeholder="Opening Meter Reading">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Fix Electric Bill Amount</label>
                        <input type="number" class="form-control" id="electric_bill_amount_2" value="0.00" name="fix_ebill_amount" disabled="disabled" placeholder="Fix Electric Bill Amount">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
          <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Electric Bill Types</label>
                        <select class="form-control" id="electricity_bills_id_2" name="electricity_bill_id">
                        </select>
                        <span class="help-block"></span>
                    </div>       
                </div>
                 <div class="col-md-4">
                 </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="check_ebill_fix_2" name="is_ebill_fixed" value="No">
                            <span class="form-check-sign">Fix electric bill.</span>
                        </label>
                    </div>
                </div>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="update_ebill_btn_1" class="btn btn-primary btn-round">Update</button>
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of update electric bill details Modal -->