<?php

namespace App\Http\Controllers;
use App\Model\Office;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Requests\OfficeRequest;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.office');
    }

    public function GetAllByCompnay($id){
        return Office::orderBy('name')->where('company_id',$id)->get(); 
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
    public function store(OfficeRequest $request)
    {
        $address = new Address;
        $address->address1 = $request->address1;
        $address->city_id = $request->city_id;
        $address->country_id = $request->country_id;
        $address->postal_code = $request->postal_code;
        $address ->save();

        $office  = new Office;
        $office->name = $request->name;
        $office->email = $request->email;
        $office->phone = $request->phone;
        $office->company_id = $request->company_id;
        $office->address_id = $address->id;
        $office -> save();

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
        return Office::whereId($id)->with('address')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeRequest $request, $id)
    {
        $office = Office::findOrFail($id);
        $office->name = $request->name;
        $office->email = $request->email;
        $office->phone = $request->phone;
        $office->company_id = $request->company_id;
        $office->update();

        $address = Address::findOrFail($office->address_id);
        $address->city_id = $request->city_id;
        $address->country_id = $request->country_id;
        $address->postal_code = $request->postal_code;
        $address->address1 = $request->address1;
        $address->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->address()->delete();
        $office->delete();
    }

    public function GetDataForDataTable(Request $request){
        $office = new Office();
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
            
            $search['offices.name'] = $request->input('search')['value'];
            $search['addresses.address1'] = $request->input('search')['value'];
            $search['companies.name'] = $request->input('search')['value'];
           
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['addresses', 'offices.address_id', 'addresses.address1 as addressName'],
            ['companies', 'offices.company_id', 'companies.name as companyName'],
        ];  

       return $office->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }
}
