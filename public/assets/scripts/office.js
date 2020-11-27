
var officeDataTable = null;
window.addEventListener("load",function(){

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
        utlt.Add('offices', '#officeDataTable');
    });
    /*End Ajax for insert*/


    /*start ajax for Update*/

    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('offices', id, '#officeDataTable');
    });
    /*-----------End ajax for Update------------*/


    /*set all retrieve data for edit modal*/
    $(document).on('click', '.edit-modal', function() {

        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('offices/'+id+'/edit'),
            type : "GET"
       
        }).done(function(resData){    
            utlt.GetAll("company/get-company",'#edit_company','company',resData.company_id);
            utlt.GetAll("country/get-country",'#edit_country','country',resData.address.country_id);
            utlt.GetAll("city/"+resData.address.country_id+"/get-by-country",'#edit_city','city',resData.address.city_id);
            $('#id').val(resData.id);
            $('#edit_name').val(resData.name);
            $('#edit_email').val(resData.email);
            $('#edit_phone').val(resData.phone);
            $('#edit_postal_code').val(resData.address.postal_code);
            $('#edit_address1').val(resData.address.address1);
            $('#edit_address_id').val(resData.address_id);

        }).fail(function(failData){
            utlt.cLog(arguments);           
        });

        $("#modalEdit").modal();
    });
    /*-----------End  for Edit------------*/


    /*Set data for delete modal*/
    $(document).on('click', '.delete-modal', function() {
        $('#id').val($(this).data('id'));
        $("#modalDelete").modal();
    });
    /*End Set data for delete modal*/


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
    	var id = $("#id").val();
        utlt.Delete('offices', id, '#officeDataTable');
    });
	/*-----------End ajax for Delete------------*/


    /*Start data table*/
	officeDataTable = $('#officeDataTable').DataTable({
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
			'width' : '30px',
			'render' : function(data, type, row, ind){
				var pageInfo = officeDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Name',
			'name' : 'name',
			'data' : 'name'
		},
        {
            'title' : 'Company',
            'name' : 'company_name',
            'data' : 'companyName'
        },

        {
            'title' : 'Address',
            'name' : 'address_id',
            'data' : 'addressName'
        },
        {
            'title' : 'Email',
            'name' : 'email',
            'data' : 'email'
        },
        {
            'title' : 'Phone',
            'name' : 'phone',
            'data' : 'phone',
            // 'data' : 'email'
        },
		{
			'title' : 'Option',
			'name' : 'opt',
			'data' : 'id',
			'width' : '160px',

			'render' : function(data, type, row, ind){
				return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span> <span class="delete-modal btn btn-sm btn-danger" data-id = '+data+'>Delete</span>';
			}
		}
		],
		serverSide : true,
		processing : true,
		ajax: {
			url: utlt.siteUrl()+'office/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});