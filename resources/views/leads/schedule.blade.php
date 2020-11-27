@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Schedule Information
@endsection

@section('edit-modal-header')
Update Schedule Information
@endsection

@section('edit-model-body')
<div class="modal-body">
    <form id="edit_form" class="form-horizontal" role="form">
        @csrf

        <input type="hidden" class="form-control" name="id" id="edit_id">
        <input type="hidden" class="form-control" name="client_id" id="edit_client_id">
        <input type="hidden" class="form-control" name="call_history_id" id="call_history_id">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Client Name:</label>
            <div class="col-sm-9">
                <input type="name" class="form-control" id="edit_name" disabled>
                <span class="help-block"></span>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Project Name:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_project_name" disabled>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Assign Employee:</label>
            <div class="col-sm-9">
                @if(Auth::check() && Auth::user()->hasRole('marketing'))
                <select class="form-control" disabled name = "employee_id" id = "edit_employee">

                </select>

                @else
                <select class="form-control" name = "employee_id" id = "edit_employee">

                </select>
                @endif
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="schedule_time" class="col-sm-3 control-label">Date & Time</label>
            <div class="col-md-9">
                <div style="padding:0 16px 0 13px;" class="input-group date form_datetime col-sm-12" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edit_schedule_time">
                    <input class="form-control" size="13" id="schedule_time" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" name="schedule_time" id="edit_schedule_time" value="" /><br/>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="status">Status:</label>
            <div class="col-sm-9">
                <select class="form-control" id="status" name="status">
                    <option value="" disabled selected> Select status</option>
                    <option value='0'>Pending</option>
                    <option value='1'>Approved</option>
                    <option value='2'>Cancel</option>
                </select> 
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
                            <select class="form-control" name = "country_id" id = "edit_country">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div style="padding-left:0px" class="col-md-5">
                        <label class="control-label col-sm-2" for="name">City:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name = "city_id" id = "edit_city">

                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address1" id="edit_address1">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">postal Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="postal_code" id="edit_postal_code">
                    <span class="help-block"></span>
                </div>
            </div>

        </fieldset>

    </form>
</div>
@endsection

@section('delete-modal-header')
Remove the Schedule
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



@section('main-content')

 @if(!(Auth::check() && Auth::user()->hasRole('marketing')))
<div id="modalExtra2" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div style = "background-color: #23504c; color: #fff46a;"  class="modal-content">
            <div style = "background-color:#1c2927" class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="edit_extra_title" class="modal-title">Add to Meeting</h4>
            </div>

            <div class="modal-body">
                <form id="ExtraForm" style = "margin:13px;" class="form-horizontal" role="form">
                    @csrf    

                    <input type="hidden" tabindex="1" id="schedule_id" name ="schedule_id" class="form-control">
                    <input type="hidden" tabindex="1" id="client_id" name ="client_id" class="form-control">
                    <input type="hidden" tabindex="1" id="m_user_id" name ="user_id" class="form-control">
                    <div class="form-group">
                        <label for="to" class="">Source:</label>
                        <input type="text" tabindex="1" id="source" name ="source" class="form-control">
                        <span style="color:#fff;" class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="">Destination:</label>
                        <input type="text" tabindex="1" id="destination"  name ="destination" class="form-control">
                        <span style="color:#fff;" class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="">Cost:</label>
                        <input type="text" tabindex="1" id="cost"  name ="cost" class="form-control">
                        <span style="color:#fff;" class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="meeting_time" class="control-label">Meeting Time</label>
                        <div class="input-group date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="meeting_time">
                            <input class="form-control" size="16" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" name="meeting_time" id="meeting_time" value="" />
                        <span style="color:#fff;" class="help-block"></span>

                    </div>

                    <div class="form-group">
                        <label class="control-label" for="status">Status:</label>
                        <div class="">
                            <select class="form-control" id="edit_status" name="status">
                                <option value='' disabled selected>Select Status</option>
                                <option value='1'>Positive</option>
                                <option value='2'>Pending</option>
                                <option value='3'>Rejected</option>
                                <option value='4'>Done</option>
                            </select> 
                            <span style="color:#fff;" class="help-block"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="subject" class="">Attatchment:</label>
                        <input type="file"  name ="file" class="default">
                        <span style="color:#fff;" class="help-block"></span>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="editExtratBtn2"  class="btn btn-success" >
                    <span id="extraBtnName" id="footer_action_button" class='glyphicon glyphicon-check'> Update</span>
                </button>

                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </div>

    </div>
</div>
@endif


{{-- Start data table --}}
<table id="scheduleDataTable" class="table table-striped table-bordered" style="width:100%">
</table>
<script src="{{asset('assets')}}/scripts/schedule.js"></script>
@endsection

