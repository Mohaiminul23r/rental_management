<!-- Modal -->
<div class="modal fade" id="shopEditModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Update Shop Information</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="edit_shop_form" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="name">Shop Name</label>
						<input type="name" name="name" class="form-control" id="add_shop_name" placeholder="Enter Shop Name">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="name">Rent Amount</label>
						<input type="number" name="rent_amount" class="form-control" id="add_rent_amount" placeholder="Enter rent amount">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" id="add_description" name="description" rows="5" placeholder="Leave description here">

						</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer no-bd">
			<button type="button" id="editShopBtn" class="btn btn-primary">Edit</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>