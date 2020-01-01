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
	@include('create_bill.create_ebill_modal')
	@include('create_bill.create_utilitybill_modal')
	@include('create_bill.create_rent_modal')
	@include('create_bill.delete_bill')

<div class="container p-3 my-3 border" id="index_container">

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
		    format: 'yyyy-mm-dd',
		  });
	});

	html_container =
		'<div class="row">'+
		'<div class="col-md-12">'+
			'<div class="card">'+
				'<div class="card-header">'+
					'<h5 class="card-title"><strong>General Billing Details</strong></h5>'+
				'</div>'+
				'<div class="card-body">'+
					'<div class="row">'+
						'<div class="col-md-12">'+
							'<b><h4 id="renter_name_2" style="padding: 0px; margin: auto; text-align: center;"></h4></b>'+
							'<b><h5 id="father_name_2" style="padding: 0px; margin: auto; text-align: center;"></h5></b>'+
							'<b><h6 id="mobile" style="padding: 0px; margin: auto; text-align: center;"></h6></b>'+
						'</div>'+
					'</div>'+
					'<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">'+
						'<li class="nav-item">'+
							'<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Electric Bill</a>'+
						'</li>'+
						'<li class="nav-item">'+
							'<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Utility Bill</a>'+
						'</li>'+
						'<li class="nav-item">'+
							'<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Rent Bill</a>'+
						'</li>'+
					'</ul>'+
					'<div class="tab-content mt-2 mb-3" id="pills-tabContent">'+
						'<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">'+
							'<table class="table-striped" width="100%">'+
								'<div class="row">'+
									'<div class="col-md-6">'+
										'<p class="mt-2"><strong>Electric bill details for renter</strong></p>'+
									'</div>'+	
									'<div class="col-md-6" style="text-align: right;">'+
										'<button type="button" class="btn  btn-sm btn-round btn-outline-primary" id="create_ebill_btn" data-toggle="modal" data-target="#create_ebill_modal_2">Create Electric Bill</button>'+
									'</div>'+	
								'</div>'+
			                    '<thead>'+
			                        '<tr>'+
			                          '<th scope="col" width="50%"></th>'+
			                          '<th scope="col"></th>'+
			                        '</tr>'+
			                    '</thead>'+
			                    '<tbody>'+
			                        '<tr>'+
			                          '<th scope="row"><strong>Bill Type:</strong></th>'+
			                         ' <td><p style="margin: 2px;" id="ebill_type"></p></td>'+
			                        '</tr>'+
			                        '<tr>'+
			                          '<th scope="row"><strong>Meter No:</strong></th>'+
			                          '<td><p style="margin: 2px;" id="electric_meter_no"></p></td>'+
			                        '</tr>'+
			                        '<tr>'+
			                          '<th scope="row"><strong>Opening Reading:</strong></th>'+
			                          '<td><p style="margin: 2px;" id="opening_reading"></p></td>'+
			                       	'</tr>'+
			                         '<tr>'+
			                          '<th scope="row"><strong>Is Electric Bill Fixed:</strong></th>'+
			                          '<td><p style="margin: 2px;" id="is_ebill_fixed"></p></td>'+
			                        '</tr>'+                             
			                       '<tr>'+
			                          '<th scope="row"><strong>Fixed Bill Amount:</strong></th>'+
			                          '<td><p style="margin: 2px;" id="fix_ebill_amount"></p></td>'+
			                        '</tr>'+
			                    '</tbody>'+
							'</table>'+
						'</div>'+
						'<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">'+
						'<table class="table-striped" width="100%">'+
							'<div class="row">'+
								'<div class="col-md-6">'+
									'<p class="mt-2"><strong>Gas bill details for the renter</strong></p>'+
								'</div>'+	
								'<div class="col-md-6" style="text-align: right;">'+
									'<button type="button" class="btn  btn-sm btn-round btn-outline-success" data-toggle="modal" data-target="#create_gbill_modal">Create Utility Bill</button>'+
								'</div>'+	
							'</div>'+
		                    '<thead>'+
		                        '<tr>'+
		                          '<th scope="col" width="50%"></th>'+
		                          '<th scope="col"></th>'+
		                        '</tr>'+
		                    '</thead>'+
		                    '<tbody>' +
		                        '<tr>'+
		                          '<th scope="row"><strong>Bill Type:</strong></th>'+
		                          '<td><p style="margin: 2px;" id="gbill_type"></p></td>'+
		                        '</tr>'+
		                        '<tr>'+
		                          '<th scope="row"><strong>Shop Name:</strong></th>'+
		                          '<td><p style="margin: 2px;" id="shop_name"></p></td>'+
		                        '</tr>'+ 
		                        '<tr>'+
		                          '<th scope="row"><strong>Complex Name:</strong></th>'+
		                          '<td><p style="margin: 2px;" id="complex_name"></p></td>'+
		                        '</tr>'+
		                    '</tbody>'+
		                '</table>'+
						'</div>'+
						'<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">'+
						'<table class="table-striped" width="100%">'+
	                    '<div class="row">'+
							'<div class="col-md-6">'+
								'<p class="mt-2"><strong>Rent details for renter</strong></p>'+
							'</div>'+	
							'<div class="col-md-6" style="text-align: right;">'+
								'<button type="button" class="btn  btn-sm btn-round btn-outline-secondary" data-toggle="modal" data-target="#create_rent_bill_modal">Create Rent Bill</button>'+
							'</div>'+	
						'</div>'+
	                    '<thead>'+
	                        '<tr>'+
	                          '<th scope="col" width="50%"></th>'+
	                          '<th scope="col"></th>'+
	                        '</tr>'+
	                    '</thead>'+
	                    '<tbody>' +
	                        '<tr>'+
	                          '<th scope="row"><strong>Renter Type:</strong></th>'+
	                         '<td><p style="margin: 2px;" id="renter_type"></p></td>'+
	                        '</tr>'+
	                        '<tr>'+
	                          '<th scope="row"><strong>Complex Name:</strong></th>'+
	                          '<td><p style="margin: 2px;" id="complex_name_2"></p></td>'+
	                        '</tr>'+
	                        '<tr>'+
	                          '<th scope="row"><strong>Shop Name:</strong></th>'+
	                          '<td><p style="margin: 2px;" id="shop_name_2"></p></td>'+
	                        '</tr>'+
	                    '</tbody>'+
	                '</table>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
	'<div class="row">'+
		'<div class="col-md-12" style="text-align: center;">'+
			'<button type="button" class="btn  btn-sm btn-round btn-info" id="billing_list_show_btn">Show Billing List</button>'+
		'</div>'+	
	'</div>',

	 //search by name
	$('#search_renter_info_btn').click(function(){
		var id = $(document).find('#renter_info_search_form input[name="renter_search_id"]').val();
		axios.get('api/renter_details/'+id).then(function(response){
			console.log(response);
			$('#index_container').html(html_container);
			$(document).find('#pills-tabContent td p').text("");
			//for billing details
			$('#active_renter_id_2').val(response.data.id);
			if(typeof response.data.renter != 'undefined' &&  response.data.renter != null){
				$('#renter_name_2').text(response.data.renter.first_name + ' ' + response.data.renter.last_name);
				$('#father_name_2').text(response.data.renter.father_name);
				$('#mobile').text(response.data.renter.mobile);
			}

			if(typeof response.data.utility_bill != 'undefined' &&  response.data.utility_bill != null){
				$('#ebill_type').text(response.data.utility_bill.bill_type.name);
				$('#electric_meter_no').text(response.data.utility_bill.electric_meter_no);
				$('#opening_reading').text(response.data.utility_bill.opening_reading);
				if(response.data.utility_bill.is_ebill_fixed == null){
					$('#is_ebill_fixed').text("Electric bill is fixed.");
				}else{
					$('#is_ebill_fixed').text(response.data.utility_bill.is_ebill_fixed);
				}
				$('#fix_ebill_amount').text(response.data.utility_bill.fix_ebill_amount);
				$('#gbill_type').text(response.data.utility_bill.bill_type.name);
			}else{
				$('#ebill_type').text("Empty");
				$('#electric_meter_no').text("Empty");
				$('#opening_reading').text("Empty");
				$('#fix_ebill_amount').text("Empty");
				$('#gbill_type').text("Empty");
				$('#is_ebill_fixed').text("Empty");
			}
			
			if(typeof response.data.shop != 'undefined' &&  response.data.shop != null){
				$('#shop_name').text(response.data.shop.name);
				$('#shop_name_2').text(response.data.shop.name);
			}else{
				$('#shop_name').text("Empty");
				$('#shop_name_2').text("Empty");
			}

			if(typeof response.data.apartment != 'undefined' &&  response.data.apartment != null){
				$('#complex_name').text(response.data.apartment.name);
				$('#complex_name_2').text(response.data.apartment.name);
			}else{
				$('#complex_name').text("Empty");
				$('#complex_name_2').text("Empty");
			}	
			if(typeof response.data.renter_type != 'undefined' &&  response.data.renter_type != null){
				$('#renter_type').text(response.data.renter_type.name);
			}else{
				$('#renter_type').text("Empty");
			}
			
		}).catch(function(failData){
			alert("Select renter name to create bill.");
		});
	});

	 //billing data table
	billing_datatable =
		 	'<div class="row">'+
		    	'<div class="col-md-8" style="text-align: left; margin: auto;">'+
		   			 '<h5 style="text-align: center; color: green;"><strong>List of all Billings of the Renter</strong></h5>'+
		    	'</div>'+
		    	'<div class="col-md-4" style="text-align: right; margin: auto;">'+
		    		'<button type="button" class="btn btn-secondary btn-round btn-sm" id="hide_list_btn">Hide List</button>'+
		    	'</div>'+
		    '</div>'+
			'<div class="container p-3 my-3 border">'+
			 	'<div class="table-responsive">'+
					'<table id="billingDataTable" class="display table table-striped table-hover">'+
					'</table>'+
				'</div>'+
			'</div>',

	$(document).on('click', '#billing_list_show_btn', function(){
		$('#data_table_div').html(billing_datatable);
	    var	acr_id = $('#renter_name').val();
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
						$action_dropdown =	
							'<div class="dropdown show">'+
							  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
							  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
							    '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
							    '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
		                        '<a class="dropdown-item edit_data" data-id = '+ data +'><i class="fa fa-edit text-secondary"></i> Edit Bill</a>'+
		                        '<a class="dropdown-item delete_data" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
							  '</div>'+
							'</div>';
						return $action_dropdown;
					}
				},
				{
					'title' : 'Bill No',
					'name' : 'bill_no',
					'data' : 'bill_no'
				},
				{
					'title' : 'Billing Month',
					'name' : 'billing_month',
					'data' : 'billing_month',
					'render' : function(data, type, row, ind){
						if(data == 1){
							return "January";
						}else if(data == 2){
							return "February";
						}else if(data == 3){
							return "March";
						}else if(data == 4){
							return "April";
						}else if(data == 5){
							return "May";
						}else if(data == 6){
							return "June";
						}else if(data == 7){
							return "July";
						}else if(data == 8){
							return "August";
						}else if(data == 9){
							return "September";
						}else if(data == 10){
							return "October";
						}else if(data == 11){
							return "November";
						}else if(data == 12){
							return "December";
						}
					}
				},
				{
					'title' : 'Issue Date',
					'name' : 'date_of_issue',
					'data' : 'date_of_issue'
				},
				{
					'title' : 'Electric Bill',
					'name' : 'total_ebill',
					'data' : 'total_ebill',
					'render' : function(data, type, row, ind){
						return data + ' tk';
					}
				},
				{
					'title' : 'Payment Status',
					'name' : 'status',
					'data' : 'status',
					'render' : function(data, type, row, ind){
						if(data == 1){
							return "Paid";
						}else if(data == 0){
							return "Not Paid";
						}else if(data == 2){
							return "Due";
						}
					}
				}
				],
				serverSide : true,
				processing : true,
				responsive : true,
				ajax: {
					url: utlt.siteUrl('api/create_bills'),
					dataSrc : function(json){                                
                    return json.data;
	                },
	                data : function(dataParam){
	                    dataParam['acr_id'] = acr_id;
	                },
				},
		});

		$('#hide_list_btn').click(function(){
			$('#data_table_div').empty();
		});
	});

	//creating electric bill details
	$(document).on('click','#save_ebill_btn', function(){
		axios.post('api/create_bills', $('#ebill_create_form').serialize()).then(function(response){
			toastr.success('Successfully created Electric Bill.');
			$('#billingDataTable').DataTable().ajax.reload();
			$('#create_ebill_modal_2').modal('hide');
		}).catch(function(failData){
				$.each(failData.response.data.errors, function(inputName, errors){
	              $.each(failData.response.data.errors, function(inputName, errors){
	                $("#ebill_create_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
	                if(typeof errors == "object"){
	                    $("#ebill_create_form [name="+inputName+"]").parent().find('.help-block').empty();
	                    $.each(errors, function(indE, valE){
	                        $("#ebill_create_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
	                        $('.help-block').css("color", "red");
	                    });
	                }else{
	                    $("#ebill_create_form [name="+inputName+"]").parent().find('.help-block').html(valE);
	                }
	            });
	        });
		});
	});

	//delete bill details
	$(document).on('click', '.delete_data', function(){
		$('#monthly_bill_delete_id').val($(this).data('id'));
		$('#bill_delete_modal').modal();
	});
	$('#bill_deleteBtn').click(function(){
		var delete_mbill_id = $('#monthly_bill_delete_id').val();
		var id = delete_mbill_id;
		axios.delete('api/create_bills/'+ id).then(function(response){
			toastr.warning("Bill deleted Successfully !!");
			$('#bill_delete_modal').modal('hide');
			$('#billingDataTable').DataTable().ajax.reload();
		}).catch(function(failData){
			alert("Can not delete this bill.");
		});
	});

	//view billing details
	$(document).on('click', '.view_data', function(){
		$('#monthly_bill_delete_id').val($(this).data('id'));
		$('#bill_delete_modal').modal();
	});

	//code for create electric bill modal
	$(document).on('click', '#create_ebill_btn', function(){
		$('.hidden_div').hide();
		$('#ebill_create_form .has-error').removeClass('has-error');
		$('#ebill_create_form').find('.help-block').empty();
		document.getElementById("ebill_create_form").reset();
		$('#add_more').prop("checked", false);
		$('#add_more').change(function() {
		  if ($(this).is(':checked')) {
		    $('.hidden_div').show();
		  } else {
		    $('.hidden_div').hide();
		  }
		});
	});
});
</script>
@endpush