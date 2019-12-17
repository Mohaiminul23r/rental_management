<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\House;
use App\Http\Requests\HouseRequest;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $house = new House();
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

            $search['houses.house_name'] = $request->input('search')['value'];
            $search['houses.house_number'] = $request->input('search')['value'];
            // $search['countries.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            // ['countries', 'cities.country_id', 'countries.name as countryName']
        ];  

       return $house->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
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
    public function store(HouseRequest $request)
    {
        $house = new House();
        $house->house_name     = $request->house_name;
        $house->house_number   = $request->house_no;
        $house->save();

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
        return House::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HouseRequest $request, House $house)
    {
       // dd($house);
        $house->house_name   = ucwords($request->house_name);
        $house->house_number = ucwords($request->house_no);
        $house->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->delete();
    }
}
