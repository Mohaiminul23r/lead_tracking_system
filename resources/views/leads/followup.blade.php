@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Follow Up lists
@endsection

@section('edit-modal-header')
Update follow up
@endsection
@section('edit-model-body')
<div class="modal-body">
    <form id="edit_form" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Clint Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "client_id" id = "edit_client">

                </select>
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
Remove Follow up history
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

@section('main-content')

{{-- modal for add Schedule --}}
<div class="modal fade" id="ModalSchedule" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Schedule</h4>
            </div>
            <div class="modal-body">

                <form id="sdForm" class="form-horizontal" role="form">
                    @csrf

                    <input type="hidden" class="form-control" id="call_history_id" name="call_history_id">
                    <div class="form-group">
                        <label for="schedule_time" class="col-md-2 control-label">Date & Time</label>
                        <div class="col-sm-9">
                            <div class="input-group date form_datetime col-md-12" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="schedule_time">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                             <input type="hidden" name="schedule_time" id="schedule_time" value="" /><br/>
                            <span class="help-block"></span>
                        </div>
                    </div>


                    <fieldset style="border: 1px solid; padding:5px;">
                        <legend>Address:</legend>

                        <div class="form-group">
                            <div class="row">
                                <div style="" class="col-md-7">
                                    <label style="margin-right:0px;" class="control-label col-sm-4" for="name">Country:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name = "country_id" id = "add_country">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div style="padding-left:0px" class="col-md-5">
                                    <label class="control-label col-sm-2" for="name">City:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name = "city_id" id = "add_city">

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address1" id="add_address1">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">postal Code:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="postal_code" id="add_postal_code">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="SdBtn" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
{{-- Start data table --}}
<table id="followupDataTable" class="table table-striped table-bordered" style="width:100%">
</table>

{{-- End data table --}}
<script src="{{asset('assets')}}/scripts/followup.js"></script>

@endsection
