<?php

namespace App\Http\Controllers;
use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.project');
    }

    public function GetAllByProjectCategory($id){
        return Project::orderBy('name')->where('projec_category_id',$id)->get();
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

    public function GetAll(){
        return Project::orderBy('name')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project  = new Project ;
        $project->project_category_id = $request->project_category_id;
        $project->name = ucwords($request->name);
        $project->details = ucfirst($request->details);
        // $project->status = $request->status;
        $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Project::with('category')->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          return Project::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        
        $project = Project::findOrFail($id);
        $project->project_category_id = $request->category_id;
        $project->name = ucwords($request->name);
        $project->details = ucfirst($request->details);
        $project->status = $request->status;
        $project->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $project = Project::whereId($id)->delete();
    }

    public function GetDataForDataTable(Request $request){
        $project = new Project();
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

            $search['projects.name'] = $request->input('search')['value'];
            $search['project_categories.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
             ['project_categories', 'projects.project_category_id', 'project_categories.name as categoryName'],
        ];  

       return $project->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }

}
