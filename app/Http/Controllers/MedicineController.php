<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine.index');
    }
    public function create()
    {
        return view('medicine.create');
    }
    public function store()
    {
    }

    public function edit()
    {
        return view('medicine.edit');
    }

    public function update()
    {
    }

    public function destroy()
    {
      
    }
   
    public function restore()
    {
    }
}
