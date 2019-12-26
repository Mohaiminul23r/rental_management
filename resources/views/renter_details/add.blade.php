<div class="container">
    <div class="align-items-center text-white-50 bg-purple rounded shadow-sm" style="background: seagreen;">
       <h4 style="text-align: center;"><strong>Detail Information of Renter</strong></h4>
    </div>
    <div class="row my-2 profile-values">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"><strong>Renter Profile</strong></a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#Utility_bills" data-toggle="tab" class="nav-link"><strong>Utility Bill Info.</strong></a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#electric_bills" data-toggle="tab" class="nav-link"><strong>Electricity Bill Info.</strong></a>
                </li>
                 <li class="nav-item">
                    <a href="" data-target="#other_billing_details" data-toggle="tab" class="nav-link"><strong>Other Billing Info.</strong></a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><strong>Personal Information</strong></h4>
                           <table class="table-striped" width="100%">
                           	 <thead>
							    <tr>
							      <th scope="col" width="35%"></th>
							      <th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Name:</th>
							      <td><p id="renter_name" style="margin: 2px;"></p></td>
							    </tr>
							    <tr>
							      <th scope="row">Father Name:</th>
							      <td><p style="margin: 2px;" id="father_name"></p></td>
							    </tr>
							    <tr>
							      <th scope="row">Email:</th>
							      <td><p style="margin: 2px;" id="email_address"></p></td>
							    </tr>
							     <tr>
							      <th scope="row">Date Of Birth:</th>
							      <td><p style="margin: 2px;" id="date_of_birth"></p></td>
							    </tr>
                                <tr>
                                  <th scope="row">NID No:</th>
                                  <td><p style="margin: 2px;" id="nid_no"></p></td>
                                </tr>
                                <tr>
                                  <th scope="row">Contact No:</th>
                                  <td><p style="margin: 2px;" id="phone"></p></td>
                                </tr>
                                <tr>
                                  <th scope="row">Telephone No:</th>
                                  <td><p style="margin: 2px;" id="mobile"></p></td>
                                </tr>
							  </tbody>
							</table>
                   		 </div>
                   		 <div class="col-md-6 text-center">
                            <h5 class="mt-2"><strong>NID Photo</strong></h5>
                            <img src="" id="nid_photo" style="height: 135px; width: 280px;" class="mx-auto img-fluid img-circle img-thumbnail d-block" alt="NID Photo">
                {{--                 <h5 style="text-align: center;"><strong>Address</strong></h5> --}}
                            <div class="row">
                                <table class="table-striped" width="100%">
                             <thead>
                                <tr>
                                  <th scope="col" width="25%"></th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row" style="text-align: center;"><strong>Address</strong></th>
                                  <td><p id="address" style="margin: 2px;"></p></td>
                                </tr>
   {{--                              <tr>
                                    <td><p id="address" style="margin: 2px;"></p></td>
                                </tr> --}}
                              </tbody>
                            </table>
                               <p id="address"></p> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mt-2"><strong>Rent Details</strong></h4>
                            <table class="table-striped" width="100%">
                                <thead>
                                    <tr>
                                      <th scope="col" width="40%"></th>
                                      <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                      <th scope="row"><strong>Renter Type:</strong></th>
                                      <td><p style="margin: 2px;" id="renter_type"></p></td>
                                    </tr>
                                    <tr>
                                      <th scope="row"><strong>Complex No:</strong></th>
                                      <td><p style="margin: 2px;" id="complex_no"></p></td>
                                    </tr>                              
                                   <tr>
                                      <th scope="row"><strong>Complex Name:</strong></th>
                                      <td><p style="margin: 2px;" id="apartment_name"></p></td>
                                    </tr> 
                                    <tr>
                                      <th scope="row"><strong>Shop Name:</strong></th>
                                      <td><p style="margin: 2px;" id="shop_name"></p></td>
                                     </tr> 
                                    <tr>
                                      <th scope="row"><strong>Level No:</strong></th>
                                      <td><p style="margin: 2px;" id="level_no"></p></td>
                                    </tr> 
                                    <tr>
                                      <th scope="row"><strong>Rent Amount:</strong></th>
                                      <td><p style="margin: 2px;" id="rent_amount"></p></td>
                                    </tr>
                                     <tr>
                                      <th scope="row"><strong>Advance Payment:</strong></th>
                                      <td><p style="margin: 2px;" id="advance_amount"></p></td>
                                    </tr>
                                    <tr>
                                      <th scope="row"><strong>Rent Started At:</strong></th>
                                      <td><p style="margin: 2px;" id="rent_started_at"></p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="Utility_bills">
                    {{-- <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> You can <strong>Update</strong> Utility bill details by clicking update button.
                    </div> --}}
                    <table class="table-striped" width="100%">
                        <h4 class="mt-2"><strong>Utility Billing Details</strong></h4>
                        <thead>
                            <tr>
                              <th scope="col" width="30%"></th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                              <th scope="row"><strong>Bill Type:</strong></th>
                              <td><p style="margin: 2px;" id="bill_type"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Is Water Bill Required:</strong></th>
                              <td><p style="margin: 2px;" id="is_water_bill_required"></p></td>
                            </tr> 
                            <tr>
                              <th scope="row"><strong>Water Bill:</strong></th>
                              <td><p style="margin: 2px;" id="water_bill"></p></td>
                            </tr>
                             <tr>
                              <th scope="row"><strong>Is Gas Bill Required:</strong></th>
                              <td><p style="margin: 2px;" id="is_gas_bill_required"></p></td>
                            </tr>                              
                           <tr>
                              <th scope="row"><strong>Gas Bill:</strong></th>
                              <td><p style="margin: 2px;" id="gas_bill"></p></td>
                            </tr> 
                            <tr>
                              <th scope="row"><strong>Other Charge:</strong></th>
                              <td><p style="margin: 2px;" id="other_charge"></p></td>
                             </tr> 
                            <tr>
                              <th scope="row"><strong>Service Charge:</strong></th>
                              <td><p style="margin: 2px;" id="service_charge-1"></p></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="electric_bills">
                  {{--   <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div> --}}
                    <table class="table-striped" width="100%">
                        <h4 class="mt-2"><strong>Electric Bill Details</strong></h4>
                        <thead>
                            <tr>
                              <th scope="col" width="30%"></th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                              <th scope="row"><strong>Electric Bill Type:</strong></th>
                              <td><p style="margin: 2px;" id="ebill_type"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Electric Meter No:</strong></th>
                              <td><p style="margin: 2px;" id="electric_meter_no"></p></td>
                            </tr> 
                            <tr>
                              <th scope="row"><strong>Opening Reading:</strong></th>
                              <td><p style="margin: 2px;" id="opening_reading"></p></td>
                            </tr>
                             <tr>
                              <th scope="row"><strong>Is Electric Bill Fixed:</strong></th>
                              <td><p style="margin: 2px;" id="is_ebill_fixed"></p></td>
                            </tr>                              
                           <tr>
                              <th scope="row"><strong>Fixed Electric Bill Amount:</strong></th>
                              <td><p style="margin: 2px;" id="fix_ebill_amount"></p></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="other_billing_details">
              {{--   <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div> --}}
                <table class="table-striped" width="100%">
                    <h4 class="mt-2"><strong>Other Billing Charges</strong></h4>
                    <thead>
                        <tr>
                          <th scope="col" width="40%"></th>
                          <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                          <th scope="row"><strong>Minimum Unit:</strong></th>
                          <td><p style="margin: 2px;" id="minimum_unit"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Duty On Kwh:</strong></th>
                          <td><p style="margin: 2px;" id="duty_on_kwh"></p></td>
                        </tr> 
                        <tr>
                          <th scope="row"><strong>Demand Charge:</strong></th>
                          <td><p style="margin: 2px;" id="demand_charge"></p></td>
                        </tr>
                         <tr>
                          <th scope="row"><strong>Machine Charge:</strong></th>
                          <td><p style="margin: 2px;" id="machine_charge"></p></td>
                        </tr>                            
                       <tr>
                          <th scope="row"><strong>Service Charge:</strong></th>
                          <td><p style="margin: 2px;" id="service_charge"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>VAT:</strong></th>
                          <td><p style="margin: 2px;" id="vat"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Delay Charge:</strong></th>
                          <td><p style="margin: 2px;" id="delay_charge"></p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="" id="renter_photo" style="height: 180px; width: 250px;" class="mx-auto img-fluid img-circle img-thumbnail d-block" alt="Renter Photo">
            <h6 class="mt-2"><strong>Renter Photo</strong></h6>
{{--             <label class="custom-file">
            <input type="file" id="file" class="custom-file-input">
            <span class="custom-file-control">Choose file</span>
        </label> --}}
    </div>
</div>
</div>