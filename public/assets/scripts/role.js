
var roleDataTable = null;
window.addEventListener("load",function(){

    /*start ajax for insert*/
    $('#addBtn').click(function(){
        utlt.Add('roles', '#roleDataTable');
    });
    /*End Ajax for insert*/



    /*start ajax for Update*/

    $('#editBtn').click(function(){
        var id = $("#id").val();
        utlt.Edit('roles', id,  '#roleDataTable');

    });
    /*-----------End ajax for Update------------*/


    /*Start Ajax for Edit*/
    $(document).on('click', '.edit-modal', function() {
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('roles/'+id+'/edit'),
            type : "GET"

        }).done(function(resData){
            $('#id').val(resData.id);
            $('#edit_name').val(resData.name);
            $('#edit_description').val(resData.description);

        }).fail(function(failData){
            utlt.cLog(arguments);
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

    function nextChar(c) {
        return String.fromCharCode(c.charCodeAt(0) + 1);
    }

    $(document).on('click', '.role-modal', function(){
        var id = $(this).data('id');
        $.ajax({
            url : utlt.siteUrl('roles/'+id),
            type : "GET"

        }).done(function(resData){
            $('#role_name').text('Role Name : '+resData.name);
            $('#role_description').text('Description : '+resData.description);
            $('#role_id').val(resData.id);

        }).fail(function(failData){

        });

        var htmlData = '';

        $.ajax({
            url : utlt.siteUrl('permission/get-permission'),
            type : 'GET'

        }).done(function(resData){
            var i = 1;
            var j = 1;
            var count = 'a';

            $.each(resData,function(ind, val){

                if(i%21 == 1)
                    htmlData  += '<tr>';

                if(j%7 == 1){
                    htmlData+= '<td valign="top"><table class="group-'+count+'">'+
                    '<thead>'+
                    '<tr style="background-color:#414042; color:#fff; font-weight:bold;">'+
                    '<th><label><input class="group-'+count+'-check-all" type="checkbox"> Check all '+val.name.split(".", 1)+' permissions</label></th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody>';
                }



                htmlData += '<tr>'+
                '<td><label><input type="checkbox" name="permission_id[]" value = "'+val.id+'">'+' '+val.description+'</label></td>'+
                '</tr>';

                if(j%7 == 0){
                    count = nextChar(count);
                    htmlData+=   '</tbody></table></td>';
                }

                if(i%21 == 0)
                    htmlData += '</tr>';
                j++;
                i++;
            });

            $('#permissionTable').html(htmlData);

        }).fail(function(failData){
            utlt.cLog(arguments);
        });

        $("#roleModal").modal();
    });


    $('#BtnRole').click(function(){
        var id = $('#role_id').val();
        $.ajax({
            url : utlt.siteUrl('permissions'),
            type : "POST",
            data : $('#RoleForm').serialize()

        }).done(function(resData){
            utlt.showMsg('success',"<strong>Permissions set Successfully!! :-)</strong>");

            $('#roleModal').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');


        }).fail(function(failData){
            utlt.cLog(arguments);

        });

    });


    /*start ajax for delete*/
    $('#deleteBtn').click(function(){
        var id = $("#id").val();
        utlt.Delete('roles', id,  '#roleDataTable');
    });
    /*-----------End ajax for Delete------------*/


    /*Start data table*/
    roleDataTable = $('#roleDataTable').DataTable({
        dom : '<"row"<"col-md-3"B><"col-md-3"l><"col-md-6"f>>rtip',
        initComplete : function(){

        },
        lengthMenu : [[8,15,-1], [8,15,'All']],
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
                var pageInfo = roleDataTable.page.info();
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
            'title' : 'Permission',
            'name' : 'opt',
            'data' : 'id',
            'width' : '15px',
            'render' : function(data, type, row, ind){
                return '<span class="role-modal btn btn-sm btn-success" data-id = '+data+' >Add permission</span>';
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
        }
        ],
        serverSide : true,
        processing : true,
        ajax: {
            url: utlt.siteUrl()+'role/get-data-json',
            dataSrc: 'data'
        },
    });

    $(document).on('click', '.group-a-check-all', function() {

        if($('.group-a-check-all').is(':checked')){
            $('.group-a input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-a input[type="checkbox"]').prop('checked', false);
        }
    });

    $(document).on('click', '.group-b-check-all', function() {

        if($('.group-b-check-all').is(':checked')){
            $('.group-b input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-b input[type="checkbox"]').prop('checked', false);
        }
    });

    $(document).on('click', '.group-c-check-all', function() {

        if($('.group-c-check-all').is(':checked')){
            $('.group-c input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-c input[type="checkbox"]').prop('checked', false);
        }
    });

    $(document).on('click', '.group-d-check-all', function() {

        if($('.group-d-check-all').is(':checked')){
            $('.group-d input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-d input[type="checkbox"]').prop('checked', false);
        }
    });

     $(document).on('click', '.group-e-check-all', function() {

        if($('.group-e-check-all').is(':checked')){
            $('.group-e input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-e input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-f-check-all', function() {

        if($('.group-f-check-all').is(':checked')){
            $('.group-f input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-f input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-g-check-all', function() {

        if($('.group-g-check-all').is(':checked')){
            $('.group-g input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-g input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-h-check-all', function() {

        if($('.group-h-check-all').is(':checked')){
            $('.group-h input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-h input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-i-check-all', function() {

        if($('.group-i-check-all').is(':checked')){
            $('.group-i input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-i input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-j-check-all', function() {

        if($('.group-j-check-all').is(':checked')){
            $('.group-j input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-j input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-k-check-all', function() {

        if($('.group-k-check-all').is(':checked')){
            $('.group-k input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-k input[type="checkbox"]').prop('checked', false);
        }
    });
      
      $(document).on('click', '.group-l-check-all', function() {

        if($('.group-l-check-all').is(':checked')){
            $('.group-l input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-l input[type="checkbox"]').prop('checked', false);
        }
    });
      $(document).on('click', '.group-m-check-all', function() {

        if($('.group-m-check-all').is(':checked')){
            $('.group-m input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-m input[type="checkbox"]').prop('checked', false);
        }
    });
      $(document).on('click', '.group-n-check-all', function() {

        if($('.group-n-check-all').is(':checked')){
            $('.group-n input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-n input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-o-check-all', function() {

        if($('.group-o-check-all').is(':checked')){
            $('.group-o input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-o input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-p-check-all', function() {

        if($('.group-p-check-all').is(':checked')){
            $('.group-p input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-p input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-q-check-all', function() {

        if($('.group-q-check-all').is(':checked')){
            $('.group-q input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-q input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-r-check-all', function() {

        if($('.group-r-check-all').is(':checked')){
            $('.group-r input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-r input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-s-check-all', function() {

        if($('.group-s-check-all').is(':checked')){
            $('.group-s input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-s input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-t-check-all', function() {

        if($('.group-t-check-all').is(':checked')){
            $('.group-t input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-t input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-u-check-all', function() {

        if($('.group-u-check-all').is(':checked')){
            $('.group-u input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-u input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-v-check-all', function() {

        if($('.group-v-check-all').is(':checked')){
            $('.group-v input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-v input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-w-check-all', function() {

        if($('.group-w-check-all').is(':checked')){
            $('.group-w input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-w input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-x-check-all', function() {

        if($('.group-x-check-all').is(':checked')){
            $('.group-x input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-x input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-y-check-all', function() {

        if($('.group-y-check-all').is(':checked')){
            $('.group-y input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-y input[type="checkbox"]').prop('checked', false);
        }
    });

      $(document).on('click', '.group-z-check-all', function() {

        if($('.group-z-check-all').is(':checked')){
            $('.group-z input[type="checkbox"]').prop('checked', true);
        }
        else{
            $('.group-z input[type="checkbox"]').prop('checked', false);
        }
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