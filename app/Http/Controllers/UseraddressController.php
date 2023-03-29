<?php

namespace App\Http\Controllers;

use App\Http\Requests\UseraddressRequest;
use App\Models\Useraddress;
use Illuminate\Http\Request;
use Webpatser\Countries\Countries;

class UseraddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('useraddress.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = [];
        $countries = new Countries();
        $countries = $countries->getList();
        // dd($countries);
        return view('userAddress.create', ["cities" => $cities, "countries" => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UseraddressRequest $request)
    {
        //

        //get data from request
        // $user_id = $request['user_id'] ;
        $user_id = 1;
        // $area_id = $request['area_id'];
        $area_id = 1;

        $street = $request['street'];
        $country = $request['country'];
        $city = $request['city'];

        $floor_num = $request['floor_num'];
        $apartment_num = $request['apartment_num'];
        $request['is_primary_address'] == 'on' ? $is_primary_address = 1 : $is_primary_address = 0;

        Useraddress::create([
            'user_id' => $user_id,
            'area_id' => $area_id,
            'street' => $street,
            'city' => $city,
            'country' => $country,
            "floor_num" => $floor_num,
            "apartment_num" => $apartment_num,
            "is_primary_address" => $is_primary_address,
        ]);
        return  to_route('useraddress.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
