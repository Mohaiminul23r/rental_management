{{-- view info modal --}}
<div class="modal fade" id="view_renter_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Renter Details</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container p-3 my-3 border">
            <div class="row">
                <div class="col-md-8" id="nid_div">
                   <b><p class="clear_data" id="renter_name_1" style="font-size: 18px; margin: 0px;"></p></b>
                   <p class="clear_data" id="address_1" style="margin: 0px;"></p>
                   <p class="clear_data" id="mobile_1" style="margin: 0px;"></p>
                   <p class="clear_data" id="renter_type_1" style="margin: 0px;"></p>       
                </div>
                <div class="col-md-4" id="img1_div">
                    <div class="avatar avatar-xxl">
                      <img  alt="Renter Image" id="renter_image_1" class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-3 my-3 border">
            <table id="other_intro_table" class="table-striped table-head-bg-secondary table-bordered" width="100%">
               <thead>
                <tr>
                  <th scope="col" width="35%"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" colspan="2" style="text-align: center; font-size: 15px;"><b>Other Persional Informaiton</b></th>
                </tr>
                <tr>
                  <th scope="row">Father Name:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="father_name_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Mother Name:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="mother_name_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Telephone No:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="phone_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Email:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="email_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Date of Birth:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="date_of_birth_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Gender:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="gender_1"></p></td>
                </tr>
                <tr>
                  <th scope="row">Status:</th>
                  <td><p class="clear_data" style="margin: 2px;" id="status_1"></p></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="container p-3 my-3 border">
            <div class="row">
                 <div class="col-md-6">
                    <div class="avatar avatar-xxl">
                      <img id="nid_image_1" class="imagecheck-figure clear_data" style="width: 300px; height: 160px; margin-left: 10px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table-striped table-head-bg-info table-bordered" width="100%">
                        <thead>
                        <tr>
                          <th scope="col" width="35%"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" colspan="2" style="text-align: center; font-size: 15px;"><b>National Id Card Details</b></th>
                        </tr>
                        <tr>
                          <th scope="row">Nid No:</th>
                          <td><p class="clear_data" style="margin: 2px;" id="nid_no_1"></p></td>
                        </tr>
                        <tr>
                          <th scope="row">Country:</th>
                          <td><p class="clear_data" style="margin: 2px;" id="country_name_1"></p></td>
                        </tr>
                      </tbody>
                </table>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- end of view info modal --}}