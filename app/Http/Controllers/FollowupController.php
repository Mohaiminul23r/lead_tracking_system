<?php

namespace App\Http\Controllers;
use App\Model\Followup;
use Illuminate\Http\Request;
use App\Http\Requests\FollowupRequest;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('leads.followup');
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
    public function store(FollowupRequest $request)
    {
        $followup = new Followup;
        $followup->user_id = $request->user_id;
        $followup->call_history_id = $request->id;
        $followup->followup_time = $request->followup_time;
        $followup->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $followup = Followup::findOrFail($id);
        $followup->delete();
    }

        public function GetDataForDataTable(Request $request){
        $followup = new Followup();
        $limit = 20;
        $offset = 0;
        $search = [];
        $where = [];
        $with = [];
        $join = [];
        $orderBy = [];

        if($request->input('length')){
            $limit = $request->input('length');
        }

        if($request->input('start')){
            $offset = $request->input('start');
        }

        if($request->input('search') && $request->input('search')['value'] != ""){

            $search['projects.name'] = $request->input('search')['value'];
            $search['clients.name'] = $request->input('search')['value'];
            $search['clients.phone'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [
        ]; 

        $join = [
        ]; 

        $table_col_name = "followups.user_id";

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */      
            ['call_histories', 'followups.call_history_id', 'call_histories.*'],
            ['projects', 'call_histories.project_id', 'projects.name as projectName'],
            ['clients', 'call_histories.client_id', 'clients.*'],
        ];  

        $orderBy = [
            'by' => 'followup_time',
            'order' => 'ASC',
        ];

       return $followup->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy, $table_col_name);
    }
}
