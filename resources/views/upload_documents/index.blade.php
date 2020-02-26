@extends('layouts.master2')
@section('pagetitle')
	<a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#fileAddModal" id="addBtn"><i class="fas fa-plus text-success"></i><strong> Upload Document</strong></button>
@endsection
@section('card-title')
<b>Uploaded Document List</b>
@endsection
@section('body')
	{{-- start modals --}}
	@include('upload_documents.upload')
    @include('upload_documents.delete')
	{{-- end modals --}}
	<div class="table-responsive">
		<table id="filesDataTable" class="display table table-striped table-hover table-bordered">
		</table>
	</div>
<script type="text/javascript">
var complexDataTable = null;
var renters = <?php echo json_encode($renters)?>;
window.addEventListener("load",function(){
	html_renters = '<option value="" disabled selected>Select Renter</option>';
	$.each(renters, function(ind,val){
		html_renters += '<option value="'+val.id+'">'+val.renter_name+'</option>';
	});
	$('#renter_id_5').html(html_renters);
	
//save uploaded document
	$(document).on('click', '#file_add_btn', function(){
		var file_add_form = document.getElementById('upload_form');
	    var formData = new FormData(file_add_form);
   	    formData.append('added_file', document.getElementById('added_file').files[0]);
		axios.post(''+utlt.siteUrl('api/files')+'', formData).then(function(response){
			$('#filesDataTable').DataTable().ajax.reload();
			$('#fileAddModal').modal('hide');
			toastr.success("File Uploaded Successfully");
			get_files();
		}).catch(function(failData){
			alert("Failed to add file.");
		});
	});

//start of deleteing files
	$(document).on('click', '.delete-modal', function() {
        $('#f_id').val($(this).data('id'));
        $("#fileDeleteModal").modal();
    });
	$('#fileDeleteBtn').click(function(){
        var id = $("#f_id").val();
        axios.delete(''+utlt.siteUrl('api/files/'+id)+'', $('#file_delete_form').serialize()).then(function(response){
            $('#filesDataTable').DataTable().ajax.reload();
            $('#fileDeleteModal').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete file!!");
        });
  	 });  
//end of deleting complex
//datatable value
	var filesDataTable = $('#filesDataTable').DataTable({
		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
		initComplete : function(){
		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '10%',
			'align' : 'center',
			'render' : function(data, type, row, ind){
				var pageInfo = filesDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'File Type',
			'name' : 'file_type',
			'data' : 'file_type',
			'width' : '35%',
			'render': function(data, type, row, ind){
				if(data == 1){
					return "Renter Photo";
				}else if(data == 2){
					return "National Id Card";
				}else if(data == 3){
					return "Aggrement Paper";
				}else if(data == 4){
					return "Other Paper";
				}
			}
		},
		{
			'title' : 'File Name',
			'name' : 'file_name',
			'data' : 'file_name',
			'width' : '35%',
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '20%',
			'render' : function(data, type, row, ind){
				$action_dropdown =	
					'<div class="dropdown show">'+
					  '<a class="btn btn-outline-info btn-sm btn-round dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">action</a>'+
					  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
					    // '<a class="dropdown-item view_data" data-id = '+ data +'><i class="fa fa-eye"></i> View Details</a>'+
					    // '<a class="dropdown-item print_data" data-id = '+ data +'><i class="fa fa-print text-info"></i> Print/Download</a>'+
	                    '<a class="dropdown-item delete-modal" data-id = '+ data +'><i class="fa fa-trash text-danger" ></i> Delete</a>'+
					  '</div>'+
					'</div>';
				return $action_dropdown;
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/files'),
			dataSrc: 'data'
		},
	});
	// end datatable
});
</script>
@endsection