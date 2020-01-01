@extends('layouts.master2')
@section('pagetitle')
	View Reports
@endsection
@section('card-title')
<b>Generate and Download Reports</b>
@endsection
@section('body')
<div class="container-fluid">
	<div class="align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm" style="background: cadetblue;">
       <form id="renter_info_search_form" class="form-horizontal" role="form">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="hidden" name="renter_search_id" id="renter_search_id">
					<label for="name"><strong  style="color: white; font-size: 15px;">Renter Name</strong></label>
					<select class="form-control" id="renter_name" name="renter_id">
					</select>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="col-md-4">
					
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6" align="center">
				<button type="button" id="search_renter_info_btn" class="btn btn-secondary btn-round">Search</button>
			</div>
			<div class="col-md-3">
			</div>
		</div>	
		</form>
    </div>
</div>
	{{-- 	including modals --}}
@endsection