
var followupDataTable = null;
window.addEventListener("load",function(){

     $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });

    /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('callhistories', id, '#followupDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('callhistories/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){

              $('#id').val(resData.id);
              $('#name').val(resData.name);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });
        $("#modalEdit").modal();
    }); 

    $(document).on('click', '.edit_schedule_modal', function() {
        utlt.GetAll('country/get-country','#add_country','country');
        $('#call_history_id').val($(this).data('id'));
        $("#ModalSchedule").modal();
    });

    

    $('#SdBtn').click(function(){
         $('#sdForm .has-error').removeClass('has-error');
            $('#sdForm').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl('schedules'),
                type : "POST",
                data : $('#sdForm').serialize()

            }).done(function(resData){
                $('#ModalSchedule').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
                utlt.showMsg('success',"<strong>Schedule Successfuly Added!! :-)</strong>");

            }).fail(function(failData){

                $.each(failData.responseJSON.errors, function(inputName, errors){

                    $("#sdForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#sdForm [name="+inputName+"]").parent().find('.help-block').empty();

                        $.each(errors, function(indE, valE){
                            $("#sdForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });

                    }
                    else{
                        $("#sdForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }

                });

            });
        });

    $('#add_country').change(function(){ 
        var id = $(this).val();
        utlt.GetAll('city/'+id+'/get-by-country','#add_city','city');
    });
    /*-----------End ajax for Edit------------*/


     $(document).on('click', '.edit_extra_modal', function(){
      
            $("#modalExtra").modal();
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
        utlt.Delete('callhistories', id, '#followupDataTable');
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/
	followupDataTable = $('#followupDataTable').DataTable({
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
				var pageInfo = followupDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Client Name',
			'name' : 'name',
			'data' : 'name'
		},
		{
			'title' : 'Client Phone',
			'name' : 'phone',
			'data' : 'phone'
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
            'title' : 'Date to Followup',
            'name' : 'followup_time',
            'data' : 'followup_time',
            'width' : '100px',
            'render' : function(data, type, row, ind){
                return $.formatDateTime('d M y g:ii a', new Date(data));
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
            'data' : 'call_history_id',
            'width' : '65px',
            'render' : function(data, type, row, ind){
                return '<span class="edit_schedule_modal btn btn-sm btn-success" data-id = '+data+' >Add to Schedule</span>';
            }
        }
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'followup/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});