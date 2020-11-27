@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection

@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
 Project Information
@endsection

@section('edit-modal-header')
Update Project Information
@endsection
@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf
              <input type="hidden" class="form-control" id="id" name="id">
                <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Category Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "project_category_id" id = "edit_category_name">
                       
                  </select>
                  <span class="help-block"></span>
              </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 Project Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter city name">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label  class="control-label col-sm-3" for="details">Project Details:</label>
              <div class="col-sm-9">
                  <textarea class="form-control" rows="5" id="details" name="details"></textarea>
                  <span class="help-block"></span>    
              </div>
            </div>
            <div class="form-group">
                <label  class="control-label col-sm-3" for="status">Project Status:</label>
                    <label  class="col-sm-9">
                        <select class="form-control" name="status">
                        <option value='1'>Active</option>
                        <option value='0'>Inactive</option>
                        </select>
                        <span class="help-block"></span>
                    </label>
            </div>
        </form>
    </div>
@endsection

@section('delete-modal-header')
Delete This Project
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
Insert Project Information
@endsection
@section('add-model-body')
    <div class="modal-body">
        <p id="addUrl" hidden>Cities</p>
        <form id="addForm" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Category Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "project_category_id" id = "add_category_name">
                       
                  </select>
                  <span class="help-block"></span>
              </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 Project Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter project name">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label  class="control-label col-sm-3" for="details">Project Details:</label>
              <div class="col-sm-9">
                  <textarea class="form-control" rows="5" id="details" name="details" placeholder="Write the details of the project"></textarea>
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
    <table id="projectDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>
    {{-- End data table --}}

    <script src="{{asset('assets')}}/scripts/project.js"></script>
@endsection
