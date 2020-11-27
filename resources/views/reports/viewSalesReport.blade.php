@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Sales report
@endsection

@section('main-content')
<form id="sale_report" method = "POST" action="{{route('viewSalesReport')}}" class="form-horizontal">
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
			<div class="form-group col-md-8">
                <input type="text" autocomplete="off" name="fetch_user_name" id="fetch_user_name" class="form-control" placeholder="Enter Name" />
                <input type="hidden" name="user_id" id="fetech_user_id" class="form-control"/>
                <div id="fetch_userList">
                </div>
            </div>
			{{ csrf_field() }}
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

<div class="row">
	<div class="col-md-3 ">
		<span style="float:right padding-right:1px" onclick = "printSale()" class="btn btn-success">Print</span>
	</div>
	<div class="col-md-5">
	</div>
	<div class="col-md-4">
		<form method="post" class="form pull-right" action = "{{route('downloadSalesReport')}}">
			@csrf
			<input type="hidden" name="from_date" value = "{{$formvalue['from_date']}}">
			<input type="hidden" name="to_date" value = "{{$formvalue['to_date']}}">
			<input type="hidden" name="user_id" value = "{{$formvalue['employee_id']}}">
			<button style="float:right padding-right:1px" class="btn btn-success" type = "submit">Download</button>
		</form>
	</div>
</div>
<br>
<div id="printSale" class="table-responsive">
	<h4><span style="font-size:15px" class="label label-info">Showing Sales records from {{\Carbon\Carbon::parse($formvalue['from_date'])->format('d M Y')}} to {{\Carbon\Carbon::parse($formvalue['to_date'])->format('d M Y')}}</span></h4>
	<table class="table table-striped">
		<thead style="background-color: #1092a0; color:#fff">
			<tr>
				<td>#</td>
				<td>Employee</td>
				<td>Project</td>
				<td>Slab</td>
				<td>Client</td>
				<td>Price</td>
				<td>TA cost</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					@if($sales->isEmpty())
					{{'No data found'}}
					@endif
				</td>
			</tr>	
			@php
			$i=1;
			@endphp
			@foreach($sales as $sale)
			<tr>

				<td>{{$i++}}</td>
				<td>{{$sale->user->name}}</td>
				<td>{{$sale->project->name}}</td>
				<td>{{$sale->projectSlab->name}}</td>
				<td>{{$sale->client->name}}</td>
				<td>{{$sale->price}}</td>
				<td>{{$sale->meeting->ta->cost}}</td>
				<td>{{\Carbon\Carbon::parse($sale->created_at)->format('d M Y')}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function printSale(){
		var prtContent = document.getElementById("printSale");
		var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	} 
</script>

<script src="{{asset('assets')}}/scripts/salesReport.js"></script>
@endsection
