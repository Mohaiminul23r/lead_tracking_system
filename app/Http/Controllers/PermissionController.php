<?php

namespace App\Http\Controllers;
use App\Model\Permissionview;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use KawsarJoy\RolePermission\Models\Permission;
use KawsarJoy\RolePermission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permissions.permission');
    }


     public function GetAll(){
        return Permission::orderBy('name')->get(); 
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
    public function store(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        $role->permissions()->sync($request->permission_id);

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
        return Permission::findOrFail($id);
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
        $permission = Permission::find($id);
        $permission->description = $request->description;
        $permission -> update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetDataForDataTable(Request $request){
        $permission = new Permissionview;
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

            $search['permissions.name'] = $request->input('search')['value'];
            $search['permissions.description'] = $request->input('search')['value'];

        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
        ];  

       return $permission->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }
}
