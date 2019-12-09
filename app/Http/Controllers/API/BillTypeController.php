<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BillType;
use App\Http\Requests\BillTypeRequest;

class BillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $billtype = new BillType;

        $limit = 20;
        $offset = 0;
        $search = [];
        $where = [];

        if($request->input('length')){
            $limit = $request->input('length');
        }

        if($request->input('start')){
            $offset = $request->input('start');
        }

        if($request->input('search') && $request->input('search')['value'] != ""){

            $search['bill_types.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

       return $billtype->getDataForDataTable($limit, $offset, $search, $where);
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
    public function store(BillTypeRequest $request)
    {
        $billtype = new BillType();
        $billtype->name = ucwords($request->input('name'));
        $billtype->save();
        //BillType::create($request->all());
        return "Bill type added successfully.";   
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
        return BillType::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillTypeRequest $request, BillType $billtype)
    {
        $billtype->name = ucwords($request->name);
        $billtype->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billtype = BillType::findOrFail($id);
        $billtype->delete();
    }
}
