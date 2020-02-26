<?php

namespace App\Http\Controllers\API;

//use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RenterInformation;
use App\Model\RenterType;
use App\Model\File;
use App\Model\Complex;
use App\Model\BillType;
use App\Http\Requests\RenterInformationRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $renter = new RenterInformation();
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

             $search['renter_information.first_name'] = $request->input('search')['value'];
             $search['renter_information.father_name'] = $request->input('search')['value'];
             $search['renter_information.date_of_birth'] = $request->input('search')['value'];
             $search['renter_information.mobile'] = $request->input('search')['value'];
             $search['renter_information.nid_no'] = $request->input('search')['value'];
             $search['renter_types.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            // ['renter_types', 'renters.renter_type_id', 'renter_types.name as renterTypeName,  renters.status as status, renters.photo as photo, renters.nid_photo as nidPhoto'],
        ];  
       return $renter->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $renterType = RenterType::orderBy('name')->get();
        $billTypes = BillType::orderBy('name')->get();
        $complexes = Complex::orderBy('name')->get();
        return view('renter.add_renter_info', ['renterType' => $renterType, 'billTypes' => $billTypes, 'complexes' => $complexes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getAddedFiles($id){
        $renter_files = RenterInformation::whereId($id)->with('files')->first();
        return $renter_files;
    }

    public function store(RenterInformationRequest $request)
    {
        //dd($request->all());
        $renter_information = new RenterInformation();
        $renter_information->renter_name    = $request->input('renter_name');
        $renter_information->father_name    = $request->input('father_name');
        $renter_information->mother_name    = $request->input('mother_name');
        $renter_information->email          = $request->input('email');
        $renter_information->phone_no       = $request->input('phone_no');
        $renter_information->mobile_no      = $request->input('mobile_no');
        $renter_information->occupation     = $request->input('occupation');
        $renter_information->gender         = $request->input('gender');
        $renter_information->nid_no         = $request->input('nid_no');
        $renter_information->nationality    = $request->input('nationality');
        $renter_information->date_of_birth  = $request->input('date_of_birth');
        $renter_information->renter_type_id = $request->input('renter_type_id');
        $renter_information->present_address      = $request->input('present_address');
        $renter_information->permanent_address    = $request->input('permanent_address');
        $renter_information->status               = $request->input('status');
        $renter_information->save();
        $id = $renter_information->id;
        $unique_id = IdGenerator::generate(['table' => 'renter_information', 'length' => 8, 'prefix' => date('ym')]);
       // dd($unique_id);
        $renter_information->renterID = $unique_id;
        $renter_information->save();
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
        return RenterInformation::with('rentertype')->whereId($id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RenterInformationRequest $request, RenterInformation $renter)
    {
       // dd($request->all());
        $renter->renter_name    = $request->input('renter_name');
        $renter->father_name    = $request->input('father_name');
        $renter->mother_name    = $request->input('mother_name');
        $renter->email          = $request->input('email');
        $renter->phone_no       = $request->input('phone_no');
        $renter->mobile_no      = $request->input('mobile_no');
        $renter->occupation     = $request->input('occupation');
        $renter->gender         = $request->input('gender');
        $renter->nid_no         = $request->input('nid_no');
        $renter->nationality    = $request->input('nationality');
        $renter->date_of_birth  = $request->input('date_of_birth');
        $renter->renter_type_id = $request->input('renter_type_id');
        $renter->present_address      = $request->input('present_address');
        $renter->permanent_address    = $request->input('permanent_address');
        $renter->status               = $request->input('status');
        $renter->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renter = RenterInformation::findOrFail($id);
        $renter->delete();
    }

    public function getRenterInformation($id){
        $renter_info = RenterInformation::with('rentertype', 'address', 'address.city', 'address.thana', 'address.country')->whereId($id)->first();
        return $renter_info;
    }

    public function getRenterInformationId(){
        $renter_information_id = RenterInformation::orderBy('id')->get();
        return $renter_information_id;
    }
}
