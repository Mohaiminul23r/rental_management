<!-- Modal -->
<div class="modal fade" id="addThanaModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h5 class="modal-title">
				<span class="fw-mediumbold">
				<b>Add Thana</b></span> 
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<p id="addUrl" hidden>Cities</p>
		<form id="addCityForm" class="form-horizontal" role="form">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
					<label for="name">City</label>
					<select class="form-control" name = "country_id" id = "add_city_name">
                       
                  	</select>
                  	<span class="help-block"></span>
				</div>
					<div class="form-group">
						<label for="name">Thana</label>
						<input type="name" name="thana" class="form-control" id="thana" placeholder="Enter Thana Name">
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
<!-- End Modal -->
