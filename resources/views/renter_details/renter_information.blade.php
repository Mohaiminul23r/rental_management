@extends('layouts.master2')
@section('pagetitle')
	Search Renter Details
@endsection
@section('card-title')
<b>Renter Details</b>
@endsection
@section('body')
<div class="container-fluid">
  <form id="renter_info_search_form" class="form-horizontal" role="form">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="hidden" name="renter_search_id" id="renter_search_id">
				<label for="name">Renter Name</label>
				<select class="form-control" id="search_renter_name" name="renter_id">
				</select>
				<span class="help-block"></span>
			</div>	
		</div>
	</div>
		<button type="button" id="search_renter_info_btn" class="btn btn-secondary btn-round btn-border">Search</button>
	</form>
	<div class="row">
		
	</div>
	<div class="row" id="renter_info_div">
		
	</div>
	<div class="row">
		@include('renter_details.add')
	</div>
</div>
<script type="text/javascript">
// datatable starts
var renter_info  = <?php echo json_encode($renter_info)?>;
var activeRenter  = <?php echo json_encode($activeRenter)?>;
@php
	//dd($renter_info);
@endphp
window.addEventListener("load",function(){
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	$.each(activeRenter, function(ind,val){
		html_renter += '<option id="'+val.id+'" value="'+val.id+'">'+val.first_name+'</option>';
	});
	$('#search_renter_name').html(html_renter);

	$("#search_renter_name").change(function() {
		var id = $(this).children(":selected").attr("id");
		$('#renter_search_id').val(id);
	});

	var renter_info_details = 
		'<div class="container-fluid">'+
			'<div class="row">'+
				'<div class="col-xl-12">'+
					'<h6 style="text-align: center; color: blue;"><b>Renter Information</b></h6>'+
				'</div>'+
			'</div>'+
			'<div class="row">'+
			'<div class="container">'+
				'<div class="row">'+
					'<div class="col-xl-12">'+
						'<div class="col-xl-8">'+
							'<h2 id="" style="text-align: center;"></h2>'+
						'</div>'+
						'<div class="col-xl-4">'+

						'</div>'+
					'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xl-12">'+
						
					'</div>'+
				'</div>'+
			'</div>'+
			'</div>'+
		'</div>';

	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			console.log(response);
			$('#renter_info_div').html(renter_info_details);
			$('#renter_name').text(response.data.renter.first_name);
		}).catch(function(failData){
			alert("Can not get renter information !!");
		});
	});
});
</script>
@endsection