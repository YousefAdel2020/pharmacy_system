<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
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
