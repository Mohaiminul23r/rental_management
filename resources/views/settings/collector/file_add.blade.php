<!-- Modal -->
<div class="modal fade" id="collectorFileAddModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header no-bd">
			<h6 class="h4 modal-title">
				<span class="fw-mediumbold">
				<b>Upload Necessary Document's of the Collector</b></span> 
			</h6>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form id="upload_form" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="row" id="file_div">
				<div class="col-md-6">
					<div class="form-group">
						<label for="status">Collector Name</label>
						<select width="100%" class="form-control" id="collector_id" name="collector_id">
						</select>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="status">File Type</label>
						<select class="form-control form-control" id="file_type" name="file_type">
							<option value="" disabled selected>Select type</option>
							<option value="5">Collector Photo</option>
							<option value="6">Collector NID Card</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">File Name</label>
						<input type="name" class="form-control" id="file_name" name="file_name" placeholder="Enter file name">
						<span class="help-block"></span>
					</div>
				</div>				
				<div class="col-md-6">
					<div class="form-group">
						<label for="photo" id="label">Upload File</label>
						<input type="file" class="form-control-file" id="added_file" name="file" required>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</form>
		<div class="modal-footer no-bd">
			<button type="button" id="file_add_btn" class="btn btn-info btn-round btn-sm"><i class="fas fa-plus text-black-50"></i> Upload</button>
			<button type="button" class="btn btn-danger btn-round btn-sm" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
</div>
