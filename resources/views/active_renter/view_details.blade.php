{{--view info modal --}}
<div class="modal fade" id="view_acr_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><strong>Acrive Renter Details</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container p-1 border">
            <div class="row">
                <div class="col-md-12" id="renter_intro_div">
                	<table>
                		<tr>
                			<td style="font-size: 15px;"><strong>Renter Name:</strong></td>
                			<td><p style="margin: 0px; font-size: 15px;"  id="renter_name_3"></p></td>
                		</tr>
                		<tr>
                			<td><strong>Father Name:</strong></td>
                			<td><p style="margin: 0px;"  id="father_name_3"></p></td>
                		</tr>
                		<tr>
                			<td><strong>Contact No:</strong></td>
                			<td><p style="margin: 0px;" id="phone_3"></p></td>
                		</tr>
                		<tr>
                			<td><strong>Present Address:</strong></td>
                			<td><p style="margin: 0px;" id="present_address_3"></p></td>
                		</tr>
                	</table>    
                </div>
              {{--   <div class="col-md-4" id="img1_div">
                    <div class="avatar avatar-xxl">
                      <img  alt="Renter Image" id="renter_image_1" class="avatar-img rounded-circle">
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row my-2 profile-values">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"><strong>Renter Profile</strong></a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#rent_details" data-toggle="tab" class="nav-link"><strong>Rent Details</strong></a>
                </li>
                <li class="nav-item" id="ubill_list">
                    <a href="" data-target="#Utility_bills" data-toggle="tab" class="nav-link"><strong>Utility Bill Info.</strong></a>
                </li>
            </ul>
            <div class="tab-content py-2">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-12" id="personal_info_div">
                            <h6 style="color: blueviolet;"><strong>Personal Information</strong></h6>
                           <table class="table-striped" width="100%">
                            <thead>
							    <tr>
							      <th scope="col" width="35%"></th>
							      <th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th scope="row">Mother Name:</th>
							      <td><p style="margin: 2px;" id="mother_name_3"></p></td>
							    </tr>
							    <tr>
							      <th scope="row">Email:</th>
							      <td><p style="margin: 2px;" id="email_3"></p></td>
							    </tr>
							     <tr>
							      <th scope="row">Date Of Birth:</th>
							      <td><p style="margin: 2px;" id="date_of_birth_3"></p></td>
							    </tr>
                                <tr>
                                  <th scope="row">NID No:</th>
                                  <td><p style="margin: 2px;" id="nid_no_3"></p></td>
                                </tr>
                                <tr>
                                  <th scope="row">Telephone No:</th>
                                  <td><p style="margin: 2px;" id="telephone_3"></p></td>
                                </tr>
                                <tr>
                                  <th scope="row">Nationality:</th>
                                  <td><p style="margin: 2px;" id="nationality_3"></p></td>
                                </tr>
                                <tr>
                                  <th scope="row">Gender:</th>
                                  <td><p style="margin: 2px;" id="gender_3"></p></td>
                                </tr>
							  </tbody>
							</table>
                   		 </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="rent_details">
                	<h6 style="color: blueviolet;"><strong>Rent Information</strong></h6>
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
                              <td><p style="margin: 2px;" id="renter_type_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Rent Started At:</strong></th>
                              <td><p style="margin: 2px;" id="rent_started_at_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Complex No:</strong></th>
                              <td><p style="margin: 2px;" id="complex_no_3"></p></td>
                            </tr>                              
                           <tr>
                              <th scope="row"><strong>Complex Name:</strong></th>
                              <td><p style="margin: 2px;" id="complex_name_3"></p></td>
                            </tr> 
                            <tr>
                              <th scope="row"><strong>Shop Name:</strong></th>
                              <td><p style="margin: 2px;" id="shop_name_3"></p></td>
                             </tr> 
                            <tr>
                              <th scope="row"><strong>Level No:</strong></th>
                              <td><p style="margin: 2px;" id="level_no_3"></p></td>
                            </tr>
                             <tr>
                              <th scope="row"><strong>Advance Paid:</strong></th>
                              <td><p style="margin: 2px;" id="advance_amount_3"></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="Utility_bills">
                	<h6 style="color: blueviolet;"><strong>Utility Bill Details</strong></h6>
                    <table class="table-striped" width="100%">
                        <thead>
                            <tr>
                              <th scope="col" width="30%"></th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody> 
                         {{--    <tr>
                              <th scope="row"><strong>Bill Type:</strong></th>
                              <td><p style="margin: 2px;" id="bill_type_3"></p></td>
                            </tr> --}}
                            <tr>
                              <th scope="row"><strong>House Rent:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="house_rent_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Water Bill:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="water_bill_3"></p></td>
                            </tr>                              
                           <tr>
                              <th scope="row"><strong>Gas Bill:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="gas_bill_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Electric Bill:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="electric_bill_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Internet Bill:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="internet_bill_3"></p></td>
                            </tr>  
                            <tr>
                              <th scope="row"><strong>Service Charge:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="service_charge_3"></p></td>
                            </tr> 
                            <tr>
                              <th scope="row"><strong>Other Charge:</strong></th>
                              <td><p style="margin: 2px; text-align: right;" id="other_charge_3"></p></td>
                            </tr>
                            <tr>
                              <th scope="row"><strong>Monthly Total Rent:</strong></th>
                              <td><strong><p style="margin: 2px; text-align: right; color:red;" id="monthly_total_rent_3"></p></strong></td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="{{asset('images/default_renter_image.jpg')}}" id="renter_photo" style="height: 180px; width: 190px;" class="rounded-circle" alt="Renter Photo">
            <h6 class="mt-2"><strong>Renter Photo</strong></h6>
        </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- end of view info modal--}}