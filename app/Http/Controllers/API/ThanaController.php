<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Thana;
use Illuminate\Http\Request;
use App\Http\Requests\ThanaRequest;

class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $thana = new Thana;

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
            $search['thanas.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

          $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['cities', 'thanas.city_id', 'cities.name as cityName'],
     
        ];  
       return $thana->getDataForDataTable($limit, $offset, $search, $where, $with, $join);
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
    public function store(ThanaRequest $request)
    {
        //dd($request->all());
        $thana = new Thana();
        $thana->city_id = $request->input('city_id');
        $thana->name = ucwords($request->input('name'));
        $thana->save();
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
        return Thana::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThanaRequest $request, Thana $thana)
    {
        $thana->city_id = $request->city_id;
        $thana->name = ucwords($request->name);
        $thana->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();

    }
}
