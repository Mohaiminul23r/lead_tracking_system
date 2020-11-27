@extends('layouts.master')

@section('title')
    Lead Tracking System
@endsection

@section('content-hedding')
    <b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
 City
@endsection

@section('edit-modal-header')
Update City Information
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
@section('add-modal-header')
Add City Information
@endsection
@section('add-model-body')
    <div class="modal-body">
        <p id="addUrl" hidden>Cities</p>
        <form id="addForm" class="form-horizontal" role="form">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-3" for="name" >
                Country Name:</label>
                <div class="col-sm-9">
                    <select class="form-control" name = "country_id" id = "add_country_name">
                       
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
@section('main-content')
    {{-- Start data table --}}
    <table id="cityDataTable" class="table table-striped table-bordered" style="width:100%">
    </table>
    {{-- End data table --}}

    <script src="{{asset('assets')}}/scripts/city.js"></script>
@endsection
