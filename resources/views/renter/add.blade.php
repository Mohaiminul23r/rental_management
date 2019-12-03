<!-- Add Renter Modal-->
<div class="modal fade" id="addRentalModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h3 class="modal-title" style="color: #1269DB; text-align: center;">
				<span class="fw-mediumbold">
				<b>Add Renter Details</b></span> 
			</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<p id="addUrl" hidden>Renters</p>
		<form id="renter_add_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">First Name</label>
						<input type="name" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="name" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Father's Name</label>
						<input type="name" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Mother's Name</label>
						<input type="name" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Phone No.</label>
						<input type="name" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Mobile No.</label>
						<input type="name" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Nmber">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-check">
						<label>Gender</label><br/>
						<label class="form-radio-label">
							<input class="form-radio-input" type="radio" name="gender" value="Male"  checked="">
							<span class="form-radio-sign">Male</span>
						</label>
						<label class="form-radio-label ml-3">
							<input class="form-radio-input" type="radio" name="gender" value="Female">
							<span class="form-radio-sign">Female</span>
						</label>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">NID No.</label>
						<input type="name" name="nid_no" class="form-control" id="nid_no" placeholder="Enter NID no.">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="image">NID Photo</label>
						<input type="file" class="form-control-file" id="nid_photo" name="nid_photo">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="photo">Renter Photo</label>
						<input type="file" class="form-control-file" id="photo" name="photo">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="date">Date of Birth</label>
						<input type="date" class="form-control-file" id="date_of_birth" name="date_of_birth">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="rentertype">Renter Type</label>
						<select class="form-control form-control" id="renter_type">
							<option>1</option>
						</select>
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Address Line 1</label>
						<input type="name" name="address_line1" class="form-control" id="address_line1" placeholder="Enter Area">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Thana</label>
						<input type="name" name="name" class="form-control" id="name" placeholder="Enter Thana">
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Post Code</label>
						<input type="name" name="postal_code" class="form-control" id="postal_code" placeholder="Enter Post Code">
						<span class="help-block"></span>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">City</label>
						<input type="name" name="name" class="form-control" id="name" placeholder="Enter City">
					{{-- 	<select class="form-control form-control" id="city">
							<option>1</option>
						</select> --}}
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Country</label>
						<input type="name" name="name" class="form-control" id="name" placeholder="Enter Country">
						{{-- <select class="form-control form-control" id="country">
							<option>1</option> --}}
						<span class="help-block"></span>
					</div>	
				</div>
				<div class="col-md-4">
				<div class="form-group">
					<label for="status">Active Status</label>
					<select class="form-control form-control" id="status" name="status">
						<option>Select</option>
						<option>Active</option>
						<option>Inactive</option>
						<span class="help-block"></span>
					</select>
				</div>
			</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="renterAddBtn" class="btn btn-primary">Add</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->
