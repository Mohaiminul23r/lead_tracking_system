@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Meeting report
@endsection

@section('main-content')
<form id="sale_report" method = "POST" action="{{route('viewMeetingsReport')}}" class="form-horizontal">
	@csrf
	<div class="row">
		<div class="form-group col-md-5">

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

		<div class="form-group col-md-5">
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
		<button type="submit" class="btn btn-success">Submit</button>
	</div>
</form>

<div class="row">
	<div class="col-md-3 ">
		<span style="float:right padding-right:1px" onclick = "printSale()" class="btn btn-success">Print</span>
	</div>
	<div class="col-md-5">
	</div>
	<div class="col-md-4">
		<form method="post" class="form pull-right" action = "{{route('downloadMeetingReport')}}">
			@csrf
			<input type="hidden" name="from_date" value = "{{$formvalue['from_date']}}">
			<input type="hidden" name="to_date" value = "{{$formvalue['to_date']}}">
			<button style="float:right padding-right:1px" class="btn btn-success" type = "submit">Download</button>
		</form>
	</div>
</div>
<br>
<div id="printMeeting" class="table-responsive">
	<table class="table table-striped">
		<tr><h4><span style="font-size:15px" class="label label-info">Showing Meeting records from {{\Carbon\Carbon::parse($formvalue['from_date'])->format('d M Y')}} to {{\Carbon\Carbon::parse($formvalue['to_date'])->format('d M Y')}}</span> </h4></tr>
		<thead style="background-color: #a092a0; color:#fff">
			<tr>
				<td>#</td>
				<td>Project</td>
				<td>Employee</td>
				<td>Client</td>
				<td>TA cost</td>
				<td>Status</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					@if($meetings->isEmpty())
					{{'No data found'}}
					@endif
				</td>
			</tr>	
			@php
			$i=1;
			@endphp
			@foreach($meetings as $meeting)
			<tr>

				<td>{{$i++}}</td>
				<td>{{$meeting->user->name}}</td>
				<td>{{$meeting->schedule->callhistory->project->name}}</td>
				<td>{{$meeting->client->name}}</td>
				<td>{{$meeting->ta->cost}}</td>
				<td>
					@if($meeting->status==1)
					Successfull
					@endif
					@if($meeting->status==0)
					Pending
					@endif
				</td>
				<td>{{\Carbon\Carbon::parse($meeting->created_at)->format('d M Y')}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script type="text/javascript">

	function printSale(){
		var prtContent = document.getElementById("printMeeting");
		var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	}

</script>

@endsection
