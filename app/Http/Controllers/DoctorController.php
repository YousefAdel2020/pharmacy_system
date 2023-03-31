<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index(DoctorsDataTable $doctorTable)
    {
        $doctors = Doctor::get();
        return $doctorTable->render('doctor.index', compact('doctors'));
    }

    public function show($id)
    {
        return view('doctor.show');
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function store()
    {
    }

    public function edit($id)
    {
        return view('doctor.edit');
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}
