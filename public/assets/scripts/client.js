
var clientDataTable = null;
window.addEventListener("load",function(){

	/*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('clients', '#clientDataTable');
    });
    /*End Ajax for insert*/


    /*Start ajax for view modal*/
    $(document).on('click', '.view-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('clients/'+id),
            type : "GET"

        }).done(function(resData){
            $('#view_title').text(resData.name);

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
        utlt.Edit('clients', id, '#clientDataTable');
    });
    /*-----------End ajax for Update------------*/

    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('clients/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
              $('#id').val(resData.id);
              $('#name').val(resData.name);
              $('#company').val(resData.company);
              $('#phone').val(resData.phone);
              $('#email').val(resData.email);

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
        utlt.Delete('clients', id, '#clientDataTable');
    });
    /*-----------End ajax for Delete------------*/

    $(document).on('click', '.edit_extra_modal', function(){
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('clients/'+id),
            type : "GET"
        }).done(function(resData){
            utlt.GetAll('project/get-project','#add_project', 'project');
            $('#client_name').text(resData.name);
            $('#client_phone').text(resData.phone);
            $('#client_id').val(resData.id);
            $('#extraBtnName').text('Add');
            $("#modalExtra").modal();
        });
    });

    $('#editExtratBtn').click(function(){
         $('#ExtraForm .has-error').removeClass('has-error');
            $('#ExtraForm').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl('callhistories'),
                type : "POST",
                data : $('#ExtraForm').serialize()

            }).done(function(resData){
                $('#modalExtra').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
                utlt.showMsg('success',"<strong>Call history Successfuly Added!! :-)</strong>");

            }).fail(function(failData){

                $.each(failData.responseJSON.errors, function(inputName, errors){

                    $("#ExtraForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#ExtraForm [name="+inputName+"]").parent().find('.help-block').empty();

                        $.each(errors, function(indE, valE){
                            $("#ExtraForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });

                    }
                    else{
                        $("#ExtraForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }

                });

            });
    });
    


    /*Start data table*/
	clientDataTable = $('#clientDataTable').DataTable({
		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[7,10,-1], [7,10,'All']],
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
				var pageInfo = clientDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Client Name',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Company',
			'name' : 'company',
			'data' : 'company'
		},
		{
			'title' : 'Phone',
			'name' : 'phone',
			'data' : 'phone'
		},
		{
			'title' : 'Email',
			'name' : 'email',
			'data' : 'email'
		},
		{
			'title' : 'OPT',
			'name' : 'opt',
			'data' : 'id',
			'width' : '90px',
			'render' : function(data, type, row, ind){
				return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
			}
		},
        {
            'title' : 'Option',
            'name' : 'opt',
            'data' : 'id',
            'width' : '65px',
            'render' : function(data, type, row, ind){
                return '<span class="edit_extra_modal btn btn-sm btn-info" data-id = '+data+' >Add to call</span>';
            }
        }
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'client/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});