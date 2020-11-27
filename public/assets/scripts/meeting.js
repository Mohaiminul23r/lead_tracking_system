
var meetingDataTable = null;
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
    /*set all country and company value to add modal*/
    $(document).on('click', '#addModal', function(){
        utlt.GetAll('company/get-company','#add_company','company');
        utlt.GetAll('country/get-country','#add_country','country');

        $("#modalAdd").modal();
    }); 

    $(document).on('click', '.download', function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        $.ajax({
            url:utlt.siteUrl('/file/download/'+id),
            type:'GET'
        })
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
            meetingDataTable.ajax.reload();
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
        var id = $("#id").val();
        utlt.Edit('schedules', id, '#meetingDataTable');

    });
    /*-----------End ajax for Update------------*/

    $(document).on('click', '.minute-modal', function() {
        $('#mail_meeting_id').val($(this).data('id'));
        $("#mailModal").modal();

    });

    $('#mailConfirm').click(function(){
        var id = $('#mail_meeting_id').val();
        $.ajax({
            url : utlt.siteUrl('minulesmail/'+id),
            type : "GET"
        }).done(function(resData){ 
            if(resData == 'fail')
                utlt.showMsg('danger',"<strong>NO network connection :( send failed</strong>");
            else if(resData == 2)
                utlt.showMsg('warning',"<strong>This Minutes have already send!! :-)</strong>");
            else
                utlt.showMsg('success',"<strong>Minutes send Successfully.. :-)</strong>");


            $('#mailModal').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');


        }).fail(function(failData){
            utlt.cLog(arguments);           
        });
    });


    /*-----------End  for Edit------------*/

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
            $('#id').val(resData.id);
            $('#call_history_id').val(resData.call_history_id);
            $('#edit_name').val(resData.callhistory.client.name);
            $('#edit_project_name').val(resData.callhistory.project.name);
            $('#schedule_time').val($.formatDateTime('dd MM yy', new Date(resData.schedule_time)));
            $('#edit_schedule_time').val(resData.schedule_time);
            $('#edit_address1').val(resData.address.address1);
            $('#edit_postal_code').val(resData.address.postal_code);
            $("#status").val(resData.status).find("option[value=" + resData.status +"]").attr('selected', true);

        }).fail(function(failData){
            utlt.cLog(arguments);           
        });

        $("#modalEdit").modal();
    });
    /*-----------End  for Edit------------*/

    $(document).on('click', '.edit_extra_modal', function(){
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('meetings/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){ 
            $('#schedule_id').val(resData.schedule_id);
            $('#meeting_id').val(id);
            $('#client_id').val(resData.client_id);
            $('#user_id').val(resData.user_id);
            $('#project_id').val(resData.schedule.callhistory.project_id);
            $('#add_client_name').val(resData.client.name);
            $('#add_project_name').val(resData.schedule.callhistory.project.name);
            utlt.GetAll('projectslab/'+resData.schedule.callhistory.project_id+'/get-by-project','#project_slab_id','project slab');

            $('#extraBtnName').text('Add');
            $("#modalExtra").modal();

        }).fail(function(failData){
            utlt.cLog(arguments);
        });  

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
        utlt.Delete('schedules', id, '#meetingDataTable');
    });
    /*-----------End ajax for Delete------------*/


    $('#editExtratBtn').click(function(){
        $('#ExtraForm .has-error').removeClass('has-error');
        $('#ExtraForm').find('.help-block').empty();

        $.ajax({
            url : utlt.siteUrl('sales'),
            type : "POST",
            data : $('#ExtraForm').serialize()

        }).done(function(resData){
            if(resData == 'fail')
                utlt.showMsg('danger',"<strong>NO network connection :( Sale Successfuly Added!! :-)</strong>");
            else
                utlt.showMsg('success',"<strong>Sale Successfuly Added!! :-)</strong>");
            $('#modalExtra').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');

        }).fail(function(failData){

            $.each(failData.responseJSON.errors, function(inputName, errors){

                $("#modalExtra [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                if(typeof errors == "object"){
                    $("#modalExtra [name="+inputName+"]").parent().find('.help-block').empty();

                    $.each(errors, function(indE, valE){
                        $("#modalExtra [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                    });

                }
                else{
                    $("#modalExtra [name="+inputName+"]").parent().find('.help-block').html(valE);
                }

            });

        });
    });

    /*Start data table*/
    meetingDataTable = $('#meetingDataTable').DataTable({
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
                var pageInfo = meetingDataTable.page.info();
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
            'name' : 'meeting_time',
            'data' : 'meeting_time',
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
                if(data == 2){
                    return 'Pending';
                }
                else if(data == 1){
                    return 'Accepted';
                }
                else if(data == 0){
                    return 'Rejected';
                }
                else if(data == 3){
                    return 'Done';
                }
            }
        },
        {
            'title' : 'Download',
            'name' : 'opt',
            'data' : 'id',
            'width' : '50px',
            'render' : function(data, type, row, ind){

                return '<a href="'+utlt.siteUrl('file/download/'+data)+'"><span class="btn btn-warning">download</span></a>';
            }
        },
        {
            'title' : 'Send Mail',
            'name' : 'opt',
            'data' : 'id',
            'width' : '110px',
            'render' : function(data, type, row, ind){
                return '<span class="minute-modal btn btn-sm btn-primary" data-id = '+data+' >Send Mail</span> <span class="edit_extra_modal btn btn-sm btn-success" data-id = '+data+' >Sale</span>';
            }
        },
        {
            'title' : 'Option',
            'name' : 'opt',
            'data' : 'id',
            'width' : '60px',
            'render' : function(data, type, row, ind){
                return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'><span class="glyphicon glyphicon-edit"></span></span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'><span class="glyphicon glyphicon-remove"></span></span>';
            }
        }
        ],
        serverSide : true,
        processing : true,
        ajax: {
            url: utlt.siteUrl()+'meeting/get-data-json',
            dataSrc: 'data'
        },
    });

    /*End data table*/
});