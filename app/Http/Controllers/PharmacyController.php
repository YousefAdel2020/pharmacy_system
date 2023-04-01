<?php

namespace App\Http\Controllers;

use App\DataTables\PharmaciesDataTable;
use App\Jobs\PruneOldPostsJob;
use App\Http\Requests\StorePharmacyRequest;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PharmacyController extends Controller
{
    public function index(PharmaciesDataTable $dataTable)
    {
        $pharmacies = Pharmacy::orderBy('id', 'ASC')->paginate(5);
        return $dataTable->render('pharmacy.index', compact('pharmacies'));
    }
    public function create()
    {
        return view('pharmacy.create');
    }
    public function show(Pharmacy $pharmacy)
    {
       
       
        $this->authorize('view', $pharmacy);
        return view('pharmacy.show', [
            'pharmacy' => $pharmacy
        ]);
    }
   
    public function store(StorePharmacyRequest $request)
    {
        $avatar =  $request->avatar;
        $pharmacy_name = $request->pharmacy_name;
        $email = $request->email;
        $national_id= $request->national_id;
       
        Pharmacy::create([
            'avatar' =>  $avatar,
            'pharmacy_name' => $pharmacy_name,
            'email' => $email,
            'national_id' => $national_id,


        ]);
        return to_route('pharmacies.index');

    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::findorFail($id);
        return view('pharmacy.edit', ['pharmacy' => $pharmacy]);
    }

    public function update(StorePharmacyRequest $request, $id)
    {
        $avatar =  $request->avatar;
        $pharmacy_name = $request->pharmacy_name;
        $email = $request->email;
        $national_id= $request->national_id;
       
        $medicine = Pharmacy::findorFail($id);

        $medicine->update([
            'avatar' =>  $avatar,
            'pharmacy_name' => $pharmacy_name,
            'email' => $email,
            'national_id' => $national_id,

        ]);


        return to_route('pharmacies.index');
    }

    public function destroy($id)
    {
        $pharmacy = Pharmacy::find($id);
        $pharmacy->delete();
        return redirect()->route('pharmacies.index')->with('success', 'pharmacy deleted successfully');
    }
   //////////////////

/*  public function softdelete(Pharmacy $pharmacy)
    {    
        $pharmacy->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
        // return redirect()->route('pharmacies.index');
    }
    public function readsoftdelete()
    {
        $pharmacies = Pharmacy::onlyTrashed()
                    ->get();
        return view('pharmacy.softdelete', [
            'deletedPharmacies' => $pharmacies
        ]);
    }
    public function restore(Request $request)
    {
        $pharmacy = Pharmacy::onlyTrashed()->where('id', $request->pharmacy);
        $pharmacy->restore();
        return redirect()->route('pharmacies.index');
    }*/

}
