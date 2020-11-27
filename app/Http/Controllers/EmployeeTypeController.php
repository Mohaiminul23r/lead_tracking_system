<?php

namespace App\Http\Controllers;
use App\Model\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeTypeRequest;


class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('employees.employee_type');
    }

    public function GetAll(){
        return EmployeeType::orderBy('name')->get(); 
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
    public function store(EmployeeTypeRequest $request)
    {
        $employeetype  = new EmployeeType ;
        $employeetype->name = $request->name;
        $employeetype->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return EmployeeType::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return EmployeeType::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(EmployeeTypeRequest $request, $id)
    {
        $employeetype = EmployeeType::findOrFail($id);
        $employeetype->name = $request->name;
        $employeetype->status = (int)$request->status;
        $employeetype->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $employeetype = EmployeeType::whereId($id)->delete();
    }

    public function GetDataForDataTable(Request $request){
        $employeetype = new EmployeeType();
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

            $search['employee_types.name'] = $request->input('search')['value'];
           
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
        ];  

       return $employeetype->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }
}
