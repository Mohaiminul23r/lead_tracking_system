@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Project Wise Report
@endsection

@section('main-content')
<form id="sale_report" method = "POST" action="{{route('viewProjectsReport')}}" class="form-horizontal">
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
            <div class="form-group col-md-8{{ $errors->has('project_id') ? ' has-error' : '' }}">
                <input type="text" autocomplete="off" name="project_name" id="project_name" class="form-control" placeholder="Enter Project Name" />
                <span class="help-block">{{ $errors->first('project_id') }}</span>
                <input type="hidden" name="project_id" id="project_id" class="form-control"/>
                <div id="projectList">
                </div>
            </div>
            {{ csrf_field() }}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<script src="{{asset('assets')}}/scripts/projectsReport.js"></script>

@endsection
