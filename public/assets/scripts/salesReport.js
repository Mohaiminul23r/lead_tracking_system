
$(document).ready(function(){

 $('#fetch_user_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:utlt.siteUrl('autocomplete/fetchUser'),
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#fetch_userList').fadeIn();  
            $('#fetch_userList').html(data);
            $('#fetech_user_id').val('');
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#fetch_user_name').val($(this).text());
        $('#fetech_user_id').val($(this).data('id'));  
        $('#fetch_userList').fadeOut();  
    }); 

    

});
