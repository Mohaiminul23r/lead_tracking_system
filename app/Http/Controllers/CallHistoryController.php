<?php

namespace App\Http\Controllers;
use App\Model\CallHistory;
use Illuminate\Http\Request;
use App\Http\Requests\CallHistoryRequest;

class CallHistoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('leads.callhistory');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CallHistoryRequest $request)
    {
        $callhistory = new CallHistory;
        $callhistory->client_id = $request->client_id;
        $callhistory->user_id = $request->user_id;
        $callhistory->project_id = $request->project_id;
        $callhistory->status = $request->status;
        $callhistory->save();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return CallHistory::whereId($id)->with('project')->with('client')->first();
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
    //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $callhistory = CallHistory::findOrfail($id);
        $callhistory->delete();
    }


    public function GetDataForDataTable(Request $request){
        $callhistory = new CallHistory();
        $limit = 20;
        $offset = 0;
        $search = [];
        $where = [];
        $with = [];
        $join = [];

        if($request->input('length')){
            $limit = $request->input('length');
        }

        if($request->input('start')){
            $offset = $request->input('start');
        }

        if($request->input('search') && $request->input('search')['value'] != ""){

            $search['users.name'] = $request->input('search')['value'];
            $search['projects.name'] = $request->input('search')['value'];
            $search['clients.name'] = $request->input('search')['value'];
            if($request->input('search')['value'] == 'interested')
                $search['call_histories.status'] = 1;
            else if($request->input('search')['value'] == 'pending')
                $search['call_histories.status'] = 2;
            else if($request->input('search')['value'] == 'not')
                $search['call_histories.status'] = 0;
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [
        ]; 

        $join = [
        ]; 

        $order_By = [

        ];

        $table_col_name = "call_histories.user_id";


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */      
            ['users', 'call_histories.user_id', 'users.name as userName'],
            ['projects', 'call_histories.project_id', 'projects.name as projectName'],
            ['clients', 'call_histories.client_id', 'clients.name as clientName'],
        ];  

        return $callhistory->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $order_By, $table_col_name);
    }
}
