
var permissionDataTable = null;
window.addEventListener("load",function(){

    /*start ajax for Update*/

    $('#editBtn').click(function(){
        var id = $("#edit_id").val();
        utlt.Edit('permissions', id,  '#permissionDataTable');

    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('permissions/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
            $('#edit_id').val(resData.id);
            $('#edit_name').val(resData.name);
            $('#edit_description').val(resData.description);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });

        $("#modalEdit").modal();
    });
    /*-----------End ajax for Edit------------*/

    /*Start data table*/
    permissionDataTable = $('#permissionDataTable').DataTable({
        dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
        initComplete : function(){

        },
        lengthMenu : [[5,10,-1], [5,10,'All']],
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
                var pageInfo = permissionDataTable.page.info();
                return (ind.row + 1) + pageInfo.start;
            }
        },
        {
            'title' : 'Name',
            'name' : 'name',
            'data' : 'name',
        },
        {
            'title' : 'Description',
            'name' : 'description',
            'data' : 'description',
        },
        {
            'title' : 'OPT',
            'name' : 'opt',
            'data' : 'id',
            'width' : '100px',
            'render' : function(data, type, row, ind){
                return '<span class="edit-modal btn btn-sm btn-primary" data-id = '+data+'>Edit</span>';
            }
        }
        ],
        serverSide : true,
        processing : true,
        ajax: {
            url: utlt.siteUrl()+'permission/get-data-json',
            dataSrc: 'data'
        },
    });

});