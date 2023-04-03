<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAddressRequest;
use App\Models\Address;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Api\UpdateAddressRequest;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index () {

        $userId = Auth::user()->id;
        $userAddresses = User::find($userId)->addresses;
        return new AddressResource($userAddresses);

    }
     public function store (StoreAddressRequest $request){

        $userId = Auth::user()->id;
        $previousAddressIsPrim = Address::where('user_id',$userId)->where('is_primary_address', 1)->first();
        if ( $request->input('is_primary_address') == 1 && !empty($previousAddressIsPrim) ) {
            $previousAddressIsPrim->is_primary_address = 0;
            $previousAddressIsPrim->save();
        }
        Address::create([
            'street' => $request->street,
            'apartment_num' => $request->apartment_num,
            'floor_num' => $request->floor_num,
            'is_primary_address' => $request->is_primary_address,
            'area_id' => $request->area_id,
            'user_id' => Auth::user()->id,
            'client_id' => Auth::user()->id,
        ]);

    }
    public function show (Address $address) {
        if (!$address->id){
            return response()->json(["message" => "This User does not have any addresses"],404);
        }
        else {
        return new AddressResource($address);
        }
    }
    public function update (Address $address , UpdateAddressRequest $request){

        if(!$address->id) {
            return response()->json(["message" => "This Address does not exists"],404);
        }
        else {
            $userId = Auth::user()->id;
            $previousAddressIsPrim = Address::where('user_id',$userId)->where('is_primary_address', 1)->first();
            if ( $request->input('is_primary_address') == 1 && !empty($previousAddressIsPrim) ) {
                $previousAddressIsPrim->is_Prim = 0;
                $previousAddressIsPrim->save();
            }
            $address->update([
            'street' => $request->street,
            'apartment_num' => $request->apartment_num,
            'floor_num' => $request->floor_num,
            'is_primary_address' => $request->is_primary_address,
            'area_id' => $request->area_id,
            'user_id' => Auth::user()->id,
            'client_id' => Auth::user()->id,
        ]);

        }
    }
     public function destroy (Address $address) {
        if (!$address->id) {
            return response()->json(["message" => "This address does not exists for this user"],404);
        }
        else{
            $address->delete();
        }
    }
}
