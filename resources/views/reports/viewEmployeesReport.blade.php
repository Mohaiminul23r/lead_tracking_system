@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
Employee Record report
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

<div class="row">
	<div class="col-md-12 ">
		<span onclick = "printSale()" class="btn btn-primary">Print</span>
		<form method="post" class="form pull-right" action = "{{route('downloadEmployeeReport')}}">
			@csrf
			<input type="hidden" name="from_date" value = "{{$formvalue['from_date']}}">
			<input type="hidden" name="to_date" value = "{{$formvalue['to_date']}}">
			<input type="hidden" name="user_id" value = "{{$formvalue['employee_id']}}">
			<button style="float:right padding-right:1px" class="btn btn-success" type = "submit">Download</button>
		</form>
	</div>
</div>
<br>
<div id="printEmployee">
	<div class = "row">
		<div class = "col-md-12">
			<div style="text-align:center; margin-bottom:20px; font-size:29px"><span class="label label-default">Showing Employee records from {{\Carbon\Carbon::parse($formvalue['from_date'])->format('d M Y')}} to {{\Carbon\Carbon::parse($formvalue['to_date'])->format('d M Y')}}</span></div>
			<div class= "col-md-6 col-md-offset-3">
				<span style="font-size:15px" class="col-md-12 label label-info">Employee Profile</span>
				<table class="table table-lg">
					<tr>
						<td>Employee Name :</td>
						<td>{{$users->user->name}}</td>
					</tr>
					<tr>
						<td>Phone :</td>
						<td>{{$users->phone}}</td>
					</tr>
					<tr>
						<td>Company :</td>
						<td>{{$users->company->name}}</td>
					</tr>
					<tr>
						<td>Ofiice :</td>
						<td>{{$users->office->name}}</td>
					</tr>
					<tr>
						<td>Depatment :</td>
						<td>{{$users->department->name}}</td>
					</tr>
					<tr>
						<td>Designation :</td>
						<td>{{$users->designation->name}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-md-12">
			@if(count($callhistories))
			<div class="col-md-6 table-responsive">
				<h3>Call records</h3>
				<table class="table table-striped">
					<thead style="background-color: #1092a0; color:#fff">
						<tr>
							<td>#</td>
							<td>Employee</td>
							<td>Project</td>
							<td>Client</td>
							<td>status</td>
							<td>Date</td>
						</tr>
					</thead>
					<tbody>

						@php
						$i=1;
						$total_call=0;
						@endphp
						@foreach($callhistories as $callhistory)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$callhistory->user->name}}</td>
							<td>{{$callhistory->project->name}}</td>
							<td>{{$callhistory->client->name}}</td>
							<td>{{$callhistory->status}}</td>
							<td>{{\Carbon\Carbon::parse($callhistory->created_at)->format('d M Y')}}</td>
						</tr>
						@php 
						$total_call++;
						@endphp	
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

			@if(count($schedules))
			<div class="col-md-6 table-responsive">
				<h3>Schedule records</h3>
				<table class="table table-striped">
					<thead style="background-color: #1d333c; color:#fff">
						<tr>
							<td>#</td>
							<td>Employee</td>
							<td>Project</td>
							<td>Client</td>
							<td>status</td>
							<td>Date</td>
						</tr>
					</thead>
					<tbody>

						@php
						$i=1;
						$total_schedule=0;
						@endphp
						@foreach($schedules as $schedule)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$schedule->user->name}}</td>
							<td>{{$schedule->project->name}}</td>
							<td>{{$schedule->client->name}}</td>
							<td>{{$schedule->status}}</td>
							<td>{{\Carbon\Carbon::parse($schedule->created_at)->format('d M Y')}}</td>
						</tr>
						@php 
						$total_schedule++;
						@endphp	
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

			@if(count($meetings))
			<div class="col-md-6 table-responsive">
				<h3>Meeting records</h3>
				<table class="table table-striped">
					<thead style="background-color: #1092a0; color:#fff">
						<tr>
							<td>#</td>
							<td>Project</td>
							<td>Employee</td>
							<td>Client</td>
							<td>TA cost</td>
							<td>Date</td>
						</tr>
					</thead>
					<tbody>

						@php
						$i=1;
						$total_ta =0;
						@endphp
						@foreach($meetings as $meeting)
						<tr>

							<td>{{$i++}}</td>
							<td>{{$meeting->user->name}}</td>
							<td>{{$meeting->schedule->callhistory->project->name}}</td>
							<td>{{$meeting->client->name}}</td>
							<td>{{$meeting->ta->cost}}</td>

							<td>{{\Carbon\Carbon::parse($meeting->created_at)->format('d M Y')}}</td>

						</tr>
						@php 
						$total_ta+=$meeting->ta->cost;
						@endphp	

						@endforeach
					</tbody>
				</table>
			</div>
			@endif

			@if(count($sales))
			<div class="col-md-6 table-responsive">
				<h3>Sales records</h3>
				<table class="table table-striped">
					<thead style="background-color: #1d333c; color:#fff">
						<tr>
							<td>#</td>
							<td>Employee</td>
							<td>Project</td>
							<td>Slab</td>
							<td>Client</td>
							<td>Price</td>
							<td>Date</td>
						</tr>
					</thead>
					<tbody>

						@php
						$i=1;
						$total_sold =0;
						@endphp
						@foreach($sales as $sale)
						<tr>

							<td>{{$i++}}</td>
							<td>{{$sale->user->name}}</td>
							<td>{{$sale->project->name}}</td>
							<td>{{$sale->projectSlab->name}}</td>
							<td>{{$sale->client->name}}</td>
							<td>{{$sale->price}}</td>
							<td>{{\Carbon\Carbon::parse($sale->created_at)->format('d M Y')}}</td>

						</tr>
						@php 
						$total_sold+=$sale->price;
						@endphp	
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

		</div>
	</div>


	<div class = "row">
		<div class = "col-md-12">
			<div class= "col-md-6 pull-right">
				<table style= "margin-top: 20px; font-size:16px;" class="table table-lg">
					@if(count($callhistories) && count($schedules))
					<tr>
						<td class="warning"><b>Total Call created:{{$total_call}}</b></td>
					</tr>
					<tr>
						<td class="warning"><b>Total Schedule created:{{$total_schedule}}</b></td>
					</tr>
					@endif

					@if(count($meetings) && count($sales))
					<tr>
						<td class="warning"><b>Total transport allowance: {{$total_ta}} .TK</b></td>
					</tr>
					<tr>
						<td class="warning"><b>Total Sold:{{$total_sold}} .TK</b></td>
					</tr>
					@endif
				</table>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function printSale(){
		var prtContent = document.getElementById("printEmployee");
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
