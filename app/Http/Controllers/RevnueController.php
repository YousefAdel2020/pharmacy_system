<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\DataTables\RevenueDataTable;


class RevnueController extends Controller
{
     public function index(RevenueDataTable $dataTable)
    {
        $pharmacies=Pharmacy::all();
         return $dataTable->render('revenue.index',[
            'pharmacies' => $pharmacies,
            ]);
    }   
}
