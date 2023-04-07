<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Support\Facades\Storage;
use App\Jobs\PruneOldPostsJob;
use App\Http\Middleware\Authenticate;
use App\DataTables\PharmaciesDataTable;
use App\Http\Requests\StorePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class PharmacyController extends Controller
{
    use HasRoles;
    public function index(PharmaciesDataTable $pharamcyTable)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $pharmacies  = Pharmacy::with('area')->get();
        } else {
            $pharmacies = Pharmacy::where('area_id', $user->id)->get();
        }
        $update = null;
        $delete = null;
        $restore = null;

        return $pharamcyTable->render('pharmacy.index', compact(
            'pharmacies',
            'update',
            'delete',
            'restore',

        ));
    }
    public function create()
    {
        $areas = Area::all();

        return view('pharmacy.create', ["areas" => $areas]);
    }
    public function show($id)
    {
        $pharmacy = Pharmacy::where('id', $id)->with('area')->first();
        if (!$pharmacy) {
            abort(404);
        }
        return view('pharmacies.show')->with('pharmacy', $id);


        // $this->authorize('view',$id);
        // return view('pharmacy.show', [
        //   'pharmacy' => $id
        //  ]);
    }

    public function store(StorePharmacyRequest $request)
    {
        $creator = Auth::user();
        $input = $request->only(['name', 'password', 'email', 'national_id', 'avatar', 'area_id']);
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
            'password' => Hash::make($password),
            'national_id' => $input['national_id'],
            'avatar' => $path,
            'is_deleted' => false,
            'area_id' => 1,

        ]);
        $check = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|max:255|min:6',
        ]);
        $user = User::create([
            'name' => $check['name'],
            'email' => $check['email'],
            'password' => Hash::make($check['password']),
            'typeable_id' => $pharmacyCreate->id,
            'typeable_type' => 'app\Models\Pharmacy'
        ]);
        if (!$user) {
            return redirect()->back()->withErrors(['Error' => 'Failed to register user']);
        }

        $user = $user->refresh();
        $pharmacy = $pharmacyCreate->refresh();

        $pharmacy->type()->save($user);
        $user->assignRole('pharmacy');
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
        return view('pharmacy.edit')->with('pharmacy', $pharmacy);
    }

    public function update(UpdatePharmacyRequest $request, $id)
    {
        $input = $request->only(['name', 'email', 'avatar']);

        $pharmacyFind = Pharmacy::find($id);

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('public/images');
            $path = str_replace('public', 'storage', $path);

            $pharmacyFind->update([
                'avatar' => $path
            ]);
        }

        $pharmacyFind->update([
            'name' => $input['name'],
            'email' => $input['email'],

        ]);
        $user = User::where('id', $pharmacyFind->id)->update([
            'name' => $input['name'],
            'email' => $input['email'],
        ]);
        if (!$user) {
            return redirect()->back()->withErrors(['Error' => 'Failed to register user']);
        }
        $user = $user->refresh();
        $pharmacy = $pharmacyFind->refresh();

        $pharmacy->type()->save($user);


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
    public function trash()
    {
        $pharmacies = Pharmacy::onlyTrashed()->all();
        $data = compact('pharmacies');
        return view('pharmacies.trash')->with($data);
    }
}
