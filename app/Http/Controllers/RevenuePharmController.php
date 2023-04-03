<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\RevenuePharmDataTable;
use App\Models\Pharmacy;



class RevenuePharmController extends Controller
{
    public function index(RevenuePharmDataTable $dataTable)
    {
        $pharmacies=Pharmacy::all();

        
        return $dataTable->render('revenuepharm.index' ,[
            'pharmacies' => $pharmacies,
            ]);
    }
}
