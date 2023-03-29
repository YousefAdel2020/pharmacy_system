<?php

namespace App\Http\Controllers;
use App\Jobs\PruneOldPostsJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PharmacyController extends Controller
{
    public function index()
    {
        return view('pharmacy.index');
    }
    public function create()
    {
        return view('pharmacy.create');
    }
    public function store()
    {
    }

    public function edit()
    {
        return view('pharmacy.edit');
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
      
    }
   
    public function restore($id)
    {
    }
}
