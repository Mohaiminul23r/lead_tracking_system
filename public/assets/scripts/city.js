
var cityDataTable = null;
window.addEventListener("load",function(){

    /*get country list and set to select option on addModal*/
    $(document).on('click', '#addModal', function(){
        utlt.GetAll('country/get-country','#add_country_name', 'country');
        $("#modalAdd").modal();
    });
    /*end*/

	/*start ajax for insert*/
     $('#addBtn').click(function(){
        utlt.Add('cities', '#cityDataTable');
    });
    /*End Ajax for insert*/

    /*start ajax for Update*/
    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('cities', id, '#cityDataTable');
    });
    /*-----------End ajax for Update------------*/

    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {

        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('cities/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
                utlt.GetAll('country/get-country','#country_name', 'country',resData.country_id);
                  
                $('#id').val(resData.id);
                $('#name').val(resData.name);


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
        utlt.Delete('cities', id, '#cityDataTable');
    });
	/*-----------End ajax for Delete------------*/

    /*Start data table*/
	cityDataTable = $('#cityDataTable').DataTable({
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
				var pageInfo = cityDataTable.page.info();
				return (ind.row + 1) + pageInfo.start;
			}
		},
		{
			'title' : 'Name',
			'name' : 'name',
			'data' : 'name',
		},
        {
            'title' : 'Country',
            'name' : 'country_name',
            'data' : 'countryName',
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
			url: utlt.siteUrl()+'city/get-data-json',
			dataSrc: 'data'
		},
	});

	/*End data table*/
});