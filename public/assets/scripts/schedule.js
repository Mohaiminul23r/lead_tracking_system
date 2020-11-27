
var scheduleDataTable = null;
window.addEventListener("load", function(){

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
    /*set all country and company value to add modal*/
    $(document).on('click', '#addModal', function(){
        utlt.GetAll('company/get-company','#add_company','company');
        utlt.GetAll('country/get-country','#add_country','country');

        $("#modalAdd").modal();
    });
    /*end*/

    /*get city depend on country id*/
    $('#add_country').change(function(){ 
        var id = $(this).val();
        utlt.GetAll("city/"+id+"/get-by-country",'#add_city','city');
    });

    $('#edit_country').change(function(){ 
        var id = $(this).val();
        utlt.GetAll("city/"+id+"/get-by-country",'#edit_city','city');
    });
    /*end*/


	/*start ajax for insert*/
    $('#addBtn').click(function(){
        $.ajax({
            url : utlt.siteUrl('schedules'),
            type : "POST",
            data : $('#addForm').serialize()

        }).done(function(resData){
            scheduleDataTable.ajax.reload();
            utlt.showMsg('success',"<strong>Successfuly Added!! :-)</strong>");

            $('#modalAdd').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');


        }).fail(function(failData){
            $.each(failData.responseJSON.errors,function(ind,val){
                $(".help-block").text(failData.responseJSON.errors.name);

            });
        });
    });
    /*End Ajax for insert*/


    /*start ajax for Update*/

    $('#editBtn').click(function(){
        var id = $("#edit_id").val();
        utlt.Edit('schedules', id, '#scheduleDataTable');

    });
    /*-----------End ajax for Update------------*/


    /*set all retrieve data for edit modal*/
    $(document).on('click', '.edit-modal', function() {

        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('schedules/'+id+'/edit'),
            type : "GET"
       
        }).done(function(resData){ 

            utlt.GetAll("user/get-user",'#edit_employee','sales executive',resData.employee_id);
            utlt.GetAll("country/get-country",'#edit_country','country',resData.address.country_id);
            utlt.GetAll("city/"+resData.address.country_id+"/get-by-country",'#edit_city','city',resData.address.city_id);
            $('#edit_id').val(resData.id);
            $('#edit_client_id').val(resData.callhistory.client_id);
            $('#call_history_id').val(resData.call_history_id);
            $('#edit_name').val(resData.callhistory.client.name);
            $('#edit_project_name').val(resData.callhistory.project.name);
            $('#schedule_time').val($.formatDateTime('d M y g:ii a', new Date(resData.schedule_time)));
            $('#edit_schedule_time').val(resData.schedule_time);
            $('#edit_address1').val(resData.address.address1);
            $('#edit_postal_code').val(resData.address.postal_code);
            $("#edit_status").val(resData.status).find("option[value=" + resData.status +"]").attr('selected', true);

        }).fail(function(failData){
            utlt.cLog(arguments);           
        });

        $("#modalEdit").modal();
    });
    /*-----------End  for Edit------------*/

     $(document).on('click', '.edit_extra_modal', function(){
       var id = $(this).data('id');
          $.ajax({
            url : utlt.siteUrl('schedules/'+id+'/edit'),
            type : "GET"
        }).done(function(resData){
            $('#client_id').val(resData.callhistory.client.id)
            $('#m_user_id').val(resData.employee_id)
            $('#schedule_id').val(id);
            $('#extraBtnName').text('Add');
        }).fail(function(failData){
            utlt.cLog(arguments);
        });

        $("#modalExtra2").modal();
    });

    /*Set data for delete modal*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
    /*End Set data for delete modal*/


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
        var id = $("#id").val();
    	utlt.Delete('schedules', id, '#scheduleDataTable');
    });
	/*-----------End ajax for Delete------------*/

     $('#editExtratBtn2').click(function(){

            $('#ExtraForm .has-error').removeClass('has-error');
            $('#ExtraForm').find('.help-block').empty();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var myForm = document.getElementById('ExtraForm');
            var formData = new FormData(myForm)
            formData.append('_token', csrf);
            $.ajax({
                url : utlt.siteUrl('meetings'),
                type : "POST",
                data : formData,
                cache: false,
                contentType: false,
                processData: false,

            }).done(function(resData){
                $('#modalExtra2').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
                 utlt.showMsg('success',"<strong>Meeting Successfuly Added!! :-)</strong>");

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
	scheduleDataTable = $('#scheduleDataTable').DataTable({
		dom : '<"row"<"col-md-6"l><"col-md-6"f>>rtip',
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
			'width' : '30px',
			'render' : function(data, type, row, ind){
				var pageInfo = scheduleDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Client Name',
			'name' : 'clientName',
			'data' : 'name',
		},
        {
            'title' : 'Project Name',
            'name' : 'projectName',
            'data' : 'projectName',
        },

        {
            'title' : 'Meeting Date',
            'name' : 'schedule_time',
            'data' : 'schedule_time',
            'width' : '100px',
            'render' : function(data, type, row, ind){
                return $.formatDateTime('d M y g:ii a', new Date(data));
            }
        },
        {
            'title' : 'Employee',
            'name' : 'user_name',
            'data' : 'userName',
        },
        {
            'title' : 'Status',
            'name' : 'status',
            'data' : 'status',
            'render' : function(data, type, row, ind){
                if(data == 0){
                    return 'Pending';
                }
                else if(data == 1){
                    return 'Accepted';
                }
            }
        },
		{
			'title' : 'Option',
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
                return '<span class="edit_extra_modal btn btn-sm btn-success" data-id = '+data+'>Completed</span>';
            }
        }
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'schedule/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});