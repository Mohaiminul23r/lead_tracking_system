<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sales report</title>
    <style>
    table, th, td, tr{

        border: 1px solid #000;
        border-collapse: collapse;

    }
    body{
        font-family: serif; 
        font-size: 12pt; 
    }
</style>
</head>
<body>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h2 style="text-align:center">
            Lead Tracking System
        </h2>
        <h5 style="text-align:center;font-size:20px"><span class="label label-default">Showing Employee records from {{\Carbon\Carbon::parse($from_date)->format('d M Y')}} to {{\Carbon\Carbon::parse($to_date)->format('d M Y')}}
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">

                            <div align="center" class= "col-md-6">
                                <table style="margin-left:10%; margin-top:20px; margin-bottom:20px;">
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
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div style="width:100%">
                    @if(count($callhistories))
                    Call records
                    <table align="center"  style="margin-bottom:20px;" width="80%">
                        <thead style="background-color: #1092a0; color:white">
                            <tr style="background-color: #1092a0; color:white">
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
                    @endif

                    @if(count($meetings))
                    Meeting records.
                    <table align="center" style="margin-bottom:20px;" width="80%">
                        <thead>
                            <tr style="background-color: #1092a0; color:white">
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
                    @endif
                </div>
                <div style="width:100%;">
                    @if(count($schedules))
                    Schedule records.
                    <table align="center"  style="margin-bottom:20px;" width="80%">
                        <thead>
                            <tr style="background-color: #b5b5b5; color:white">
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
                    @endif

                    @if(count($sales))
                    Sales records.
                    <table style="margin-bottom:20px;" width="100%">
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
                    @endif
                </div>
            </div>

            <div class = "row">
                <div class = "col-md-12">
                    <div class= "col-md-6 pull-right">
                        <table style= "margin-top: 20px; font-size:16px;" class="table table-lg">
                            @if(count($callhistories) && count($schedules))
                            <tr>
                                <td class="warning"><b>Total Call has made:{{$total_call}}</b></td>
                            </tr>
                            <tr>
                                <td class="warning"><b>Total Schedule was set:{{$total_schedule}}</b></td>
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
        <!-- /.content -->

    </body>
    </html>