{{-- Delete Modal --}}
<div class="modal" id="collectorModalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>Delete Collector Details</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Do you want to delete this collector ?</h5>
          </div>
      	      <form id="collector_delete_form" class="form-horizontal" role="form">
      	        <input type="hidden" id="c_id" name="c_id" value="">
      	     </form>
          <div class="modal-footer">
            <button type="button" id="collectorDeleteBtn" class="btn btn-danger btn-round btn-sm">Delete</button>
            <button type="button" class="btn btn-secondary btn-round btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
{{-- End Delete Modal --}}
