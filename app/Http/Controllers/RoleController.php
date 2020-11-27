<?php

namespace App\Http\Controllers;
use App\Model\User;
use App\Model\Roleview;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use KawsarJoy\RolePermission\Models\Role;
use KawsarJoy\RolePermission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('permissions.role');
    }

    public function GetAll(){
        return Role::all(); 
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

    public function AttachRole(Request $request, $id){
        $user = User::find($id);
        $user->roles()->sync($request->role_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role  = new Role ;
        $role ->name = $request->name;
        $role ->description = $request->description;
        $role ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Role::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Role::findOrFail($id);
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
        $role = Role::findOrFail($id);
        $role -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            $user->roles()->detach($id);
        }
        
        $role = Role::find($id);
        $role->permissions()->sync([]);
        $role->delete();

    }

        public function GetDataForDataTable(Request $request){
        $role = new Roleview;
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

            $search['roles.name'] = $request->input('search')['value'];
            $search['roles.description'] = $request->input('search')['value'];

        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
        ];  

       return $role->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }
}
