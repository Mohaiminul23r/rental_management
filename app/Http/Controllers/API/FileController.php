<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\File;
use App\Model\RenterInformation;
use App\Http\Requests\RenterInformationRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $file = new File();
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

            $search['files.file_name'] = $request->input('search')['value'];
            $search['files.file_type'] = $request->input('search')['value'];
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
       return $file->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
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
        //dd($request->all());
        $id = $request->renter_id;
        $renter_information = RenterInformation::find($id);
        $fileName = time().'.'.$request->file->getClientOriginalName();
        $destinationPath = 'uploads/';
        $request->file->move(public_path('uploads'), $fileName);
        $filePath = $destinationPath.$fileName;
        $renter_information->files()->create([
            'fileable_id'           => $renter_information->id,
            'file_type'             => $request->file_type,
            'file_name'             => $request->file_name,     
            'file_path'             => $filePath    
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();
    }
}
