
var projectslabDataTable = null;
window.addEventListener("load",function(){

    /*get project list and set to select option on addModal*/
    $(document).on('click', '#addModal', function(){
         utlt.GetAll('project/get-project','#add_project_name','project name');
        $("#modalAdd").modal();
    });
   /*end*/

	/*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('projectslabs', '#projectslabDataTable');
    });
    /*End Ajax for insert*/


    /*Start ajax for view modal*/
    $(document).on('click', '.view-modal', function() {
        $("#modalView").modal();
    });
    /*End ajax for view modal*/


    /*start ajax for Update*/

    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('projectslabs', id, '#projectslabDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {

        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('projectslabs/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
            utlt.GetAll("project/get-project",'#edit_project_name','project slab',resData.project_id);
            $('#id').val(resData.id);
            $('#edit_name').val(resData.name);
            $('#edit_employee_no').val(resData.employee);
            $('#edit_price').val(resData.price);
            $('#edit_support_cost').val(resData.support_cost);
            $("#status").val(resData.status).find("option[value=" + resData.status +"]").attr('selected', true);

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
    	utlt.Add('projectslabs', '#projectslabDataTable');
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/
	projectslabDataTable = $('#projectslabDataTable').DataTable({
		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5,10,-1], [5,10,'All']],
		buttons : [
		{
			text : 'Add+',
			attr : {
				'id' : "addModal",
				'class' : "btn btn-info btn-sm"
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
                var pageInfo = projectslabDataTable.page.info();
                return (ind.row + 1) + pageInfo.start;
            }
        },
        {
            'title' : 'Slab Name',
            'name' : 'name',
            'data' : 'name'
        },
        {
            'title' : 'Project Name',
            'name' : 'project_name',
            'data' : 'projectName'
        },
        {
            'title' : 'No. of Employees',
            'name' : 'employee',
            'data' : 'employee'
        },
        {
            'title' : 'Price',
            'name' : 'price',
            'data' : 'price'
        },
        {
            'title' : 'Supporting Cost',
            'name' : 'support_cost',
            'data' : 'support_cost'
        },
        {
            'title' : 'Option',
            'name' : 'opt',
            'data' : 'id',
            'width' : '90px',
            'render' : function(data, type, row, ind){
                return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
            }
        }
        ],
        serverSide : true,
        processing : true,
        ajax: {
            url: utlt.siteUrl()+'projectslab/get-data-json',
            dataSrc: 'data'
        },
    });


	/*End data table*/
});