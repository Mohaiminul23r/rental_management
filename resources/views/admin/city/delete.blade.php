{{-- Delete Modal --}}
<div class="modal" id="deleteCityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>Delete City</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to delete this city?</p>
          </div>
      	      <form id="delete_city_form" class="form-horizontal" role="form">
      	        <input type="hidden" id="id" name="id" value="">
      	     </form>
          <div class="modal-footer">
            <button type="button" id="deleteCityBtn" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>
{{-- End Delete Modal --}}
