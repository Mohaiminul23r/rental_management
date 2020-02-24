{{-- Delete Modal --}}
<div class="modal" id="fileDeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>Delete Uploaded Files</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Do you want to delete this file ?</h5>
          </div>
      	      <form id="file_delete_form" class="form-horizontal" role="form">
      	        <input type="hidden" id="f_id" name="f_id" value="">
      	     </form>
          <div class="modal-footer">
            <button type="button" id="fileDeleteBtn" class="btn btn-danger btn-round">Delete</button>
            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
{{-- End Delete Modal --}}
