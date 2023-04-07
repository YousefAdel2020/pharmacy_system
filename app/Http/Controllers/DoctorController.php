<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class DoctorController extends Controller
{
    use HasRoles;
    public function index(DoctorsDataTable $doctorTable)
    {
        $user = Auth::user();
        
        if ($user->hasRole('admin')) {
            $doctors = Doctor::with('pharmacy')->get();
        } else {
            $doctors = Doctor::where('pharmacy_id', $user->id)->with('pharmacy')->get();
        }

        $update = null;
        $delete = null;
        $banned = null;
        $unbanned = null;
        return $doctorTable->render('doctors.index', compact(
            'doctors',
            'update',
            'delete',
            'banned',
            'unbanned'
        ));
    }

    public function show($id)
    {
        $doctor = Doctor::where('id', $id)->with('pharmacy')->first();
        if (!$doctor) {
            abort(404);
        }
        return view('doctors.show')->with('doctor', $doctor);
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(StoreDoctorRequest $request)
    {
        $creator = Auth::user();
        $input = $request->only(['name','password','email','national_id','avatar']);

        $path = null;
        if (isset($input['avatar'])) {
            $path = $request->file('avatar')->store('public/images');
            $path = str_replace('public', 'storage', $path);
        }

        $password = $request->password;
        $verifiedPassword = $request->password2;
        if ($password != $verifiedPassword) {
            return redirect()->back()->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }


        if ($creator->typeable_type == "App\Models\Pharmacy") {
            $pharmacy = Pharmacy::where('email', $creator->email)->first();
        }

        $doctorCreate = Doctor::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password'=> Hash::make($password),
            'national_id' => $input['national_id'],
            'avatar'=> $path,
            'is_banned'=> false,
            'pharmacy_id' => (isset($pharmacy)) ? $pharmacy->id : null,
        ]);

        $check = $this->validate($request, [
             'name' => 'required',
             'email' => 'required|unique:users,email',
             'password' => 'required|max:255|min:6',
         ]);

        if ($doctorCreate) {
            $user = User::create([
                'name'=> $check['name'],
                'email'=> $check['email'],
                'password' => Hash::make($check['password']),
                'typeable_id'=> $doctorCreate->id,
                'typeable_type'=> 'app\Models\Doctor'
            ]);
        }

        if (!$user) {
            return redirect()->back()->withErrors(['Error' => 'Failed to register user']);
        }
        
        $user = $user->refresh();
        $doctor=$doctorCreate->refresh();

        $doctor->type()->save($user);
        $user->assignRole('doctor');

        return redirect()->route('doctors.index')->with('create', $doctorCreate);
    }

    public function edit($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        if (!$doctor) {
            abort(404);
        }
        return view('doctors.edit')->with('doctor', $doctor);
    }

    public function update(UpdateDoctorRequest $request, $id)
    {
        $input = $request->only(['name','email','avatar']);

        $doctorFind = Doctor::find($id);

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('public/images');
            $path = str_replace('public', 'storage', $path);

            $doctorFind->update([
                'avatar'=> $path
            ]);
        }

        $oldDoctorEmail = $doctorFind->email;

        $doctorFind->update([
            'name'=> $input['name'],
            'email'=> $input['email'],
        ]);

        $user = User::where('email', $oldDoctorEmail)->first();
        $user->update([
            'name'=> $input['name'],
            'email'=> $input['email'],
        ]);

        if (!$user) {
            return redirect()->back()->withErrors(['Error' => 'Failed to register user']);
        }
        
        $user = $user->refresh();
        $doctor=$doctorFind->refresh();

        $doctor->type()->save($user);
        return back();
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $user = User::where('email', $doctor->email)->first();
        $deleted = $doctor->delete();
        $userDelete = $user->delete();
        if (!$userDelete) {
            return redirect()->back()->withErrors(['Error' => 'Failed to delete user']);
        }
        return redirect()->route('doctors.index')->with('delete', $deleted);
    }
}
