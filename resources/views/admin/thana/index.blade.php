@extends('layouts.master')
@section('pagetitle')
	Thana
@endsection
@section('breadcrumbs')
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Thana</a>
	</li>
@endsection

@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h4 class="card-title">Thana List</h4>
		</div>
	</div>
	@include('admin.thana.add')
	<div class="card-body">
		<div class="table-responsive">
			<table id="cityDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
@endsection