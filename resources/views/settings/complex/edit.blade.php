<!-- Modal -->
<div class="modal fade" id="complexEditModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Update Complex Details</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="edit_complex_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-sm-12">
					<input type="hidden" name="complex_id" id="complex_id">
					<div class="form-group">
						<label for="name">Complex No.</label>
						<input type="name" name="complex_no" class="form-control" id="add_complex_no" placeholder="Enter Complex No.">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="name">Complex Name</label>
						<input type="name" name="name" class="form-control" id="add_complex_name" placeholder="Enter Complex Name">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="editComplexBtn" class="btn btn-primary btn-round">Edit</button>
			<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>