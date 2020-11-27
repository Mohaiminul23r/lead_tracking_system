<?php

namespace App\Http\Controllers;
use App\Model\Sale;
use App\Model\Client;
use Illuminate\Http\Request;
use App\Notifications\SaleNotification;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.sale');
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
    public function store(SaleRequest $request)
    {
        $sale  = new Sale ;
        $sale->user_id = $request->user_id;
        $sale->client_id = $request->client_id;
        $sale->project_id = $request->project_id;
        $sale->project_slab_id = $request->project_slab_id;
        $sale->meeting_id = $request->meeting_id;
        $sale->price = $request->price;
        $sale->save();
        
        try {
            $client = Client::findOrFail($request->client_id);
            $sales = Sale::where('id',$sale->id)->with('project')->with('client')->first();
            $client->notify(new SaleNotification($sales));
        }
            catch (\Exception $e) {
            return "fail";
        }
       


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
        $sch = Sale::findOrFail($id);
        $sch->delete();
    }

        public function GetDataForDataTable(Request $request){
        $sale = new Sale();
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
            $search['users.name'] = $request->input('search')['value'];
            $search['project_slabs.name'] = $request->input('search')['value'];
            $search['clients.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $table_col_name = "sales.user_id";

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */      
            ['users', 'sales.user_id', 'users.name as userName'],
            ['projects', 'sales.project_id', 'projects.name as projectName'],
            ['project_slabs', 'sales.project_slab_id', 'project_slabs.name as PSName'],
            ['clients', 'sales.client_id', 'clients.name as clientName']
        ];  

       return $sale->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy, $table_col_name);
    }
}
