@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Office Informations
@endsection

@section('edit-modal-header')
   Update Office Information
@endsection

@section('edit-model-body')
<div class="modal-body">
    <form id="edit_form" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name" >
            Company:</label>
            <div class="col-sm-10">
                <select class="form-control" name = "company_id" id = "edit_company">

                </select>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Office Name:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="name" id="edit_name">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Email:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="email" id="edit_email">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Phone:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="phone" id="edit_phone">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div style="padding-left:0px" class="col-md-7">
                    <label class="control-label col-sm-4" for="name">Country:</label>
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

    </form>
</div>
@endsection

@section('delete-modal-header')
Remove The Office Information
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
Insert Office Information
@endsection

@section('add-model-body')
<div class="modal-body">
    <form id="addForm" class="form-horizontal" role="form">
        @csrf

        <div class="form-group">
            <label class="control-label col-sm-2" for="company" >
            Company:</label>
            <div class="col-sm-10">
                <select class="form-control" name = "company_id" id = "add_company">

                </select>
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="name" id="name" placeholder="Enter eoffice name">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="email" id="email" placeholder="Enter email address">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" name="phone" id="phone" placeholder="Enter office contact number">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div style="padding-left:0px" class="col-md-7">
                    <label class="control-label col-sm-4" for="country">Country:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name = "country_id" id = "add_country">

                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div style="padding-left:0px" class="col-md-5">
                    <label class="control-label col-sm-2" for="city">City:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name = "city_id" id = "add_city">

                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address1" id="add_address1" placeholder="Sector:10, road no, Uttara">
                <span class="help-block"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="postal_code">postal Code:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="postal_code" id="add_postal_code" placeholder="1230">
                <span class="help-block"></span>
            </div>
        </div>

    </form>
</div>
@endsection



@section('main-content')
{{-- Start data table --}}
<table id="officeDataTable" class="table table-striped table-bordered" style="width:100%">
</table>
<script src="{{asset('assets')}}/scripts/office.js"></script>

@endsection

