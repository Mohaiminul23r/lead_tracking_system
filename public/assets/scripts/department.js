
var departmentDataTable = null;
window.addEventListener("load",function(){

	/*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('departments', '#departmentDataTable');
    });
    /*End Ajax for insert*/

    /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('departments', id, '#departmentDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('departments/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
              $('#id').val(resData.id);
              $('#name').val(resData.name);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });
        $("#modalEdit").modal();
    });
    /*-----------End ajax for Edit------------*/


    /*Start jquery for Delete modal*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
    /*End jquery for delete modal*/


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
    	var id = $("#id").val();
    	utlt.Delete('departments', id, '#departmentDataTable');
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/
	departmentDataTable = $('#departmentDataTable').DataTable({
		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5,10,-1], [5,10,'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addModal",
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
			'render' : function(data, type, row, ind){
				var pageInfo = departmentDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Department Name',
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
			url: utlt.siteUrl()+'department/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});