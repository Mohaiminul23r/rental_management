<?php

namespace App\Http\Controllers\API;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Renter;
use App\Model\RenterType;
use App\Model\Address;
use App\Model\City;
use App\Model\Country;
use App\Model\Thana;
use App\Http\Requests\RenterRequest;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $renter = new Renter;
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

             $search['renters.first_name'] = $request->input('search')['value'];
             $search['renters.father_name'] = $request->input('search')['value'];
             $search['renters.date_of_birth'] = $request->input('search')['value'];
             $search['renters.mobile'] = $request->input('search')['value'];
             $search['renters.nid_no'] = $request->input('search')['value'];
             $search['renter_types.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['renter_types', 'renters.renter_type_id', 'renter_types.name as renterTypeName,  renters.status as status, renters.photo as photo, renters.nid_photo as nidPhoto'],
            ['addresses', 'renters.address_id','addresses.postal_code as postCode, addresses.address_line1 as address_line1'],
            ['thanas', 'addresses.thana_id','thanas.name as thanaName'],
            ['cities', 'addresses.city_id','cities.name as cityName'],
            ['countries', 'addresses.country_id','countries.name as countryName'],
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RenterRequest $request)
    {
      //dd($request->all());
        $renter = new Renter();
        $first_name     = $request->input('first_name');
        $email          = $request->input('email');
       // $last_name      = $request->input('last_name');
        $father_name    = $request->input('father_name');
        $mother_name    = $request->input('mother_name');
        $phone          = $request->input('phone');
        $mobile         = $request->input('mobile');
        $gender_name    = $request->input('gender');
        $nid_no         = $request->input('nid_no');
        $date_of_birth  = $request->input('date_of_birth');
        $renter_type_id = $request->input('renter_type_id');
        $status         = $request->input('status');
        $imgPath        = 'public/images/';
        $renter_photo_path = "";
        $nid_photo_path    = "";
        
        if($request->input('photo') != "undefined" && $request->input('photo') != null){
            $photo          = $request->file('photo');
            $uniqueName_photo     = $photo->getClientOriginalName();
            $renter_photo_path    = $imgPath.$uniqueName_photo;
            $photo->move($imgPath, $uniqueName_photo);
        }
        
        if($request->input('nid_photo') != "undefined" && $request->input('nid_photo') != null){
            $nid_photo      = $request->file('nid_photo');
            $uniqueName_nid_photo = $nid_photo->getClientOriginalName();
            $nid_photo_path       = $imgPath.$uniqueName_nid_photo;
            $nid_photo->move($imgPath, $uniqueName_nid_photo);
        }

        $address   = new Address();
        $address->address_line1 = $request->input('address_line1');
        $address->postal_code = $request->input('postal_code');
        $address->city_id = $request->input('city_id');
        $address->thana_id = $request->input('thana_id');
        $address->country_id = $request->input('country_id');
        $address->save();

        $renter_information = [
            'first_name'      => $first_name,
            'email'           => $email,
           // 'last_name'       => $last_name,
            'father_name'     => $father_name,
            'mother_name'     => $mother_name,
            'address_id'      => $address->id,
            'date_of_birth'   => $date_of_birth,
            'photo'           => $renter_photo_path,
            'nid_photo'       => $nid_photo_path,
            'phone'           => $phone,
            'mobile'          => $mobile,
            'nid_no'          => $nid_no,
            'gender'          => $gender_name,
            'renter_type_id'  => $renter_type_id,
            'status'          => $status
        ];
        $renter = Renter::create($renter_information);
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
        return Renter::with('address')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RenterRequest $request, Renter $renter)
    {
        dd($request->all());
        $first_name     = $request->input('first_name');
        $email          = $request->input('email');
       // $last_name      = $request->input('last_name');
        $father_name    = $request->input('father_name');
        $mother_name    = $request->input('mother_name');
        $phone          = $request->input('phone');
        $mobile         = $request->input('mobile');
        $nid_no         = $request->input('nid_no');
        $gender         = $request->input('gender');
        $date_of_birth  = $request->input('date_of_birth');
        $renter_type_id = $request->input('renter_type_id');
        $status         = $request->input('status');
        $photo          = $request->file('photo');
        $nid_photo      = $request->file('nid_photo');

        //updating address
        $address = Address::findOrFail($renter->address_id);
        $address->address_line1  = $request->input('address_line1');
        $address->thana_id       = $request->input('thana_id');
        $address->postal_code    = $request->input('postal_code');
        $address->city_id        = $request->input('city_id');
        $address->country_id     = $request->input('country_id');
        $address->update();

        if(!is_null($photo)){
            unlink($renter->photo);
            $imgPath              = 'public/images/';
            $uniqueName_photo     = $photo->getClientOriginalName();
            $renter_photo_path    = $imgPath.$uniqueName_photo;
            $photo->move($imgPath, $uniqueName_photo);
            $renter->photo = $renter_photo_path;

        }

        if(!is_null($nid_photo)){
           unlink($renter->nid_photo);
           $imgPath              = 'public/images/';
           $uniqueName_nid_photo = $nid_photo->getClientOriginalName(); 
           $nid_photo_path       = $imgPath.$uniqueName_nid_photo;
          $nid_photo->move($imgPath, $uniqueName_nid_photo);
          $renter->nid_photo = $nid_photo_path;
        }
        $renter->first_name      = $first_name;
        $renter->email           = $email;
       // $renter->last_name       = $last_name;
        $renter->father_name     = $father_name;
        $renter->mother_name     = $mother_name;
        $renter->address_id      = $address->id;
        $renter->date_of_birth   = $date_of_birth;
        $renter->phone           = $phone;
        $renter->mobile          = $mobile;
        $renter->nid_no          = $nid_no;
        $renter->gender          = $gender;
        $renter->renter_type_id  = $renter_type_id;
        $renter->status          = $status;
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
        $renter = Renter::findOrFail($id);
        $renter_photo_path = app_path("public/{$renter->photo}");
        $nid_photo_path = app_path("public/{$renter->nid_photo}");
        if(File::exists($renter_photo_path)){
            File::delete($renter_photo_path);
        }
        if(File::exists($nid_photo_path)){
            File::delete($nid_photo_path);
        }
        $renter->delete();
        $address = Address::findOrFail($renter->address_id);
        $address->delete();
    }

    public function getRenterInformation($id){
        $renter_info = Renter::with('rentertype', 'address', 'address.city', 'address.thana', 'address.country')->whereId($id)->first();
        return $renter_info;
    }
}
