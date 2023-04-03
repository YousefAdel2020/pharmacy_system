<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;
use Spatie\Permission\Traits\HasRoles;

class DoctorController extends Controller
{
    use HasRoles;
    public function index(DoctorsDataTable $doctorTable)
    {
        $doctors = Doctor::with('pharmacy')->get();
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
        $path = $request->file('avatar')->store('public/images');
        $path = str_replace('public', 'storage', $path);

        $password = $request->password;
        $verifiedPassword = $request->password2;
        if ($password != $verifiedPassword) {
            return redirect()->back()->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }
        $doctorCreate = Doctor::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password'=> Hash::make($password),
            'national_id' => $input['national_id'],
            'avatar'=> $path,
            'is_banned'=> false,
            'pharmacy_id' => 2,
        ]);

        $check = $this->validate($request, [
             'name' => 'required',
             'email' => 'required|unique:users,email',
             'password' => 'required|max:255|min:6',
         ]);


        $user = User::create([
            'name'=> $check['name'],
            'email'=> $check['email'],
            'password' => Hash::make($check['password']),
            'typeable_id'=> $doctorCreate->id,
            'typeable_type'=> 'app\Models\Doctor'
        ]);

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

        $doctorFind->update([
            'name'=> $input['name'],
            'email'=> $input['email'],
        ]);

        $user = User::where('id', $doctorFind->id)->update([
            'name'=> $input['name'],
            'email'=> $input['email'],
        ]);

        if (!$user) {
            return redirect()->back()->withErrors(['Error' => 'Failed to register user']);
        }
        
        $user = $user->refresh();
        $doctor=$doctorFind->refresh();

        $doctor->type()->save($user);

        return redirect()->route('doctors.index')->with('update', $doctorFind);
    }

    public function destroy($id)
    {
        $deleted = Doctor::where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('delete', $deleted);
    }
}
