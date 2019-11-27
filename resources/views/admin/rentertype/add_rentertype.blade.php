<!-- Modal -->
<div class="modal fade" id="addRenterTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Add City Details</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="addForm" class="form-horizontal" role="form">
			@csrf
			<div class="row">
					<div class="form-group">
						<label for="name">Renter Type Name</label>
						<input type="name" name="name" class="form-control" id="name" placeholder="Enter City Name">
					</div>

				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="submit" id="addCityBtn" class="btn btn-primary">Add</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->
