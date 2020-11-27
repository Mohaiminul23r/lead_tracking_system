@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection


@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
    Permission Information
@endsection

@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" name="id" id="edit_id">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Permission Name:</label>
                <div class="col-sm-10">
                    <input type="name" disabled class="form-control" name="name" id="edit_name">
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

@section('main-content')

    {{-- Start data table --}}
    <table id="permissionDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>

    {{-- End data table --}}
    <script src="{{asset('assets')}}/scripts/permission.js"></script>

@endsection
