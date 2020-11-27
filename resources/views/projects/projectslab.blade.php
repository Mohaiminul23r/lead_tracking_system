@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection


@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
 Project Slab Information
@endsection

@section('edit-modal-header')
Update Projectslab Information
@endsection
@section('edit-model-body')
    <div class="modal-body">
        <p id="editUrl" hidden>Projectslabs</p>
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" id="id" name="id">

            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Project Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "project_id" id = "edit_project_name">
                       
                  </select>
                  <span class="help-block"></span>
              </div>

            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="slab name" >
                 Slab Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="edit_name">
                    <span class="help-block"></span>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="employee" >
                 No. of Employees:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="employee" id="edit_employee_no">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="price" >
                 Price:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="price" id="edit_price">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="support_cost" >
                 Supporting Cost:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="support_cost" id="edit_support_cost">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                 <label class="control-label col-sm-3" for="status">Status:</label>
                   <div class="col-sm-9">
                        <select class="form-control" id="status" name="status">
                        <option value='1'>Active</option>
                        <option value='0'>Inactive</option>
                        </select> 
                        <span class="help-block"></span>
                    </div>
            </div>
        </form>
    </div>
@endsection

@section('delete-modal-header')
Delete This projectslab
@endsection

@section('delete-model-body')
    <div class="modal-body">
        <div class="deleteContent">
            <p id="deleteUrl" hidden>offices</p>
            Are you Sure you want to delete <span class="dname"></span> ? 
            <form id="delete_form" class="form-horizontal" role="form">
                @csrf
                <input type="hidden" id="id" name="id" value="">

            </form>
        </div>
    </div>
@endsection
@section('add-modal-header')
Insert projectslab Information
@endsection
@section('add-model-body')
    <div class="modal-body">
        <form id="addForm" class="form-horizontal" role="form">
            @csrf

            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Project Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "project_id" id = "add_project_name">
                       
                  </select>
                  <span class="help-block"></span>
              </div>

            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="slab name" >
                 Slab Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter project slab name">
                    <span class="help-block"></span>
                </div>
            </div>

             

            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 No. of Employees:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="employee" id="employee" placeholder="Enter employee number in integer">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 Price:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="price" id="price" placeholder="Enter Price in integer">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 Supporting Cost:</label>
                <div class="col-sm-9">
                    <input type="cost" class="form-control" name="support_cost" id="support_cost" placeholder="Enter support cost per year in integer">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('view-modal-header')

@endsection
@section('view-model-body')
    <div class="modal-body">
        <div class="row">
            <div class = "col-md-6" >
                <h4 id = "city_name"></h4>
            </div>
            <div class = "col-md-6" >
                <h4 id = "coun_name"></h4>
            </div>
        </div>
    </div>
@endsection
@section('main-content')
    {{-- Start data table --}}
    <table id="projectslabDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>
    {{-- End data table --}}

    <script src="{{asset('assets')}}/scripts/projectslab.js"></script>
@endsection
