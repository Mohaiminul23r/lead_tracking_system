@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Address
@endsection

@section('edit-modal-header')
    Edit Address Information
@endsection

@section('edit-model-body')
<div class="modal-body">
    <form id="edit_form" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            Country Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "country_id" id = "edit_country_name">

                </select>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            City Name:</label>
            <div class="col-sm-9">
                <select class="form-control" name = "city_id" id = "edit_city_name">

                </select>
                <span class="help-block"></span>  
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            Address:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address1" id="address1" >
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            Postal code:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="postal_code" id="postal_code">
                <span class="help-block"></span>
            </div>
        </div>
    </form>
</div>
@endsection

@section('delete-modal-header')
    Delete address
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
    Insert new Address
@endsection

@section('add-model-body')
<div class="modal-body">
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
                <select class="form-control" name = "city_id" id = "add_city_name">

                </select>
                <span class="help-block"></span>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            Address:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address1" id="address1" placeholder="road :10, sector:10, uttara">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="name" >
            Postal code:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="1230">
                <span class="help-block"></span>
            </div>
        </div>
    </form>
</div>
@endsection

@section('main-content')
{{-- Start data table --}}
<table id="addressDataTable" class="table table-striped table-bordered" style="width:100%">
</table>
{{-- End data table --}}
<script src="{{asset('assets')}}/scripts/address.js"></script>
@endsection
