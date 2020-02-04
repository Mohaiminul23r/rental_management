@extends('layouts.master2')
@section('pagetitle')
    <a type="button" href="{{ url('/home')}}" class="btn btn-outline-info btn-round btn-outline-light"><i class="fas fa-home text-success"></i><strong> Home</strong></a>
@endsection
@section('button')
<button class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addBilltypeModal" id="bill_add_btn"><i class="fas fa-plus text-success"></i><strong> Add Bill Type</strong></button>
@endsection
@section('card-title')
<b>Bill Type List</b>
@endsection
@section('body')
    {{-- start modals --}}
    @include('settings.billtype.add')
    @include('settings.billtype.edit')
    @include('settings.billtype.delete')
    {{-- end modals --}}
    <div class="table-responsive">
        <table id="billtypeDataTable" class="display table table-striped table-hover">
        </table>
    </div>
<script type="text/javascript">
window.addEventListener("load", function(){
	$.fn.dataTable.ext.errMode = 'none';
	$("#addBilltypeModal").on("hidden.bs.modal", function() {
        document.getElementById("add_billtype_form").reset();
        $('#add_billtype_form .has-error').removeClass('has-error');
        $('#add_billtype_form').find('.help-block').empty();
    });

     $("#editBillTypeModal").on("hidden.bs.modal", function() {
        document.getElementById("edit_billtype_form").reset();
        $('#editBillTypeModal .has-error').removeClass('has-error');
        $('#editBillTypeModal').find('.help-block').empty();
    });

    $("#modalDelete").on("hidden.bs.modal", function() {
        document.getElementById("delete_form").reset();
        $('#delete_form .has-error').removeClass('has-error');
        $('#delete_form').find('.help-block').empty();
    });

    $('#addBtn').click(function(){
    	$('#add_billtype_form .has-error').removeClass('has-error');
        $('#add_billtype_form').find('.help-block').empty();
        axios.post('api/billtypes',$('#add_billtype_form').serialize())
        .then(function(response){
            $('#billtypeDataTable').DataTable().ajax.reload();
            $('#addBilltypeModal').modal('hide');
            toastr.success('Bill type added successfully.');
        }).catch(function(failData){
            $.each(failData.response.data.errors, function(inputName, errors){
                  $.each(failData.response.data.errors, function(inputName, errors){
                    $("#add_billtype_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#add_billtype_form [name="+inputName+"]").parent().find('.help-block').empty();
                        $.each(errors, function(indE, valE){
                            $("#add_billtype_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                            $('.help-block').css("color", "red");
                        });
                    }else{
                        $("#add_billtype_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }
                });
            });
        });
    });
    //end of add modal

    //edit bill type
    $(document).on('click', '.edit-modal', function() {
         var id = $(this).data('id');
        $("#editBillTypeModal").modal();
        axios.get('api/billtypes/'+id+'/edit').then(function(response){
            $('#id').val(response.data.id);
            $('#billtype_name').val(response.data.name);
        }).catch(function(failData){
            alert("Can not edit bill type.");
        });

        $('#editBtn').click(function(){
            axios.put('api/billtypes/'+id, $('#edit_billtype_form').serialize())
            .then(function(response){
                $('#billtypeDataTable').DataTable().ajax.reload();
                $('#editBillTypeModal').modal('hide');
                toastr.success('Edited Successfully.'); 
            }).catch(function(failData){
                 $.each(failData.response.data.errors, function(inputName, errors){
                $("#edit_billtype_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#edit_billtype_form [name="+inputName+"]").parent().find('.help-block').empty();
                    $.each(errors, function(indE, valE){
                        $("#edit_billtype_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        $('.help-block').css("color", "red");
                    });
                }else{
                    $("#edit_billtype_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                }
            });
           });
        }); 
    });
    /*end Edit method*/

  //delete bill type 
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });

    $('#deleteBtn').click(function(){
        var id = $("#id").val();
        axios.delete('api/billtypes/'+id, $('#delete_form').serialize()).then(function(response){
            $('#billtypeDataTable').DataTable().ajax.reload();
            $('#modalDelete').modal('hide');
            toastr.warning('Successfully Deleted.');
        }).catch(function(failData){
            alert("Can not delete bill type.");
        });
    });  
    //end of delete bill type

    //start datatable
	var billtypeDatatable = $('#billtypeDataTable').DataTable({
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
				var pageInfo = billtypeDatatable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Bill Type',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '135px',
			'render' : function(data, type, row, ind){
				return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl('api/billtypes'),
			dataSrc: 'data'
		},
	});
});	
</script>
@endsection