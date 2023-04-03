<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\DataTables\PharmaciesDataTable;
use App\Http\Requests\StorePharmacyRequest;

use App\Http\Requests\UpdatePharmacyRequest;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Jobs\PruneOldPostsJob;

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
    public function show($id)
    {
       
       
        $this->authorize('view',$id);
        return view('pharmacy.show', [
            'pharmacy' => $id
        ]);
    }
   
    public function store(StorePharmacyRequest $request)
    {
        $creator = Auth::user();
        $input = $request->only(['name','password','email','national_id','avatar']);
        $path = $request->file('avatar')->store('public/images');
        $path = str_replace('public', 'storage', $path);

        $password = $request->password;
        $verifiedPassword = $request->password2;
        if ($password != $verifiedPassword) {
            return redirect()->back()->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }
        $pharmacyCreate = Pharmacy::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password'=> $password,
            'national_id' => $input['national_id'],
            'avatar'=> $path,
            'is_deleted'=> false,
            
        ]);
        return redirect()->route('pharmacies.index')->with('create', $pharmacyCreate);
    }

    public function edit($id)
    {
        //$pharmacy = Pharmacy::findorFail($id);
        //return view('pharmacy.edit', ['pharmacy' => $pharmacy]);
        $pharmacy = Pharmacy::where('id', $id)->first();
        if (!$pharmacy) {
            abort(404);
        }
        return view('pharmacies.edit')->with('pharmacy', $pharmacy);
  
    }

    public function update(UpdatePharmacyRequest $request, $id)
    {
        $input = $request->only(['name','email','avatar']);

        $pharmacyFind = Pharmacy::find($id);

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('public/images');
            $path = str_replace('public', 'storage', $path);

            $pharmacyFind->update([
                'avatar'=> $path
            ]);
        }

        $pharmacyFind->update([
            'name'=> $input['name'],
        ]);
        return redirect()->route('pharmacies.index')->with('update', $pharmacyFind);
    }

    public function destroy($id)
    {

        $deleted = Pharmacy::where('id', $id)->delete();
        return redirect()->route('pharmacies.index')->with('delete', $deleted);
    }
   /////////////////////////////////

 public function Softdelete(Pharmacy $pharmacy, Request $request)
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
    public function restore(Pharmacy $pharmacy, Request $request)
    {
        $pharmacy = Pharmacy::withTrashed()->find($pharmacy);
        $pharmacy->restore();
        return redirect()->route('pharmacies.index');
    }

}
