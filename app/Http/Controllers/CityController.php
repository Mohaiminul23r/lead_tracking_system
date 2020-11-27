<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addresses.city');
    }

    public function GetAllByCountry($id){
        return City::orderBy('name')->where('country_id',$id)->get(); 
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
    public function store(CityRequest $request)
    {
        $city  = new City ;
        $city->country_id = $request->country_id;
        $city->name = ucwords($request->name);
        $city->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return City::with('country')->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return City::with('country')->where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request,  $id)
    {
        $city = City::findOrFail($id);
        // $city -> update($request->all());
        $city->name = ucwords($request->name);
        $city->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = City::whereId($id)->delete();
    }

    public function GetDataForDataTable(Request $request){
        $city = new City;
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

            $search['cities.name'] = $request->input('search')['value'];
            $search['countries.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $with = [

            ]; 


        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['countries', 'cities.country_id', 'countries.name as countryName']
        ];  

       return $city->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }

}
