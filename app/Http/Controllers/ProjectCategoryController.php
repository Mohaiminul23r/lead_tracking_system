<?php

namespace App\Http\Controllers;
use App\Model\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectCategoryRequest;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.projectcategory');
    }

    public function GetAll(){
        return ProjectCategory::orderBy('name')->get(); 
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
    public function store(ProjectCategoryRequest $request)
    {
             //save the data to the database
        $projectcategory  = new ProjectCategory ;
        $projectcategory->name = ucwords($request->name);
        $projectcategory->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ProjectCategory::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return ProjectCategory::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCategoryRequest $request, $id)
    {
        $projectcategory = ProjectCategory::findOrFail($id);
        $projectcategory->name = ucwords($request->name);
        $projectcategory -> update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $projectcategory = ProjectCategory::whereId($id)->delete();
    }
    public function GetDataForDataTable(Request $request){
        $projectcategory = new ProjectCategory();
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

            $search['project_categories.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
        ];  

       return $projectcategory->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }
}
