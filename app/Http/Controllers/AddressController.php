<?php

namespace App\Http\Controllers;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addresses.address');
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
    public function store(AddressRequest $request)
    {
        $address  = new Address ;
        $address->country_id = $request->country_id;
        $address->city_id = $request->city_id;
        $address->address1 = ucwords($request->address1);
        $address->postal_code = $request->postal_code;
        $address->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Address::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->country_id = $request->country_id;
        $address->city_id = $request->city_id;
        $address->address1 = ucwords($request->address1);
        $address->postal_code = $request->postal_code;
        $address->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::whereId($id)->delete();
    }

    public function GetDataForDataTable(Request $request){
        $address = new Address;
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

            $search['addresses.address1'] = $request->input('search')['value'];
            $search['addresses.postal_code'] = $request->input('search')['value'];
            $search['countries.name'] = $request->input('search')['value'];
            $search['cities.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['countries', 'addresses.country_id', 'countries.name as countryName'],
            ['cities', 'addresses.city_id', 'cities.name as cityName'],
        ];  

       return $address->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }

}

