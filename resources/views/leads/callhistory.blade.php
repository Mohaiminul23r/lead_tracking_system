@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Call History of Clients
@endsection

@section('edit-modal-header')
Update the Call History
@endsection
@section('edit-model-body')
<div class="modal-body">
    <form id="edit_form" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id">
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Client Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name">
                    <span class="help-block"></span>
                </div>
            </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Project Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "project_id" id = "edit_project">

                </select>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Employee Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "employee_id" id = "edit_employee">

                </select>
                <span class="help-block"></span>
            </div>
        </div>
    </form>
</div>
@endsection
@section('delete-modal-header')
Remove this Call History
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
Insert New Call History
@endsection

@section('extra-modal-header')
Add to FollowUp
@endsection

@section('extra-model-body')
<div class="modal-body">
    <form id="ExtraForm" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id">       
        <input type="hidden" class="form-control" name="client_id" id="client_id">  
        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">  
        <input type="hidden" class="form-control" name="id" id="callhistory_id">  

        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Client Name:</label>
            <div class="col-sm-9">
                <label style="font-size: 20px; color:#fff;" class="control-label col-sm-12" id = "client_name"></label>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Project Name:</label>
            <div class="col-sm-9">
                <label style="font-size: 20px; color:#fff;" class="control-label col-sm-12" id = "project_name"></label>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Follow Up date:</label>
            <div class="col-sm-9">
                <div style="padding:0 16px 0 13px;" class="input-group date form_date ccol-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="edit_dob" data-link-format="yyyy-mm-dd">
                    <input class="form-control" id="edit_show_dob" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <span class="help-block" style="color:white"></span>
                <input type="hidden" name="followup_time" id="edit_dob" value="" /><br/>
            </div>
        </div>
    </form>
</div>
@endsection

@section('main-content')
{{-- Start data table --}}
<table id="callhistoryDataTable" class="table table-striped table-bordered" style="width:100%">
</table>

{{-- End data table --}}
<script src="{{asset('assets')}}/scripts/callhistory.js"></script>

@endsection
