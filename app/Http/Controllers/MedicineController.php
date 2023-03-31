<?php

namespace App\Http\Controllers;

use App\DataTables\MedicinesDataTable;
use App\Http\Requests\StoreMedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(MedicinesDataTable $dataTable )
    {
        $medicines = Medicine::orderBy('id', 'ASC')->paginate(5);
        return $dataTable->render('medicine.index',compact('medicines'));
        
    }
    public function create()
    {
        return view('medicine.create');
    }
    public function store(StoreMedicineRequest $request)
    {
        $name=$request->name;
        $price=$request->price;
        $description=$request->description;


        Medicine::create([
            'name'=>$name,
            'description'=>$description,
            'price'=>$price,
            
            
        ]);

        return to_route('medicines.index');
        
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
