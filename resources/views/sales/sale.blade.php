@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection

@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
 sales list
@endsection

@section('edit-modal-header')
Meeting Information
@endsection
@section('edit-model-body')
    <div class="modal-body">
        <p id="editUrl" hidden>Cities</p>
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id">
                <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Country Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "country_id" id = "country_name">
                       
                  </select>
                  <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                 City Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter city name">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
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
                <input type="text"  tabindex="1" id="add_client_name"  class="form-control" disabled>
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
                    <span class="help-block"></span>
            </div>

        <div class="form-group">
            <label for="subject" class="">Price:</label>
            <input type="text" tabindex="1" id="price"  name ="price" class="form-control">
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
    <table id="saleDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>
    {{-- End data table --}}

    <script src="{{asset('assets')}}/scripts/sale.js"></script>
@endsection
