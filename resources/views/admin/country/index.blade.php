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
		</div>
	</div>
	<div class="card-body">
		@include('admin.country.add_country')
		@include('admin.country.edit_country')
		<div class="table-responsive">
			<table id="countryDataTable" class="display table table-striped table-hover">
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
// datatable starts
var countryDataTable = null;
window.addEventListener("load",function(){

	$("#modalAdd").on("hidden.bs.modal", function() {
        document.getElementById("addForm").reset();
        $('#addForm .has-error').removeClass('has-error');
        $('#addForm').find('.help-block').empty();
    });

    /****************************************/
    /*common add method for insert form data*/
    /****************************************/
    utlt['Add'] = function(url, dataTable){

    	$('#addForm .has-error').removeClass('has-error');
        $('#addForm').find('.help-block').empty();

        $.ajax({
            url : utlt.siteUrl(url),
            type : "POST",
            data : $('#addForm').serialize()

        }).done(function(resData){
            $(dataTable).DataTable().ajax.reload();
            $('#modalAdd').modal('hide');
        });
    }
    /*end add method*/

	 /*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('api/countries', '#countryDataTable');
    });
     /*End Ajax for insert*/

       /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('api/countries', id, '#countryDataTable');
    });
    /*-----------End ajax for Update------------*/


       /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('api/countries/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
              $('#id').val(resData.id);
              $('#name').val(resData.name);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });
        $("#editCountryModal").modal();
    });
    /*-----------End ajax for Edit------------*/


        /****************************************/
        /***common  method for Edit form data****/
        /****************************************/
        utlt['Edit'] = function(url, id, dataTable){

            $.ajax({
                url : utlt.siteUrl(url+'/'+id),
                type : "PUT",
                data : $('#edit_form').serialize()

            }).done(function(resData){
                $(dataTable).DataTable().ajax.reload();
            });
        }
        /*end Edit method*/

var countryDataTable = $('#countryDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5, 10, 20, -1], [5, 10, 20, 'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "modalAdd",
				'class' : "btn btn-info btn-sm",
				'data-toggle' : "modal",
				'data-target' : "#modalAdd"
			}
		}
		],
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '40px',
			'align' : 'center',
			'render' : function(data, type, row, ind){
				var pageInfo = countryDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Name',
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
			url: utlt.siteUrl('api/countries'),
			dataSrc: 'data'
		},
	});
 });
// end datatable
</script>
@endsection