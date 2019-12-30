@extends('layouts.master2')
@section('pagetitle')
	Create Bill for Renters
@endsection
@section('card-title')
<b>Create Bills</b>
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
			{{-- 	including modals --}}
			@include('create_bill.create_ebill_modal')
			{{-- @include('create_bill.create_gbill_modal')
			@include('create_bill.create_monthly_rent_modal')
			@include('create_bill.create_wbill_modal') --}}
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
<div class="container p-3 my-3 border" id="index_container">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">General Billing Details</h4>
			</div>
			<div class="card-body">
				<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Electric Bill</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Gas Bill</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Water Bill</a>
					</li>
				</ul>
				<div class="tab-content mt-2 mb-3" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<table class="table-striped" width="100%">
							<div class="row">
								<div class="col-md-6">
									<p class="mt-2"><strong>Electric bill details for renter</strong></p>
								</div>	
								<div class="col-md-6" style="text-align: right;">
									<button type="button" class="btn  btn-sm btn-round btn-outline-primary" data-toggle="modal" data-target="#create_ebill_modal">Create Electric Bill</button>
								</div>	
							</div>
		                    <thead>
		                        <tr>
		                          <th scope="col" width="50%"></th>
		                          <th scope="col"></th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <tr>
		                          <th scope="row"><strong>Bill Type:</strong></th>
		                          <td><p style="margin: 2px;" id="ebill_type"></p></td>
		                        </tr>
		                        <tr>
		                          <th scope="row"><strong>Meter No:</strong></th>
		                          <td><p style="margin: 2px;" id="electric_meter_no"></p></td>
		                        </tr>
		                        <tr>
		                          <th scope="row"><strong>Opening Reading:</strong></th>
		                          <td><p style="margin: 2px;" id="opening_reading"></p></td>
		                       	</tr>
		                         <tr>
		                          <th scope="row"><strong>Is Electric Bill Fixed:</strong></th>
		                          <td><p style="margin: 2px;" id="is_ebill_fixed"></p></td>
		                        </tr>                             
		                       <tr>
		                          <th scope="row"><strong>Fixed Bill Amount:</strong></th>
		                          <td><p style="margin: 2px;" id="fix_ebill_amount"></p></td>
		                        </tr>
		                    </tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<table class="table-striped" width="100%">
						<div class="row">
							<div class="col-md-6">
								<p class="mt-2"><strong>Gas bill details for the renter</strong></p>
							</div>	
							<div class="col-md-6" style="text-align: right;">
								<button type="button" class="btn  btn-sm btn-round btn-outline-success" data-toggle="modal" data-target="#create_gbill_modal">Create Gas Bill</button>
							</div>	
						</div>
	                    
	                    <thead>
	                        <tr>
	                          <th scope="col" width="50%"></th>
	                          <th scope="col"></th>
	                        </tr>
	                    </thead>
	                    <tbody> 
	                        <tr>
	                          <th scope="row"><strong>Bill Type:</strong></th>
	                          <td><p style="margin: 2px;" id="ebill_type"></p></td>
	                        </tr>
	                        <tr>
	                          <th scope="row"><strong>Shop Name:</strong></th>
	                          <td><p style="margin: 2px;" id="shop_name"></p></td>
	                        </tr> 
	                        <tr>
	                          <th scope="row"><strong>Complex Name:</strong></th>
	                          <td><p style="margin: 2px;" id="complex_no"></p></td>
	                        </tr>
	                    </tbody>
	                </table>
					</div>
					<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					<table class="table-striped" width="100%">
                    <div class="row">
						<div class="col-md-6">
							<p class="mt-2"><strong>Monthly rent details for renter</strong></p>
						</div>	
						<div class="col-md-6" style="text-align: right;">
							<button type="button" class="btn  btn-sm btn-round btn-outline-secondary" data-toggle="modal" data-target="#create_wbill_modal">Create Water Bill</button>
						</div>	
					</div>
                    <thead>
                        <tr>
                          <th scope="col" width="50%"></th>
                          <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                          <th scope="row"><strong>Renter Type:</strong></th>
                         <td><p style="margin: 2px;" id="renter_type"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Complex Name:</strong></th>
                          <td><p style="margin: 2px;" id="complex_name"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Shop Name:</strong></th>
                          <td><p style="margin: 2px;" id="complex_no"></p></td>
                        </tr>
                        <tr>
                          <th scope="row"><strong>Monthly Rent:</strong></th>
                          <td><p style="margin: 2px;" id="monthly_rent"></p></td>
                        </tr> 
                    </tbody>
                </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" style="text-align: center;">
		<button type="button" class="btn  btn-sm btn-round btn-info" id="billing_list_show_btn">Show Billing List</button>
	</div>	
</div>
</div>
<div class="container p-3 my-3 border" id="data_table_div">

</div>
@endsection
@push('javascript')
<script type="text/javascript">
	// datatable starts
var renter_info  = <?php echo json_encode($renter_info)?>;
var activeRenter  = <?php echo json_encode($activeRenter)?>;

window.addEventListener("load",function(){
	html_renter = '<option value="" disabled selected>Select Renter</option>';
	$.each(activeRenter, function(ind,val){
		html_renter += '<option id="'+val.id+'" value="'+val.id+'">'+val.first_name+' -'+ val.father_name +' (Father)'+'</option>';
	});
	$('#renter_name').html(html_renter);

	$('#renter_name').change(function() {
		var id = $(this).children(":selected").attr("id");
		$('#renter_search_id').val(id);
	});

	$('#create_gas_bill_modal').click(function(){
		alert("ok");
		$('#create_gas_bill_modal').modal();
	});

	//datepicker details
	 $(function() {
		  $('[data-toggle="datepicker"]').datepicker({
		    autoHide: true,
		    zIndex: 2048,
		    format: 'dd-mm-yyyy',
		  });
	});

	 //search by name
	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			console.log(response);
			$('#view_renter_name').text(response.data.renter.first_name+' '+ response.data.renter.last_name+' Father Name- '+response.data.renter.father_name);

			
		}).catch(function(failData){
			alert("Select renter name to create bill.");
		});
	});

	 //billing data table
	billing_datatable =
		 	'<h5 style="text-align: center; color: green;"><strong>List of all Billings of the Renter</strong></h5>'+
			'<div class="container p-3 my-3 border">'+
			 	'<div class="table-responsive">'+
					'<table id="billingDataTable" class="display table table-striped table-hover">'+
					'</table>'+
				'</div>'+
			'</div>',

	$('#billing_list_show_btn').click(function(){
		$('#data_table_div').html(billing_datatable);
		
		//billing data table
		var billingDataTable = $('#billingDataTable').DataTable({
				dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
				initComplete : function(){

				},
				lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
			
				columns : [
				{
					'title' : '#SL',
					'name' : 'SL',
					'data' : 'id',
					'width' : '40px',
					'align' : 'center',
					'render' : function(data, type, row, ind){
						var pageInfo = billingDataTable.page.info();
						return (ind.row + 1) + pageInfo.start;
					}
				},
				{
					'title' : 'OPT',
					'name' : 'opt',
					'data' : 'id',
					'width' : '25px',
					'render' : function(data, type, row, ind){
						// return '<span class="edit-modal btn btn-link btn-primary btn-lg" data-id = '+data+'><i class="fa fa-edit"></i></span><span class="delete-modal btn btn-link btn-danger" data-id = '+data+'><i class="fa fa-times"></i></span>';
						return '<span class="delete-modal glyphicon glyphicon-trash" data-id = '+data+' data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></span>';
					}
				},
				{
					'title' : 'Bill No',
					'name' : 'shopName',
					'data' : 'shopName'
				},
				{
					'title' : 'Complex',
					'name' : 'complexName',
					'data' : 'complexName'
				},
				{
					'title' : 'Billing Year',
					'name' : 'shopName',
					'data' : 'shopName'
				},
				{
					'title' : 'Billing Month',
					'name' : 'shopName',
					'data' : 'shopName'
				},
				{
					'title' : 'Issue Date',
					'name' : 'shopName',
					'data' : 'shopName'
				},
				{
					'title' : 'Payment Status',
					'name' : 'shopName',
					'data' : 'shopName'
				},

				{
					'title' : 'Bill Amount',
					'name' : 'rent_amount',
					'data' : 'rent_amount',
					'render' : function(data, type, row, ind){
						return data + ' tk';
					}
				}
				],
				serverSide : true,
				processing : true,
				responsive : true,
				ajax: {
					url: utlt.siteUrl('api/create_bills'),
					dataSrc: 'data'
				},
		});
	});
});
</script>
@endpush