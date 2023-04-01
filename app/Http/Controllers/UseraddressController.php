<?php

namespace App\Http\Controllers;

use App\Http\Requests\UseraddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Webpatser\Countries\Countries;
use App\DataTables\UserAddressDataTable;


class UseraddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserAddressDataTable $dataTable)
    {
        //
        $userAddresses = UserAddress::all();

        return $dataTable->render('user-address.index', compact('userAddresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = [];
        $countries = new Countries();
        $countries = $countries->getList();

        return view('user-address.create', ["cities" => $cities, "countries" => $countries]);
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

        $building_number = $request['building_number'];
        $floor_num = $request['floor_num'];

        $apartment_num = $request['apartment_num'];
        $request['is_primary_address'] == 'on' ? $is_primary_address = 1 : $is_primary_address = 0;

        UserAddress::create([
            'user_id' => $user_id,
            'area_id' => $area_id,
            'street' => $street,
            'city' => $city,
            'country' => $country,
            "floor_num" => $floor_num,
            'building_number' => $building_number,
            "apartment_num" => $apartment_num,
            "is_primary_address" => $is_primary_address,
        ]);
        return  to_route('user-address.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $userAddress = UserAddress::find($id);

        return view('user-address.show', compact('userAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $countries = (new Countries())->getList();
        $userAddress = UserAddress::find($id);

        return view('user-address.edit', compact('userAddress', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UseraddressRequest $request, string $id)
    {
        //
        $userAddress = UserAddress::find($id);

        $userAddress->update($request->all());

        return redirect()->route('user-address.index')
            ->with('success', 'User address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $userAddress = UserAddress::find($id);

        $userAddress->delete();

        return redirect()->route('user-address.index')
            ->with('success', 'User address deleted successfully.');
    }
}