
var callhistoryDataTable = null;
window.addEventListener("load",function(){

     $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('callhistories', id, '#callhistoryDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('callhistories/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){

            utlt.GetAll();
              $('#id').val(resData.id);
              $('#name').val(resData.name);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });
        $("#modalEdit").modal();
    });
    /*-----------End ajax for Edit------------*/


     $(document).on('click', '.edit_extra_modal', function(){
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('callhistories/'+id),
            type : "GET"
        }).done(function(resData){
            
            $('#client_name').text(resData.client.name);
            $('#client_id').val(resData.client.id);
            $('#project_name').text(resData.project.name);
            $('#callhistory_id').val(resData.id);
            $('#extraBtnName').text('Add');
            $("#modalExtra").modal();
        });
    });

    /*Start jquery for Delete modal*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
    /*End jquery for delete modal*/


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
        var id = $("#id").val();
        utlt.Delete('callhistories', id, '#callhistoryDataTable');
    });
	/*-----------End ajax for Delete------------*/

    /*extra for add to followup*/
    $('#editExtratBtn').click(function(){
         $('#ExtraForm .has-error').removeClass('has-error');
            $('#ExtraForm').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl('followups'),
                type : "POST",
                data : $('#ExtraForm').serialize()

            }).done(function(resData){
                $('#modalExtra').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
                utlt.showMsg('info',"<strong>Follow up Successfuly Added!! :-)</strong>");

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

            /*kjnsdf*/


    /*Start data table*/
	callhistoryDataTable = $('#callhistoryDataTable').DataTable({
		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5,10,-1], [5,10,'All']],
		
		columns : [
		{
			'title' : '#SL',
			'name' : 'SL',
			'data' : 'id',
			'width' : '40px',
			'render' : function(data, type, row, ind){
				var pageInfo = callhistoryDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Client Name',
			'name' : 'name',
			'data' : 'clientName'
		},
		{
			'title' : 'User Name',
			'name' : 'name',
			'data' : 'userName'
		},
		{
			'title' : 'Project Name',
			'name' : 'name',
			'data' : 'projectName'
		},
        {
            'title' : 'First time',
            'name' : 'created_at',
            'data' : 'created_at',
            'width' : '100px',
            'render' : function(data, type, row, ind){
                return $.formatDateTime('d M y g:ii a', new Date(data));
            }
        },
        {
            'title' : 'Update time',
            'name' : 'updated_at',
            'data' : 'updated_at',
            'width' : '100px',
            'render' : function(data, type, row, ind){
                return $.formatDateTime('d M y g:ii a', new Date(data));
            }
        },
        {
            'title' : 'Sattus',
            'name' : 'status',
            'data' : 'status',
            'render' : function(data, type, row, ind){
                if(data == 0){
                    return 'Not-Interested';
                }
                else if(data == 1){
                    return 'Interested';
                }
                else if(data == 2){
                    return 'Intermediate';
                }
            }
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
                return '<span class="edit_extra_modal btn btn-sm btn-success" data-id = '+data+' >Add to Follow Up</span>';
            }
        }
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'callhistory/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});