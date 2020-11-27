<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meeting report</title>
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
        <h5 style="text-align:center;margin-bottom:20px;">Meeting report from {{\Carbon\Carbon::parse($from_date)->format('d M Y')}} to {{\Carbon\Carbon::parse($to_date)->format('d M Y')}}</h5>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">

                        @if(count($meetings))
                        <div class="box-body">

                            <table width="100%" class="table table-striped">
        <thead style="background-color: #2092a0; color:#fff">
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
                        @endif
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.content -->

    </body>
    </html>