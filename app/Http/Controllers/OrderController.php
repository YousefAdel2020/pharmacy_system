<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Useraddress;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use App\DataTables\OrdersDataTable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrdersDataTable $dataTable)
    {

        $orders = Order::all();
        $medicines = Medicine::all();
        return $dataTable->render('orders.index', compact('orders', 'medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        // $doctors = User::Role('Admin')->get();
        $doctors = Doctor::all();
        $medicines = Medicine::all();
        $pharmacy = Pharmacy::all();
        return view('orders.create', ['users' => $users, 'medicines' => $medicines, 'pharmacy' => $pharmacy, 'doctors' => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        $user = Auth::user();
        //$useradd = UserAddress::find($request->delivering_address); //===needs the user address
        $doctor = null;
        $status = 'Processing';

        if ($user->hasRole('doctor')) {
            $doctor = Doctor::find($user->typeable_id);
            $creator = 'doctor';
            $pharmacy = Pharmacy::find($doctor->pharmacy_id);
            $doctor = $doctor->id;
        } elseif ($user->hasRole('pharmacy')) {
            $creator = 'pharmacy';
            $pharmacy = Pharmacy::find($user->typeable_id);
        } else {
            $creator = 'admin';
            $pharmacy = 1;  // needs the pirorty logic 
            $status = 'New';
        }


        $doctor = Auth::user()->typeable_id;


        $order = Order::create([
            'user_id' => $request->user_id,
            //'useraddress_id' => $request->delivering_address, //===needs the user address
            'doctor_id' => $doctor,
            'is_insured' => $request->is_insured ? $request->is_insured : 0,
            'status' => $status,
            'pharmacy_id' => $pharmacy, // needs the pirorty logic
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $doctors = User::Role('Admin')->get();
        $pharmacy = Pharmacy::all();
        $order = Order::find($id);
        return view('orders.edit', ['order' => $order, 'users' => $users, 'pharmacy' => $pharmacy, 'doctors' => $doctors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    public function assignOrderToPharmacy($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            // Handle case where order does not exist
        }

        $order->status = 'Assigned';
        $order->save();

        // Other logic for assigning order to a pharmacy
    }
}
