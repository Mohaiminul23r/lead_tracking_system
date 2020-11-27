<?php

namespace App\Http\Controllers;
use App\Model\EmployeeInformation;
use App\Model\User;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use App\Http\Requests\EmployeeInformationRequest;
use KawsarJoy\RolePermission\Models\Role;


class EmployeeInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.employee');
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

    public function StoreAddress(EmployeeInformationRequest $request, $id){
        $address = new Address;
        $address->country_id = $request->country_id;
        $address->city_id = $request->city_id;
        $address->address1 = $request->address1;
        $address->postal_code = $request->postal_code;
        $address->save();

        $employeeInformation = EmployeeInformation::findOrFail($id);
        $employeeInformation->address_id = $address->id;
        $employeeInformation->update();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeInformationRequest $request)
    {
        $user  = new User;
        $user->name = ucfirst($request->name);
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->save();

        $emp_information = new EmployeeInformation;
        $emp_information->user_id = $user->id;
        $emp_information->company_id = $request->company_id;
        $emp_information->office_id = $request->office_id;
        $emp_information->department_id = $request->department_id;
        $emp_information->employee_type_id = $request->employee_type_id;
        $emp_information->designation_id = $request->designation_id;
        $emp_information->dob = $request->dob;
        $emp_information->gender = $request->gender;
        $emp_information->phone = $request->phone;
        $emp_information->salary = $request->salary;
        $emp_information ->save();

        try{
        
            $user->notify(new UserNotification($user));
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
        return EmployeeInformation::where('id',$id)->with(
            'user',
            'company',
            'office',
            'department',
            'designation',
            'employeeType',
            'address',
            'address.country',
            'address.city')
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return EmployeeInformation::where('id',$id)->with('user')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeInformationRequest $request, $id)
    {
        $emp_information = EmployeeInformation::findOrFail($id);
        $user  = User::findOrFail($emp_information->user_id);
        $user->name = ucfirst($request->name);
        $user->email = $request->email;
        $user->update();

        $emp_information->company_id = $request->company_id;
        $emp_information->office_id = $request->office_id;
        $emp_information->department_id = $request->department_id;
        $emp_information->employee_type_id = $request->employee_type_id;
        $emp_information->designation_id = $request->designation_id;
        $emp_information->dob = $request->dob;
        $emp_information->gender = $request->gender;
        $emp_information->phone = $request->phone;
        $emp_information->salary = $request->salary;
        $emp_information ->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = EmployeeInformation::findOrFail($id);
        $usr = User::findOrFail($user->user_id)->roles()->sync([]);
        $user->user()->delete();
        $user->address()->delete();
        $user->delete();
    }
    
    public function GetDataForDataTable(Request $request){
        $user = new EmployeeInformation;
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

            $search['employee_informations.phone'] = $request->input('search')['value'];
            $search['users.name'] = $request->input('search')['value'];
            $search['users.email'] = $request->input('search')['value'];
            $search['companies.name'] = $request->input('search')['value'];
            $search['offices.name'] = $request->input('search')['value'];
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

        $table_col_name = "user_id";


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['users', 'employee_informations.user_id', 'users.name as userName , users.email as userEmail'],
            ['companies', 'employee_informations.company_id','companies.name as companyName'],
            ['offices', 'employee_informations.office_id', 'offices.name as officeName'],
        ];  

       return $user->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $order_By, $table_col_name);
    }
}
