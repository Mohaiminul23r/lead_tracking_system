
$(document).ready(function(){

 $('#project_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:utlt.siteUrl('autocomplete/fetchProject'),
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#projectList').fadeIn();  
            $('#projectList').html(data);
            $('#uproject_id').val('');
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#project_name').val($(this).text());
        $('#project_id').val($(this).data('id'));  
        $('#projectList').fadeOut();  
    }); 

    

});
