@extends('layouts.master')
@section('pagetitle')
	Country
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Country</a>
	</li>
@endsection
@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Country List</h4>
			@if ($message = Session::get('success'))
		        <div class="alert alert-success">
		            <p>{{ $message }}</p>
		        </div>
		    @endif
			<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
				Add
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<!-- Modal -->
		<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							<b>Add New Country</b></span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form method="POST" action="{{url('api/countries')}}">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Country Name</label>
									<input type="name" name="name" class="form-control" id="email2" placeholder="Enter Country Name">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="add-row" class="display table table-striped table-hover" >
				<thead>
					<tr>
						<th>SL</th>
						<th>Country Name</th>
						<th style="width: 10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					@foreach($countries as $country)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $country->name }}</td>
						<td>
							<div class="form-button-action">
								<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
									<i class="fa fa-edit"></i>
								</button>
								<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
	// Add Row
	$('#add-row').DataTable({
		"pageLength": 5,
	});
	var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

	$('#addRowButton').click(function() {
		$('#addRowModal').modal('hide');
	});
});
</script>
@endsection