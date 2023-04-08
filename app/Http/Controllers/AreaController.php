<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAreaRequest;
use App\Models\Area;
use App\Models\Country;
use Illuminate\Http\Request;
use Webpatser\Countries\Countries;
use App\DataTables\AreaDataTable;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AreaDataTable $dataTable)
    {
        //
        $areas = Area::all();

        return $dataTable->render('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = (new Countries())->getList();
        return view('areas.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateAreaRequest $request)
    {
        //


        Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $area = Area::find($id);
        if (!$area) {
            abort(404);
        }

        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $countries = (new Countries())->getList();

        $area = Area::find($id);

        $countries = (new Countries())->getList();
        return view('areas.edit', compact('area', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateAreaRequest $request, string $id)
    {
        //



        $area = Area::find($id);
        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $area = Area::find($id);

        $area->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Area deleted successfully');
    }

    public function fetchArea($id)
    {
        $data = Country::find($id)->area;
        return response()->json($data);
    }
}
