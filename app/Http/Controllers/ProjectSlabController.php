<?php

namespace App\Http\Controllers;

use App\Model\ProjectSlab;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectSlabRequest;

class ProjectSlabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.projectslab');
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

    public function GetAllByProject($id){
        return ProjectSlab::orderBy('name')->where('project_id',$id)->get();
    }

    public function store(ProjectSlabRequest $request)
    {
        $projectslab  = new ProjectSlab ;
        $projectslab->project_id = $request->project_id;
        $projectslab->name = $request->name;
        $projectslab->price = $request->price;
        $projectslab->employee = $request->employee;
        $projectslab->support_cost = $request->support_cost;
        // $projectslab->status = $request->status;
        $projectslab->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectSlab  $projectSlab
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           return ProjectSlab::with('category')->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectSlab  $projectSlab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return ProjectSlab::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectSlab  $projectSlab
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectSlabRequest $request, $id)
    {
            $projectslab = ProjectSlab::findOrFail($id);
            $projectslab ->update($request ->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectSlab  $projectSlab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectslab = ProjectSlab::whereId($id)->delete();
    }

    public function GetDataForDataTable(Request $request){
        $projectslab = new ProjectSlab();
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

            $search['project_slabs.name'] = $request->input('search')['value'];
            $search['projects.name'] = $request->input('search')['value'];
         
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
       
             ['projects', 'project_slabs.project_id', 'projects.name as projectName'],
        ];  

       return $projectslab->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }

}
