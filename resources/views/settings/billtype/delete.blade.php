{{-- Delete Modal --}}
<div class="modal" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>Delete Bill Type</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to delete this bill type?</p>
          </div>
      	      <form id="delete_form" class="form-horizontal" role="form">
      	        <input type="hidden" id="id" name="id" value="">
      	     </form>
          <div class="modal-footer">
            <button type="button" id="deleteBtn" class="btn btn-danger btn-round">Delete</button>
            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
{{-- End Delete Modal --}}
