<?php

namespace App\Http\Controllers;

use App\DataTables\MedicinesDataTable;
use App\Http\Requests\StoreMedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(MedicinesDataTable $dataTable)
    {
        $medicines = Medicine::orderBy('id', 'ASC')->paginate(5);
        return $dataTable->render('medicine.index', compact('medicines'));
    }
    public function create()
    {
       
        
        return view('medicine.create');
    }
    public function store(StoreMedicineRequest $request)
    {
        $name = $request->name;
        $price = $request->price;
        $type = $request->type;
        $description = $request->description;


        Medicine::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'type' => $type,


        ]);

        return to_route('medicines.index');
    }

    public function edit($id)
    {
        $medicine = Medicine::findorFail($id);
        return view('medicine.edit', ['medicine' => $medicine]);
    }

    public function update(StoreMedicineRequest $request, $id)
    {
        $name = $request->name;
        $price = $request->price;
        $type = $request->type;
        $description = $request->description;

        $medicine = Medicine::findorFail($id);

        $medicine->update([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'type' => $type
        ]);


        return to_route('medicines.index');
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'medicine deleted successfully');
    }

    public function restore()
    {
    }



//     public function checkout()
//     {
//         \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

//         $products = Product::all();
//         $lineItems = [];
//         $totalPrice = 0;
//         foreach ($products as $product) {
//             $totalPrice += $product->price;
//             $lineItems[] = [
//                 'price_data' => [
//                     'currency' => 'usd',
//                     'product_data' => [
//                         'name' => $product->name,
//                         'images' => [$product->image]
//                     ],
//                     'unit_amount' => $product->price * 100,
//                 ],
//                 'quantity' => 1,
//             ];
//         }
//         $session = \Stripe\Checkout\Session::create([
//             'line_items' => $lineItems,
//             'mode' => 'payment',
//             'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
//             'cancel_url' => route('checkout.cancel', [], true),
//         ]);

//         return redirect($session->url);
// }

}
