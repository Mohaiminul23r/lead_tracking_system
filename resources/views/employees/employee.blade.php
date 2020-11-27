@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection

@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
    Employee Informations
@endsection

@section('edit-modal-header')
    Update Employee Information
@endsection

@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="edit_user_id" name="user_id" value="">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="edit_name">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Date of Birth:</label>
                <div class="col-sm-10">
                    <div class="input-group date form_date ccol-sm-10" data-date="" data-date-format="dd MM yyyy" data-link-field="edit_dob" data-link-format="yyyy-mm-dd">
                        <input class="form-control" id="edit_show_dob" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" name="dob" id="edit_dob" value="" /><br/>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Gender:</label>
                <div class="col-sm-10">
                    <div class="col-sm-3">
                        <label><input type="radio" name="gender" id="male" value="Male"> Male</label>
                    </div>
                    <div class="col-sm-3">
                        <label><input type="radio" value="Female" id="female" name="gender"> Female</label>
                    </div>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Email:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="email" id="edit_email">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Phone:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="phone" id="edit_phone">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div  class="col-md-7">
                        <label class="control-label col-sm-4" for="name" >
                        Company:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name = "company_id" id = "edit_company">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div style="padding-left:0px" class="col-md-5">
                        <label class="control-label col-sm-3" for="name" >
                        Office:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "office_id" id = "edit_office">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div  class="col-md-7">
                        <label class="control-label col-sm-4" for="name" >
                        Department:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name = "department_id" id = "edit_department">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div style="padding-left:0px" class="col-md-5">
                        <label class="control-label col-sm-3" for="name" >
                        Designation:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name = "designation_id" id = "edit_designation">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-sm-2" for="name" >
                Employee Type:</label>
                <div class="col-sm-10">
                    <select class="form-control" name = "employee_type_id" id = "edit_employee_type">

                    </select>
                    <span class="help-block"></span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Salary:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="salary" id="edit_salary">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('delete-modal-header')
    Delete Employee
@endsection

@section('delete-model-body')
    <div class="modal-body">
        <div class="deleteContent">
            Are you Sure you want to delete <span class="dname"></span> ? 
            <form id="delete_form" class="form-horizontal" role="form">
                @csrf
                <input type="hidden" id="id" name="id" value="">

            </form>
        </div>
    </div>
@endsection

@section('add-modal-header')

    Insert New Employee
@endsection

@section('add-model-body')
    <div class="modal-body">

        <form id="addForm" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                    <span class="help-block"></span>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Date of Birth:</label>
                <div class="col-sm-10">
                    <div class="input-group date form_date ccol-sm-10" data-date="" data-date-format="dd MM yyyy" data-link-field="add_dob" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                     <input type="hidden" name="dob" id="add_dob" value="" /><br/>
                     <span class="help-block"></span>
                </div>
               
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Gender:</label>
                
                <div class="col-sm-10">
                    <div class="col-sm-3">
                        <label><input type="radio" name="gender" value="Male" checked> Male</label>
                    </div>
                    <div class="col-sm-3">
                        <label><input type="radio" value="Female" name="gender"> Female</label>
                    </div>
                    <span class="help-block"></span>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Email:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="email" id="email" placeholder="Enter email address">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Phone:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="phone" id="phone" placeholder="Enter contact number">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div  class="col-md-7">
                        <label class="control-label col-sm-4" for="name" >
                        Company:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name = "company_id" id = "add_company">

                            </select>
                             <span class="help-block"></span>
                        </div>         
                    </div>

                    <div style="padding-left:0px" class="col-md-5">
                        <label class="control-label col-sm-3" for="name" >
                        Office:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "office_id" id = "add_office">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div  class="col-md-7">
                        <label class="control-label col-sm-4" for="name" >
                        Department:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name = "department_id" id = "add_department">

                            </select>
                            <span class="help-block"></span>
                        </div>  
                    </div>

                    <div style="padding-left:0px" class="col-md-5">
                        <label class="control-label col-sm-3" for="name" >
                        Designation:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name = "designation_id" id = "add_designation">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-sm-2" for="name" >
                Employee Type:</label>
                <div class="col-sm-10">
                    <select class="form-control" name = "employee_type_id" id = "add_employee_type">

                    </select>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Salary:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="salary" id="salary" placeholder="Enter Employee salary">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('view-model-body')
    <div class="modal-body">
        <div class="row">

            <div class=" col-md-5 col-lg-5 "> 
                <table class="table table-user-information">
                    <tbody id="profile" >
                        <tr>
                            <td>Employee ID : </td>
                            <td><span id="view_id"></span></td>
                        </tr>
                        <tr>
                            <td>Name : </td>
                            <td><span id="view_name"></span></td>
                        </tr>
                         <tr>
                            <td>Email:</td>
                            <td id="view_email"></td>
                        </tr>
                        <tr>
                            <td>Join Date:</td>
                            <td id="view_join_date"></td>
                        </tr>
                        <tr>
                            <td>Company:</td>
                            <td id="view_company"></td>
                        </tr>
                        <tr>
                            <td>Office:</td>
                            <td id="view_office"></td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td id="view_department"></td>
                        </tr>
                        <tr>
                            <td>Employee Type:</td>
                            <td id="view_employee_type"></td>
                        </tr>
                        <tr>
                            <td>Designation:</td>
                            <td id="view_designation"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class=" col-md-5 col-lg-5 "> 
                <table class="table table-user-information">
                    <tbody id="profile" >
                        

                        <tr>
                            <td>Gender:</td>
                            <td id="view_gender"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td id="view_phone"></td>
                        </tr>
                        <tr>
                            <td>Date of Birth:</td>
                            <td id="view_dob"></td>
                        </tr>
                        <tr>
                            <td>Country:</td>
                            <td id="view_country"></td>
                        </tr>
                         <tr>
                            <td>City:</td>
                            <td id="view_city"></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td id="view_address"></td>
                        </tr>
                         <tr>
                            <td>Postal Code:</td>
                            <td id="view_postal_code"></td>
                        </tr>
                       
                        <tr>
                            <td>Salary:</td>
                            <td id="view_salary"></td>
                        </tr>
                        <tr>
                            <td>Activity Status:</td>
                            <td id="view_status"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <span class="edit_extra_modal hidden btn btn-sm btn-info" data-id = '' ></span>
    </div>
@endsection

@section('extra-model-body')
 <div class="modal-body">
        <form id="ExtraForm" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" name="id" id="user_id" >
            <input type="hidden" class="form-control" name="address_id" id="employee_address_id" >
            <input type="hidden" class="form-control" name="employee_information_id" id="employee_information_id" >
            <div class="form-group">
                <label class="control-label col-sm-2" for="country" >
                Country:</label>
                <div class="col-sm-10">
                    <select class="form-control" name = "country_id" id = "employee_country">

                    </select>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="city" >
                City</label>
                <div class="col-sm-10">
                    <select class="form-control" name = "city_id" id = "employee_city">

                    </select>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Address:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="address1" id="address1" >
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="postal_code">Postal Code:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="postal_code" id="postal_code" >
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('main-content')

    <!-- Central Modal Small -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-lg" role="document">


      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Set Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="RoleForm" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" name="id" id="user_role_id" >
             <div class="form-group">
                <label style="font-size: 20px" class="control-label col-sm-12" id = "user_role_name" for="name"></label>
            </div>
             <div class="form-group">
                <label style="font-size: 20px" class="control-label col-sm-12" id = "user_designation" ></label>
            </div>
                    <fieldset style="border: 1px solid; padding:5px;">
                        <legend>Add Roles:</legend>
                        <div class="clearfix group-all">
                        <label style="font-size:20px; background-color: #000; color:#fff; margin-left:354px" ><input class="group-all-check-all" type="checkbox">Check All</label>
                        <table id="rolesTable" width="100%">
                        </table>
                    </div>
                    </fieldset>
        </form>
          
        </div>
        <div class="modal-footer">
            <button type="button" id="BtnRole" class="btn btn-primary btn-sm">Save</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Central Modal Small -->

    {{-- Start data table --}}
    <table id="employeeDataTable" class="table table-striped table-bordered" style="width:100%">
        
    </table>
    {{-- End data table --}}
    <script src="{{asset('assets')}}/scripts/employee.js"></script>
@endsection
