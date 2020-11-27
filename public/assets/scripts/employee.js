
var employeeDataTable = null;
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

	 /*Set Data for view modal*/
    $(document).on('click', '.view-modal', function() {
       var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('employees/'+id),
            type : "GET"

        }).done(function(resData){
            $('#view_title').text("Profile of "+resData.user.name);
            $('#user_id').val(id);
            $('.edit_extra_modal').removeClass('hidden');
            $('.edit_extra_modal').text('Edit address');
            $('#user_img').attr("src",resData.path);
            $('#view_name').text(resData.user.name);
            $('#view_id').text(resData.id);
            $('#view_join_date').text($.formatDateTime('dd MM yy', new Date(resData.created_at)));
            $('#view_company').text(resData.company.name);
            $('#view_office').text(resData.office.name);
            $('#view_department').text(resData.department.name);
            $('#view_employee_type').text(resData.employee_type.name);
            $('#view_designation').text(resData.designation.name);
            $('#view_email').text(resData.user.email);
            $('#view_phone').text(resData.phone);
            $('#view_salary').text(resData.salary);
            if(resData.status){
                $('#view_status').text("Active");
            }
            else{
                $('#view_status').text("Inactive");
            }

            $('#view_gender').text(resData.gender);
            $('#view_dob').text(resData.dob);
            
            if(resData.address){
                $('#view_country').text(resData.address.country.name);
                $('#view_city').text(resData.address.city.name);
                $('#view_address').text(resData.address.address1);
                $('#view_postal_code').text(resData.address.postal_code);
            }

            
        }).fail(function(failData){
            utlt.cLog(arguments);
        });

        $("#modalView").modal();
    });
    /*End  view modal*/


    /*get all list and set to select option on addModal*/
    $(document).on('click', '#addModal', function(){
       
        utlt.GetAll('company/get-company','#add_company','company');
        utlt.GetAll('department/get-department','#add_department','department');
        utlt.GetAll('employee_type/get-employee-type','#add_employee_type','employee Type');
        utlt.GetAll('designation/get-designation','#add_designation','Designation');

        $("#modalAdd").modal();
    });
    /*end*/

    $(document).on('click', '.edit_extra_modal', function(){
        var id = $('#user_id').val();
        $.ajax({
            url : utlt.siteUrl('employees/'+id),
            type : "GET"

        }).done(function(resData){
            var country_id = 0;
            var city_id = 0;

            $('#modalView').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');

            $('#edit_extra_title').text("Edit Address of "+resData.name);
            if (resData.address_id != null){
                country_id = resData.address.country_id;
                city_id = resData.address.city_id;
                $('#address1').val(resData.address.address1);
                $('#postal_code').val(resData.address.postal_code);
                $('#employee_address_id').val(resData.address_id);
            }
            else{
                 country_id =0;
                 city_id =0;
                 $('#address1').val('');
                 $('#postal_code').val('');
                 $('#employee_address_id').val('');

            }

            utlt.GetAll('country/get-country', '#employee_country', 'Country', country_id);
            utlt.GetAll('city/'+country_id+'/get-by-country', '#employee_city', 'City', city_id);
            $('#employee_information_id').val(resData.id);
            
            $("#modalExtra").modal();
        });
    });

    
    $(document).on('click', '.role-modal', function(){
        var id = $(this).data('id');
         $.ajax({
            url : utlt.siteUrl('employees/'+id),
            type : "GET"

        }).done(function(resData){
            $('#user_role_name').text('Name : '+resData.user.name);
            $('#user_designation').text('Designation : '+resData.designation.name);
            $('#user_role_id').val(resData.user.id);

        }).fail(function(failData){

        });

         var htmlData = '';
                
            $.ajax({
                url : utlt.siteUrl('role/get-role'),
                type : 'GET'

            }).done(function(resData){
                var i = 1;
                $.each(resData,function(ind, val){
                    
                    if(i%3 == 1)
                    htmlData  += '<tr>';

                    htmlData+= '<td>'+
                                    '<div class = "custom-control custom-checkbox">'+
                                      '<label class= "custom-control-label"><input type="checkbox" name="role_id[]" value="'+val.id+'" class="custom-control-input">'+' '+val.description+'</label>'+
                                    '</div>'+
                                '</td>';

                    if(i%3==0)
                    htmlData += '</tr>';
                    i++;
                });

                $('#rolesTable').html(htmlData);

            }).fail(function(failData){
                utlt.cLog(arguments);
            });
       
        $("#roleModal").modal();
    });



    $('#BtnRole').click(function(){
        var id = $('#user_role_id').val();
        $.ajax({
            url : utlt.siteUrl('role/attachRole/'+id),
            type : "POST",
            data : $('#RoleForm').serialize()

        }).done(function(resData){
            utlt.showMsg('success',"<strong>Role set Successfully!! :-)</strong>");

            $('#roleModal').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');

        }).fail(function(failData){
            utlt.cLog(arguments);
        });

    });



    /*set  value for edit modal*/
    $(document).on('click', '.edit-modal', function() {        
        var id = $(this).data('id');
        
        $.ajax({
            url : utlt.siteUrl('employees/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
            
            utlt.GetAll('company/get-company','#edit_company','Company',resData.company_id);
            utlt.GetAll('office/'+resData.company_id+'/get-by-company','#edit_office','office',resData.office_id);
            utlt.GetAll('department/get-department','#edit_department','department',resData.department_id);
            utlt.GetAll('employee_type/get-employee-type','#edit_employee_type','employee Type',resData.employee_type_id);
            utlt.GetAll('designation/get-designation', '#edit_designation', 'designation', resData.designation_id);
            $('#edit_user_id').val(resData.user.id);
            $('#id').val(resData.id);
            $('#edit_name').val(resData.user.name);

            if(resData.gender == 'Male'){
                $( "#male" ).prop( "checked", true );
            }
            else{
                $('#female').prop( "checked", true );
            }

            if(resData.dob){
                $('#edit_dob').val(resData.dob);
                $('#edit_show_dob').val($.formatDateTime('dd MM yy', new Date(resData.dob)));
            }

            $('#edit_salary').val(resData.salary);
            $('#edit_phone').val(resData.phone);
            $('#edit_email').val(resData.user.email);               
        	$("#modalEdit").modal();
        });
    });
    /*-----------End ajax for Edit------------*/

    /*Start jquery for Delete modal*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
    /*End jquery for delete modal*/

    /*get city depend on country id*/
    $('#add_company').change(function(){ 
        var id = $(this).val();
        utlt.GetAll('office/'+id+'/get-by-company','#add_office','Office');
    });


    /*set city for edit*/
    $('#edit_company').change(function(){ 
        var id = $(this).val();
        utlt.GetAll('office/'+id+'/get-by-company','#edit_office','Office');
    });

    /*end*/

    /*set city for edit*/
    $('#employee_country').change(function(){ 
        var id = $(this).val();
        utlt.GetAll('city/'+id+'/get-by-country','#employee_city','City');
    });

    /*end*/

    /*start ajax for insert*/
    $('#editExtratBtn').click(function(){
        var address_id = $('#address_id').val();
        var id = $('#user_id').val();
        var employee_information_id = $('#employee_information_id').val();
       
            $.ajax({
                url : utlt.siteUrl('storeAddress/'+id),
                type : "POST",
                data : $('#ExtraForm').serialize()

            }).done(function(resData){
                 utlt.cLog(arguments);
                employeeDataTable.ajax.reload();
                utlt.showMsg('success',"<strong>Successfuly Added!! :-)</strong>");

                $('#modalExtra').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');

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
    /*End Ajax for insert*/


	/*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('employees', '#employeeDataTable');
    });
    /*End Ajax for insert*/

    /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('employees', id, '#employeeDataTable');   
    });
    /*-----------End ajax for Update------------*/


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
    	var id = $("#id").val();
        utlt.Delete('employees', id, '#employeeDataTable');   	
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/

	employeeDataTable = $('#employeeDataTable').DataTable({

		dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
		initComplete : function(){

		},
		lengthMenu : [[5,15,-1], [5,15,'All']],
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
			'data' : 'user.id',
			'width' : '30px',
			'render' : function(data, type, row, ind){
				var pageInfo = employeeDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Name',
			'name' : 'name',
			'data' : 'userName'
		},
        {
            'title' : 'Company',
            'name' : 'company_name',
            'data' : 'companyName'
        },

         {
            'title' : 'Office',
            'name' : 'office_name',
            'data' : 'officeName'
        },

        {
            'title' : 'Email',
            'name' : 'email',
            'data' : 'userEmail'
        },

        {
            'title' : 'Phone',
            'name' : 'phone',
            'data' : 'phone'
        },
		{
			'title' : 'Option',
			'name' : 'opt',
			'data' : 'id',
			'width' : '145px',
			'render' : function(data, type, row, ind){
				return '<span class="view-modal btn btn-sm btn-info" data-id = '+data+' >View</span> <span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
			}
		},
        {
            'title' : 'Set Role',
            'name' : 'opt',
            'data' : 'id',
            'render' : function(data, type, row, ind){ 
            return '<button type="button" class="role-modal btn btn-sm btn-info" data-id = '+data+'>Add Role</button>';
                
            }
        }
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'employee/get-data-json',
			dataSrc: 'data'
		},
	});

    $(document).on('click', '.group-all-check-all', function() {

        if($('.group-all-check-all').is(':checked')){
            $('.group-all input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-all input[type="checkbox"]').prop('checked', false);
        }
    });

	/*End data table*/
});