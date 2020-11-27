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
            <div class="form-group col-md-8">
                <input type="text" autocomplete="off" name="project_name" id="project_name" class="form-control" placeholder="Enter Project Name" />
                <input type="hidden" name="user_id" id="project_id" class="form-control"/>
                <div id="projectList">
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
		<form method="post" class="form pull-right" action = "{{route('DownloadPdfProjects')}}">
			@csrf
			<input type="hidden" name="from_date" value = "{{$formvalue['from_date']}}">
			<input type="hidden" name="to_date" value = "{{$formvalue['to_date']}}">
			<input type="hidden" name="project_id" value = "{{$formvalue['project_id']}}">
			<button style="float:right padding-right:1px" class="btn btn-success" type = "submit">Download</button>
		</form>
	</div>
</div>
<br>
<div id="printSale" class="table-responsive">
	<h4><span style="font-size:15px" class="label label-default">Showing Sales records from {{\Carbon\Carbon::parse($formvalue['from_date'])->format('d M Y')}} to {{\Carbon\Carbon::parse($formvalue['to_date'])->format('d M Y')}}</span></h4>
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
			$total_sold = 0;
			$total_ta = 0;
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
			@php
				$total_sold += $sale->price;
				$total_ta += $sale->meeting->ta->cost;
			@endphp
			@endforeach
		</tbody>
	</table>
	<div class = "row">
		<div class = "col-md-12">
			<div class= "col-md-6 pull-right">
				<table style= "margin-top: 20px; font-size:16px;" class="table table-lg">
					@if(count($sales))
					<tr>
						<td class="primary"><b>Total Cost: {{$total_ta}} .TK</b></td>
					</tr>
					<tr>
						<td class="primary"><b>Total Sold: {{$total_sold}} .TK</b></td>
					</tr>
					@endif
				</table>

			</div>
		</div>
	</div>
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

<script src="{{asset('assets')}}/scripts/projectsReport.js"></script>

@endsection
