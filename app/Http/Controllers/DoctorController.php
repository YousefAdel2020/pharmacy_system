<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorsDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index(DoctorsDataTable $doctorTable)
    {
        $user = Auth::user();
        dd($user);
        return view('doctor.index');
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
