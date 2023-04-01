<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index(DoctorsDataTable $doctorTable)
    {
        $doctors = Doctor::with('pharmacy')->get();
        $update = null;
        $delete = null;
        return $doctorTable->render('doctors.index', compact('doctors', 'update', 'delete'));
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
        $input = [
            'name' => $request->name,
            'national_id'=> $request->national_id,
            'email'=> $request->email,
            'password' => $request->password,
            'avatar'=> $request->avatar,
            'pharmacy_id'=> $creator
        ];
        $validated = $request->input($input);
        $password = $request->password;
        $verifiedPassword = $request->password2;
        if ($password !== $verifiedPassword) {
            return redirect()->back()->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }
        $doctorCreate = Doctor::create($input);
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

    public function update(StoreDoctorRequest $request, $id)
    {
        $input = $request->only(['name','password']);
        $password = $request->password;
        $verifiedPassword = $request->password2;
        if ($password !== $verifiedPassword) {
            return redirect()->back()->withErrors(['password_confirmation' => 'The password confirmation does not match.']);
        }
        $doctorUpdate = Doctor::where('id', $id)->update([
            'name'=> $request->name,
            'password'=> $password
        ]);
        return redirect()->route('doctors.index')->with('update', $doctorUpdate);
    }

    public function destroy($id)
    {
    }
}
