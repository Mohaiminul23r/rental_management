<!-- Modal -->
<div class="modal fade" id="apartmentAddModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Add New Apartment</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="add_apartment_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="name">Apartment Name</label>
						<input type="name" name="apartment_name" class="form-control" id="apartment_no" placeholder="Enter Apartment Name">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="name">Apartment No.</label>
						<input type="name" name="apartment_no" class="form-control" id="apartment_no" placeholder="Enter Apartment No.">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="addBtn" class="btn btn-primary">Add</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>