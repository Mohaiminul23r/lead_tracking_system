@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Employee reports
@endsection

@section('main-content')
<form id="sale_report" method = "POST" action="{{route('viewEmployeesReport')}}" class="form-horizontal">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">

            <label class="control-label col-sm-2" for="name">From</label>
            <div class="col-sm-10{{ $errors->has('from_date') ? ' has-error' : '' }}">
                <div class="input-group date form_date ccol-sm-10" data-date="" data-date-format="dd MM yyyy" data-link-field="from_date" data-link-format="yyyy-mm-dd">
                    <input class="form-control" autocomplete=off size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <input type="hidden" name="from_date" id="from_date" value="" /><br/>
                <span class="help-block">{{ $errors->first('from_date') }}</span>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="control-label col-sm-2" for="name">To</label>
            <div class="col-sm-10 {{ $errors->has('to_date') ? ' has-error' : '' }}">
                <div class="input-group date form_date ccol-sm-10" data-date="" data-date-format="dd MM yyyy" data-link-field="to_date" data-link-format="yyyy-mm-dd">
                    <input class="form-control" autocomplete=off size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <input type="hidden" name="to_date" id="to_date" value="" /><br/>
                <span class="help-block">{{ $errors->first('to_date') }}</span>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="control-label col-md-4" for="name">Employee</label>
            <div class="form-group col-md-8{{ $errors->has('user_id') ? ' has-error' : '' }}">
                
                @if(!(Auth::check() && Auth::user()->hasPermission('viewSalesReport')))
                    <input type="text" disabled="" value="{{Auth::user()->name}}" autocomplete="off" name="user_name" id="user_name" class="form-control" placeholder="Enter Name" />
                    <input type="hidden" value ={{Auth::user()->id}} name="user_id" id="user_id" class="form-control"/>

                @else
                     <input type="text" autocomplete="off" name="fetch_user_name" id="fetch_user_name" class="form-control" placeholder="Enter Name" />
                    <input type="hidden" name="user_id" id="fetech_user_id" class="form-control"/>
                @endif

                <span class="help-block">{{ $errors->first('user_id') }}</span>
                <div id="fetch_userList">
                </div>
            </div>
            {{ csrf_field() }}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<script src="{{asset('assets')}}/scripts/salesReport.js"></script>
@endsection
