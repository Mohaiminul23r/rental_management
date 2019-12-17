<!-- Modal -->
<div class="modal fade" id="houseEditModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Edit House Information</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="edit_house_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="name">House Name</label>
						<input type="name" name="house_name" class="form-control" id="add_house_name">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="name">House No.</label>
						<input type="name" name="house_no" class="form-control" id="add_house_no">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="editHouseBtn" class="btn btn-primary">Edit</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>