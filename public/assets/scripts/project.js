
var projectDataTable = null;
window.addEventListener("load",function(){

    /*get Category list and set to select option on addModal*/
    $(document).on('click', '#addModal', function(){
         utlt.GetAll('projectcategory/get-projectcategory','#add_category_name','Project Category');
        $("#modalAdd").modal();
    });
    /*end*/


	/*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('projects', '#projectDataTable');
    });
    /*End Ajax for insert*/


    /*Start ajax for view modal*/
    $(document).on('click', '.view-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('projects/'+id),
            type : "GET"

        }).done(function(resData){
             $.each(resData,function(ind,val){
                $('#view_title').text("project Information");
                $('#project_name').text("project Name: "+val.name);
                $('#coun_name').text("Category: "+val.category.name);
            });

        }).fail(function(failData){
            utlt.cLog(arguments);
            var htmlData ="";
            $.each(failData.responseJSON.errors,function(ind,val){
                $("#name").removeClass("hidden");
                $("#name").text(failData.responseJSON.errors.name);

            });

        });
        $("#modalView").modal();
    });
    /*End ajax for view modal*/


    /*start ajax for Update*/
     $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('projects', id, '#projectDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {

        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('projects/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
            utlt.GetAll('projectcategory/get-projectcategory','#edit_category_name','Project Category',resData.project_category_id);
            $('#id').val(resData.id);
            $('#name').val(resData.name);
            $('#details').val(resData.details);

        }).fail(function(failData){
            utlt.cLog(arguments);
            var htmlData ="";
            $.each(failData.responseJSON.errors,function(ind,val){
                $("#name").removeClass("hidden");
                $("#name").text(failData.responseJSON.errors.name);

            });

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
        utlt.Delete('projects', id, '#projectDataTable');
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/
	projectDataTable = $('#projectDataTable').DataTable({
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
				var pageInfo = projectDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Project Name',
			'name' : 'name',
			'data' : 'name',
		},
        {
            'title' : 'Category',
            'name' : 'category_name',
            'data' : 'categoryName',
        },
        {
			'title' : 'Project Details',
			'name' : 'details',
			'data' : 'details',
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
			url: utlt.siteUrl()+'project/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});