<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Collector;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collector = new Collector();
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

             $search['complexes.name'] = $request->input('search')['value'];
             $search['complexes.complex_no'] = $request->input('search')['value'];
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

       return $collector->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.collector.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $collector = new Collector();
        $collector->collector_name = ucwords($request->input('collector_name'));
        $collector->father_name = $request->input('father_name');;
        $collector->mother_name = $request->input('mother_name');
        $collector->email = $request->input('email');
        $collector->contact_no = $request->input('contact_no');
        $collector->nid_no = $request->input('nid_no');
        $collector->date_of_birth = $request->input('date_of_birth');
        $collector->present_address = $request->input('present_address');
        $collector->permanent_address = $request->input('permanent_address');
        $collector->gender = $request->input('gender');
        $collector->status = $request->input('status');
        $collector->save();
        //$collector->create($request->all());
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
        $collector_info = Collector::findOrFail($id)->first();
        return view('settings.collector.edit', ['collector_info'=> $collector_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collector $collector)
    {
        $collector->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd();
        $collector = Collector::findOrFail($id);
        $collector->delete();
    }
}
