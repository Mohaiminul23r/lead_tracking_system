@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection


@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
    Department Information
@endsection

@section('edit-modal-header')
Update Department
@endsection

@section('edit-model-body')
    <div class="modal-body">
        <form id="edit_form" class="form-horizontal" role="form">
            @csrf

            <input type="hidden" class="form-control" id="id" name="id">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="name">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('delete-modal-header')
>Remove Department
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
Insert a New Department
@endsection
@section('add-model-body')
    <div class="modal-body">
        <form id="addForm" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="name" id="name" placeholder="enter department name">
                    <span class="help-block"></span>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('main-content')
    {{-- Start data table --}}
    <table id="departmentDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>

    {{-- End data table --}}
    <script src="{{asset('assets')}}/scripts/department.js"></script>

@endsection

