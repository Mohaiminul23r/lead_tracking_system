@extends('layouts.master')

@section('title')
Lead Tracking System
@endsection

@section('content-hedding')
<b>Lead Tracking <span>System</span></b>
@endsection

@section('page-title')
DashBoard
@endsection

@section('main-content')
<div class="row mt">
	<!-- SERVER STATUS PANELS -->
	<div class="col-md-4 col-sm-4 mb">
		<div class="grey-panel pn donut-chart">
			<div class="grey-header">
				<h5>Total Number of Employee</h5>
			</div>

			<div class="row">
				<div class="col-sm-12 col-xs-12 goleft">
					<table align="center">
						<tr>
							<td><h3 style="margin:0">Total :</h3></td>
							<td><h2 style="margin:0; font-size: 30px">{{ App\Model\User::all()->count() }}</h2></td>
						</tr>
						<tr>
							<td><h3 style="margin:0">Marketing :</h3></td>
							<td><h2 style="margin:0; font-size: 30px">{{ App\Model\EmployeeInformation::query()->join('departments', 'employee_informations.department_id', '=', 'departments.id')->where('departments.name' , 'Marketing')->get()->count()}}</h2></td>
						</tr>
						<tr>
							<td><h3 style="margin:0">Sales :</h3></td>
							<td><h2 style="margin:0; font-size: 30px">{{ App\Model\EmployeeInformation::query()->join('departments', 'employee_informations.department_id', '=', 'departments.id')->where('departments.name' , 'Sales')->get()->count()}}</h2></td>
						</tr>
						<tr>
							<td><h3 style="margin:0">Development :</h3></td>
							<td><h2 style="margin:0; font-size: 30px">{{ App\Model\EmployeeInformation::query()->join('departments', 'employee_informations.department_id', '=', 'departments.id')->where('departments.name' , 'Development')->get()->count()}}</h2></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- /grey-panel -->
	</div>
	<!-- /col-md-4-->
	<div class="col-md-4 col-sm-4 mb">
		<div class="darkblue-panel pn">
			<div class="darkblue-header">
				<h5>Total Client</h5>
			</div>

			<h1>{{App\Model\Client::all()->count()}}</h1>

		</div>
		<!--  /darkblue panel -->
	</div>
	<!-- /col-md-4 -->
	<div class="col-md-4 col-sm-4 mb">
		<!-- REVENUE PANEL -->
		<div class="green-panel pn">
			<div class="green-header">
				<h5>Running Project</h5>
			</div>
			<h1 style="color:#fff;">{{App\Model\Project::all()->count()}}</h1>
		</div>
	</div>
	<!-- /col-md-4 -->
</div>
<div class="row">
	<div class="col-md-4 col-sm-4 mb">
		<div class="grey-panel pn donut-chart">
			<div class="grey-header">
				<h5>Tatal sale this month</h5>
			</div>
			<h2>{{App\Model\Sale::all()->count()}}</h2>
		</div>
		<!-- /grey-panel -->
	</div>
	<!-- /col-md-4 -->

	<!--/ col-md-4 -->
	<div class="col-md-4 col-sm-4 mb">
		<div class="green-panel pn">
			<div class="green-header">
				<h5>TOP SELLING PROJECT</h5>
			</div>

			<h3>@if($project = App\Model\Project::Join('sales', 'project_id', '=', 'projects.id')
				->select('projects.name', DB::raw('count(\'sales.id\') as sales_count'))
				->groupBy('projects.name')
				->orderBy('sales_count', 'desc')
				->first()) {{$project->name}} @endif</h3>
			</div>
		</div>
		<!-- /col-md-4 -->

		<div class="col-md-4 col-sm-4 mb">
			<div class="darkblue-panel pn">
				<div class="darkblue-header">
					<h5>Top Seller</h5>
				</div>
				<h2>@if($user = App\Model\User::Join('sales', 'user_id', '=', 'users.id')
					->select('users.name', DB::raw('count(\'sales.id\') as sales_count'))->groupBy('users.name')
					->orderBy('sales_count', 'desc')
					->first()) {{$user->name}} @endif</h2>

				</div>
			</div>
			@endsection
