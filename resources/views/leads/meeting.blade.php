@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection

@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
 Meeting Information
@endsection

@section('edit-modal-header')
Meeting Information
@endsection

@section('delete-modal-header')
Delete This City
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

@section('extra-modal-header')
Add to Sale
@endsection

@section('extra-model-body')
<div class="modal-body">
    <form id="ExtraForm" style = "margin:13px;" class="form-horizontal" role="form">
        @csrf    

         <input type="hidden" tabindex="1" id="schedule_id" name ="schedule_id" class="form-control">
         <input type="hidden" tabindex="1" id="client_id" name ="client_id" class="form-control">
         <input type="hidden" tabindex="1" id="user_id" name ="user_id" class="form-control">
         <input type="hidden" tabindex="1" id="meeting_id" name ="meeting_id" class="form-control">
         <input type="hidden" tabindex="1" id="project_id" name ="project_id" class="form-control">

         <div class="form-group">
                <label for="subject" class="">Client Name:</label>
                <input type="text" name="already"  tabindex="1" id="add_client_name"  class="form-control" disabled>
                <span style="background-color: #fff;color: #ff0808;" class="help-block"></span>
            </div>

            <div class="form-group">
               <label for="subject" class="">Project:</label>
                <input type="text" tabindex="1" id="add_project_name"  class="form-control" disabled>
            </div>

          <div class="form-group">
                <label>
                Project Slab:</label>
                    <select class="form-control" name = "project_slab_id" id = "project_slab_id">
                    </select>
                    <span style="color:#fff;" class="help-block"></span>
            </div>

        <div class="form-group">
            <label for="subject" class="">Price:</label>
            <input type="text" tabindex="1" id="price"  name ="price" class="form-control">
            <span style="color:#fff;" class="help-block"></span>
        </div>

    </form>
</div>
@endsection

@section('extra-modal-header')
Add to FollowUp
@endsection

@section('extra-model-body')
<div class="modal-body">
    <form id="ExtraForm" class="form-horizontal" role="form">
        @csrf    
        <input type="hidden" class="form-control" name="client_id" id="client_id">  
        <input type="hidden" class="form-control" name="user_id" id="user_id" value="7">  
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
                <input type="hidden" name="followup_time" id="edit_dob" value="" /><br/>
                <span class="help-block"></span>
            </div>
        </div>
    </form>
</div>
@endsection

@section('main-content')
    {{-- mail confirmations modal--}}
     <div id="mailModal" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>

                            <div class="modal-body">
                            <div class="deleteContent">
                                Are you Sure to send this mail <span class="dname"></span> ? 
                                <form id="mail_form" class="form-horizontal" role="form">
                                    @csrf
                                    <input type="hidden" id="mail_meeting_id" name="id" value="">

                                </form>
                            </div>
                        </div>
                           
                            <div class="modal-footer">
                                <button type="button" id="mailConfirm"  class="btn btn-primary" >
                                    <span id="footer_action_button">Yes</span>
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
    {{-- end --}}
    {{-- Start data table --}}
    <table id="meetingDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>
    {{-- End data table --}}

    <script src="{{asset('assets')}}/scripts/meeting.js"></script>
@endsection
