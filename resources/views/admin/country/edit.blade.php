{{-- edit modal --}}
<div class="modal fade" id="editCountryModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Edit Country Name</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="edit_form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="name">Country Name</label>
						<input type="hidden" class="form-control" id="id" name="id">
						<input type="name" name="name" class="form-control" id="name">
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="editBtn" class="btn btn-primary">Edit</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>
{{-- end edit modal --}}