<!-- Add Renter Modal-->
<div class="modal fade" id="editRentalModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h3 class="modal-title" style="color: #1269DB; text-align: center;">
				<span class="fw-mediumbold">
				<b>Update Renter Details</b></span> 
			</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="renter_edit_form" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4">
					<input type="hidden" name="renter_id" id="renter_id">
					<div class="form-group">
						<label for="name">First Name</label>
						<input type="name" name="first_name" class="form-control" id="add_first_name" placeholder="Enter First Name">
						<span class="help-block"></span>
					</div>	
				</div>
				{{-- <div class="col-md-4">
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="name" name="last_name" class="form-control" id="add_last_name" placeholder="Enter Last Name">
						<span class="help-block"></span>
					</div>	
				</div> --}}
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Email Address</label>
						<input type="name" name="email" class="form-control" id="add_email" placeholder="example@gmail.com">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Father's Name</label>
						<input type="name" name="father_name" class="form-control" id="add_father_name" placeholder="Enter Father's Name">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="add_mother_name" placeholder="Enter Mother's Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Phone No.</label>
						<input type="name" name="phone" class="form-control" id="add_phone" placeholder="Enter Phone Number">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Mobile No.</label>
						<input type="name" name="mobile" class="form-control" id="add_mobile" placeholder="Enter Mobile Nmber">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Gender</label><br/>
						<label class="form-radio-label">
							<input class="form-radio-input" id="gender_male" type="radio" name="gender" value="Male">
							<span class="form-radio-sign">Male</span>
						</label>
						<label class="form-radio-label ml-3">
							<input class="form-radio-input" id="gender_female" type="radio" name="gender" value="Female">
							<span class="form-radio-sign">Female</span>
						</label>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">NID No.</label>
						<input type="name" name="nid_no" class="form-control" id="add_nid_no" placeholder="Enter NID no.">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="image">NID Photo<img class="img-fluid" style="width:50px;" alt="NID Photo" id="edit_nid_photo"></label>
						<input type="file" class="form-control-file" id="add_nid_photo" name="nid_photo">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="photo" id="label">Renter Photo<img class="img-fluid" style="width:50px;" alt="Renter Photo" id="edit_renter_photo"></label>
						<input type="file" class="form-control-file" id="add_photo" name="photo">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Date of Birth</label>
						<input type="text" class="form-control" data-toggle="datepicker" id="add_date_of_birth" name="date_of_birth" placeholder="yyyy-mm-dd">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="rentertype">Renter Type</label>
						<select class="form-control form-control" id="type_name" name="renter_type_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Address Line 1</label>
						<input type="name" name="address_line1" class="form-control" id="address_line" placeholder="Enter Area">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Thana</label>
						<select class="form-control form-control" id="add_thana_name" name="thana_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Post Code</label>
						<input type="name" name="postal_code" class="form-control" id="post_code" placeholder="Enter Post Code">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">City</label>
						<select class="form-control form-control" id="add_city_name" name="city_id">
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Country</label>
						<select class="form-control form-control" id="add_country_name" name="country_id">
							</select>
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="status">Active Status</label>
					<select class="form-control form-control" id="add_status" name="status">
						<option value="" disabled selected>Select</option>
						<option value="1" id="active">Active</option>
						<option value="2" id="inactive">Inactive</option>
					</select>
						<span class="help-block"></span>
				</div>
			</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="renterEditBtn" class="btn btn-primary btn-round">Edit</button>
			<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->
