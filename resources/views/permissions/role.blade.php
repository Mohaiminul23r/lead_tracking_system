@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection


@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
    Roles
@endsection

@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" disabled>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Role Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="edit_name">
                    <span class="help-block"></span>
                </div>

            </div>
             <div class="form-group">
                <label class="control-label col-sm-2" >Description:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="description" id="edit_description">
                    <span class="help-block"></span>
                </div>

            </div>
        </form>
    </div>
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

@section('add-model-body')
    <div class="modal-body">
        <form id="addForm" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Role Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="name" placeholder="enter role name">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Description:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="description" id="description" placeholder="enter description">
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
          <h4 class="modal-title w-100" id="myModalLabel">Set Permission</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="RoleForm" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" name="id" id="role_id" >
             <div class="form-group">
                <label style="font-size: 20px;" class="control-label col-sm-12" id = "role_name" for="name"></label>
            </div>
             <div class="form-group">
                <label style="font-size: 20px;" class="control-label col-sm-12" id = "role_description" ></label>
            </div>
                    <fieldset style="border: 1px solid; padding:5px;">
                        <legend>Add Permission to Role:</legend>
                        <div class="clearfix group-all">
                        <label style="font-size:20px; background-color: #000; color:#fff; margin-left:354px" ><input class="group-all-check-all" type="checkbox">Check All</label>
                        <table id="permissionTable" width="100%">
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
    <table id="roleDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>

    {{-- End data table --}}
    <script src="{{asset('assets')}}/scripts/role.js"></script>

@endsection
