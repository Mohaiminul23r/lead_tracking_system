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
        <h5 style="text-align:center;margin-bottom:20px;">Sales report from {{\Carbon\Carbon::parse($from_date)->format('d M Y')}} to {{\Carbon\Carbon::parse($to_date)->format('d M Y')}} @if($employee_name) {{'for '. $employee_name}}@endif</h5>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">

                        @if(count($sales))
                        <div class="box-body">

                            <table width="100%" class="table table-bordered table-hover">
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
                                    @php
                                    $i=1;
                                    $ta=0;
                                    $price=0;
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

                                    {{$price+=$sale->price}}
                                    {{$ta+=$sale->meeting->ta->cost}}

                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-md-12">
                                <p></p>
                                <p style="text-align: left; padding:0px; margin:0px">Total sale: {{$price}}.00 TK.</p>
                                <p style="text-align: left; padding:0px; margin:0px;">Total Transport Allowance: {{$ta}}.00 TK.</p>
                            </div>
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