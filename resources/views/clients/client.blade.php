@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection


@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
    Client Information
@endsection

@section('edit-modal-header')
Update Client Information
@endsection
@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id">
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Company:</label>
                <span class="help-block"></span>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="company" id="company">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Phone:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="phone" id="phone">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Email:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="email" id="email">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('delete-modal-header')
Remove Client Information
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
Insert Client Information
@endsection
@section('add-model-body')
    <div class="modal-body">
        <form id="addForm" class="form-horizontal" role="form">
            @csrf
              <div class="form-group">
                <label class="control-label col-sm-3" for="name">Client Name:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="name" id="name" placeholder="enter client's name">
                    <span class="help-block"></span>
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-sm-3" for="name">Company:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="company" id="company" placeholder="enter client's company name">
                    <span class="help-block"></span>
                </div>

            </div>
             <div class="form-group">
                <label class="control-label col-sm-3" for="name">Phone:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="phone" id="phone" placeholder="enter client's contact number">
                    <span class="help-block"></span>
                </div>
                <div class="help-block with-errors"></div>
            </div>
             <div class="form-group">
                <label class="control-label col-sm-3" for="name">Email:</label>
                <div class="col-sm-9">
                    <input type="name" class="form-control" name="email" id="email" placeholder="enter client's email address">
                    <span class="help-block"></span>
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </form>
    </div>
@endsection

@section('extra-modal-header')
    Add to call history
@endsection

@section('extra-model-body')
<div class="modal-body">
    <form id="ExtraForm" class="form-horizontal" role="form">
        @csrf 
        <input type="hidden" class="form-control" id="id" name="id">   
        <input type="hidden" class="form-control" name="client_id" id="client_id">  
        <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" id="user_id">  
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Client Name:</label>
            <div class="col-sm-9">
                <label style="font-size: 20px; color:#fff;" class="control-label col-sm-12" id = "client_name"></label>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Phone:</label>
            <div class="col-sm-9">
            <label style="font-size: 30px; color:#fff;" class="control-label col-sm-3" id = "client_phone"></label>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >Project Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "project_id" id = "add_project">

                </select>
             <span class="help-block" style="color:white"></span>
            </div>     
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="status">Call Status:</label>
            <div class="col-sm-9">
                <select autocomplete="0" class="form-control" name="status">
                    <option value="" disabled selected> Select status</option>
                    <option value='1'>Interested</option>
                    <option value='0'>Not Interested</option>
                    <option value='2'>Intermediate</option>
                </select> 
                <span class="help-block"  style="color:white"></span>
            </div>
        </div>
    </form>
</div>
@endsection


@section('main-content')
    {{-- Start data table --}}
    <table id="clientDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>

    {{-- End data table --}}
    <script src="{{asset('assets')}}/scripts/client.js"></script>

@endsection
