<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom styles for this template -->

    <link href="{{asset('assets')}}/css/style-responsive.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

    <script src="{{asset('js')}}/app.js"></script>
    <script type="text/javascript">


        {{-- reset modal form field after close --}} 
        window.addEventListener("load",function(){
            /*disable alert for dataTable*/
            $.fn.dataTable.ext.errMode = 'none';

            $("#modalAdd").on("hidden.bs.modal", function() {
                document.getElementById("addForm").reset();
                $('#addForm .has-error').removeClass('has-error');
                $('#addForm').find('.help-block').empty();
            });

            $("#modalEdit").on("hidden.bs.modal", function() {
                document.getElementById("edit_form").reset();
                $('#modalEdit .has-error').removeClass('has-error');
                $('#modalEdit').find('.help-block').empty();
            });

            $("#modalExtra").on("hidden.bs.modal", function() {
                document.getElementById("ExtraForm").reset();
                $('#ExtraForm .has-error').removeClass('has-error');
                $('#ExtraForm').find('.help-block').empty();
            });

            $("#modalDelete").on("hidden.bs.modal", function() {
                document.getElementById("delete_form").reset();
                $('#delete_form .has-error').removeClass('has-error');
                $('#delete_form').find('.help-block').empty();
            });


            Echo.channel('App.user.11')
                .listen('', (e) => {
                    console.log(e);
            });
        });


        /*****************************************************************/
        /*****************Mark as read notifications*********************/
        /***************************************************************/


        $(document).on('click', '#ReadNotification', function() {
            var id = $(this).data('notif-id');
            $.ajax({
                url : utlt.siteUrl('markAsRead/'+id),
            });

        });



        /**/
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
        });

        /**/


        /*****************************End******************************/



        /*****************************************************************/
        /***********************Necessary Utility************************/
        /***************************************************************/


        var utlt =[];
        utlt["siteUrl"] = function(url){
            url = typeof url == "undefined" ? "" : url;
            return "<?php echo url('/'); ?>/"+url;
        }

        utlt["cLog"] = function(url){
            console.log(url);
        }


        /********************************/
        /*common method for site message*/
        /********************************/
        utlt["showMsg"] = function(type,msg){
            $("#siteMsg").remove(),
            $("#msgHeader").append(
                '<div class="alert alert-'+type+' alert-dismissible"  id="siteMsg" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                msg+
                '</div>'

                );
        }
        /*End common method for site message*/




        /*********************************/
        /*common method for get all value*/
        /*********************************/
        utlt["GetAll"] =  function(url, htmlId, name, check = 0){
            var htmlData = '';
            if(!check)
                htmlData = '<option value="" disabled selected> Select '+name+' </option>';
            else
                htmlData = '<option value="" disabled> Select '+name+' </option>';

            $.ajax({
                url : utlt.siteUrl(url)

            }).done(function(resData){
                $.each(resData,function(ind, val){

                    if(check == val.id){
                        htmlData +=  '<option value = "'+val.id+'" selected >'+val.name+'</option>';
                    }
                    else{
                        htmlData +=  '<option value = "'+val.id+'">'+val.name+'</option>';
                    }
                });
                $(htmlId).html(htmlData);

            }).fail(function(failData){
                utlt.cLog(arguments);
            });
        }
        /*End getAll elements method*/




        /****************************************/
        /*common add method for insert form data*/
        /****************************************/
        utlt['Add'] = function(url, dataTable){

            $('#addForm .has-error').removeClass('has-error');
            $('#addForm').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl(url),
                type : "POST",
                data : $('#addForm').serialize()

            }).done(function(resData){
                $(dataTable).DataTable().ajax.reload();
                if(resData == 'fail')
                    utlt.showMsg('danger',"<strong>NO network connection :( mail send failed</strong>");
                else
                    utlt.showMsg('success',"<strong>Successfuly Added!! :-)</strong>");

                $('#modalAdd').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');


            }).fail(function(failData){

                $.each(failData.responseJSON.errors, function(inputName, errors){

                    $("#addForm [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').empty();

                        $.each(errors, function(indE, valE){
                            $("#addForm [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });

                    }
                    else{
                        $("#addForm [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }

                });

            });
        }
        /*end add method*/



        /****************************************/
        /***common  method for Edit form data****/
        /****************************************/
        utlt['Edit'] = function(url, id, dataTable){

            $('#edit_form .has-error').removeClass('has-error');
            $('#edit_form').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl(url+'/'+id),
                type : "PUT",
                data : $('#edit_form').serialize()

            }).done(function(resData){
                $(dataTable).DataTable().ajax.reload();
                if(resData == 'fail')
                    utlt.showMsg('danger',"<strong>NO network connection :(calander and mail send failed</strong>");
                else
                    utlt.showMsg('info',"<strong>Successfuly Updated!! :-)</strong>");

                $('#modalEdit').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');

            }).fail(function(failData){
                $.each(failData.responseJSON.errors, function(inputName, errors){

                    $("#edit_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#edit_form [name="+inputName+"]").parent().find('.help-block').empty();

                        $.each(errors, function(indE, valE){
                            $("#edit_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });

                    }
                    else{
                        $("#edit_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }

                });
            });
        }
        /*end Edit method*/



        /************************************************/
        /***common  method for Delete a specefic data****/
        /************************************************/
        utlt['Delete'] = function(url, id, dataTable){

            $('#edit_form .has-error').removeClass('has-error');
            $('#edit_form').find('.help-block').empty();

            $.ajax({
                url : utlt.siteUrl(url+'/'+id),
                type : "DELETE",
                data : $('#delete_form').serialize()


            }).done(function(resData){
                $(dataTable).DataTable().ajax.reload();
                utlt.showMsg('danger',"<strong>Successfuly Deleted!! :-)</strong>");

                $('#modalDelete').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');

            }).fail(function(failData){
                utlt.cLog(arguments);

            });
        }
        /*end Delete method*/



        /*****************************************************/
        /*--------------End Necessary Utility----------------*/
        /*****************************************************/

        /*view individual profile*/

        $(document).on('click', '.profile', function() {
            var id = $(this).data('id');
            $.ajax({
                url : utlt.siteUrl('employees/'+id),
                type : "GET"

            }).done(function(resData){
                $('#profile_title').text("Profile of "+resData.user.name);
                $('#profile_name').text(resData.user.name);
                $('#profile_id').text(resData.id);
                $('#profile_join_date').text($.formatDateTime('dd MM yy', new Date(resData.created_at)));
                $('#profile_company').text(resData.company.name);
                $('#profile_office').text(resData.office.name);
                $('#profile_department').text(resData.department.name);
                $('#profile_employee_type').text(resData.employee_type.name);
                $('#profile_designation').text(resData.designation.name);
                $('#profile_email').text(resData.user.email);
                $('#profile_phone').text(resData.phone);
                $('#profile_salary').text(resData.salary);
                if(resData.status){
                    $('#profile_status').text("Active");
                }
                else{
                    $('#view_status').text("Inactive");
                }

                $('#profile_gender').text(resData.gender);
                $('#profile_dob').text(resData.dob);

                if(resData.address){
                    $('#profile_country').text(resData.address.country.name);
                    $('#profile_city').text(resData.address.city.name);
                    $('#profile_address').text(resData.address.address1);
                    $('#profile_postal_code').text(resData.address.postal_code);
                }


            }).fail(function(failData){
                utlt.cLog(arguments);
            });

            $("#modalProfile").modal();
        });
        /*end*/

        /*Start jquery for change password modal*/
        $(document).on('click', '.cng-password', function() {
            $('#cng_user_id').val({{Auth::user()->id}});
            $("#modalCngPassword").modal();
            $('#modalProfile').modal('hide');
            $('.modal-backdrop').removeClass('modal-backdrop fade in');
        });
        /*End jquery for change password modal*/

        /*chamge password request*/
        $(document).on('click', '#change_Password', function() {
            $('#password_form .has-error').removeClass('has-error');
            $('#password_form').find('.help-block').empty();

            var id = $("#cng_user_id").val();
            $.ajax({
                url : utlt.siteUrl('employee/cngPassword/'+id),
                type : "PUT",
                data : $('#password_form').serialize()

            }).done(function(resData){

                $('#password_form').modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
                alert('Successfuly Updated!! :-)');

            }).fail(function(failData){
                $.each(failData.responseJSON.errors, function(inputName, errors){

                    $("#password_form [name="+inputName+"]").parent().removeClass('has-error').addClass('has-error');
                    if(typeof errors == "object"){
                        $("#password_form [name="+inputName+"]").parent().find('.help-block').empty();

                        $.each(errors, function(indE, valE){
                            $("#password_form [name="+inputName+"]").parent().find('.help-block').append(valE+"<br>");
                        });

                    }
                    else{
                        $("#password_form [name="+inputName+"]").parent().find('.help-block').html(valE);
                    }

                });
            });  
        });

        /*end*/

    </script>

</head>

<body>
    <section id="container">

        @include('layouts.inc.header')
        @include('layouts.inc.sidebar')

        <!-- ********************************MAIN CONTENT************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                {{--Start Edit modal --}}
                <div id="modalEdit" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">@yield('edit-modal-header')</h4>
                            </div>

                            @yield('edit-model-body')                          
                            <div class="modal-footer">
                                <button type="button" id="editBtn"  class="btn btn-success" >
                                    <span id="footer_action_button" class='glyphicon glyphicon-check'> Update</span>
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- End edit model --}}

                {{-- Start Delete model --}}
                <div id="modalDelete" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> @yield('delete-modal-header')</h4>
                            </div>

                            @yield('delete-model-body')
                            <div class="modal-footer">
                                <button type="button" id="deleteBtn"  class="btn btn-danger" >
                                    <span id="footer_action_button" class='glyphicon glyphicon-trash'> Delete</span>
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Delete Model --}}

                <!-- Start Add Modal -->

                <div class="modal fade in" id="modalAdd" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">@yield('add-modal-header')</h4>
                            </div>

                            @yield('add-model-body')
                            <div class="modal-footer">
                                <button type="button" id="addBtn"  class="btn btn-primary" >
                                    <span id="footer_action_button" class='glyphicon'> </span>Submit
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- End Add model --}}

                <!-- Start View Modal -->

                <div class="modal fade in" id="modalView" role="dialog">
                    <div style="width:1050px" class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span id = "view_title"></span></h4>
                            </div>

                            @yield('view-model-body')
                            <div class="modal-footer">

                            </div>
                        </div>

                    </div>
                </div>
                {{-- End View model --}}

                {{--Start Extra modal --}}
                <div id="modalExtra" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div style = "background-color: #23504c; color: #fff46a;"  class="modal-content">
                            <div style = "background-color:#1c2927" class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 id="edit_extra_title" class="modal-title">@yield('extra-modal-header')</h4>
                            </div>

                            @yield('extra-model-body')                          
                            <div class="modal-footer">
                                <button type="button" id="editExtratBtn"  class="btn btn-success" >
                                    <span id="extraBtnName" id="footer_action_button" class='glyphicon glyphicon-check'> Update</span>
                                </button>

                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- End Extra model --}}


                {{--common profile modal --}}
                <div class="modal fade in" id="modalProfile" role="dialog">
                    <div style="width:1050px" class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span id = "profile_title"></span></h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">

                                    <div class=" col-md-6 "> 
                                        <table class="table table-user-information">
                                            <tbody id="profile" >
                                                <tr>
                                                    <td>Employee ID : </td>
                                                    <td><span id="profile_id"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Name : </td>
                                                    <td><span id="profile_name"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td id="profile_email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Join Date:</td>
                                                    <td id="profile_join_date"></td>
                                                </tr>
                                                <tr>
                                                    <td>Company:</td>
                                                    <td id="profile_company"></td>
                                                </tr>
                                                <tr>
                                                    <td>Office:</td>
                                                    <td id="profile_office"></td>
                                                </tr>
                                                <tr>
                                                    <td>Department:</td>
                                                    <td id="profile_department"></td>
                                                </tr>
                                                <tr>
                                                    <td>Employee Type:</td>
                                                    <td id="profile_employee_type"></td>
                                                </tr>
                                                <tr>
                                                    <td>Designation:</td>
                                                    <td id="profile_designation"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class=" col-md-6 "> 
                                        <table class="table table-user-information">
                                            <tbody id="profile" >


                                                <tr>
                                                    <td>Gender:</td>
                                                    <td id="profile_gender"></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone:</td>
                                                    <td id="profile_phone"></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth:</td>
                                                    <td id="profile_dob"></td>
                                                </tr>
                                                <tr>
                                                    <td>Country:</td>
                                                    <td id="profile_country"></td>
                                                </tr>
                                                <tr>
                                                    <td>City:</td>
                                                    <td id="profile_city"></td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td id="profile_address"></td>
                                                </tr>
                                                <tr>
                                                    <td>Postal Code:</td>
                                                    <td id="profile_postal_code"></td>
                                                </tr>

                                                <tr>
                                                    <td>Salary:</td>
                                                    <td id="profile_salary"></td>
                                                </tr>
                                                <tr>
                                                    <td>Activity Status:</td>
                                                    <td id="profile_status"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <span class="cng-password btn btn-sm btn-info" data-id = '' >Change Password</span>
                            </div>

                            <div class="modal-footer">

                            </div>
                        </div>

                    </div>
                </div>
                {{-- End profile --}}

                {{-- change password modal --}}


                <div class="modal fade in" id="modalCngPassword" role="dialog">
                    <div style="width:600px" class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span id = "password_titile">Change password</span></h4>
                            </div>

                            <div class="modal-body">
                                <form id="password_form" class="form-horizontal" role="form">
                                    @csrf

                                    <input type="hidden" id="cng_user_id" name="user_id" value="">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">Old Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="old_password" id="old_password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">New Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password" id="new_password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">Confirm Password:</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="change_Password"  class="btn btn-success" >
                                    <span id="" id="footer_action_button" class='glyphicon glyphicon-check'> Chnage</span>
                                </button>

                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                {{--End  change password modal --}}




                <h3><i class="fa fa-angle-right"></i>@yield('page-title')</h3>
                <div id="msgHeader"></div>



                <!-- Trigger the modal with a button -->



                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">

                        @yield('main-content')
                    </div>
                    <!-- page end-->        
                </div>
                <!-- /row -->
            </section>
            <!-- /wrapper -->
        </section>
        <!--main content end-->

        <!--footer start-->
        @include('layouts.inc.footer')
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{asset('assets')}}/lib/bootstrap/js/bootstrap.min.js"></script>

    {{-- offline datatable --}}
    <link href="{{asset('assets')}}/lib/datatable/datatables.css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('assets')}}/lib/datatable/datatables.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/lib/datetimeFormat/jquery.formatDateTime.js"></script>

    {{-- end --}}


    {{-- online data table CDN --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/sl-1.2.6/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/sl-1.2.6/datatables.min.js"></script>
    {{-- end --}}



</body>
</html>
