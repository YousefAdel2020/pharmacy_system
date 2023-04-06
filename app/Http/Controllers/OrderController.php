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
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Client;
use App\Models\OrderMedicine;

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
        $clients=Client::all();
        $doctors = Doctor::all();
        $medicines = Medicine::all();
        $pharmacy = Pharmacy::all();
        $userAddresses=Useraddress::all();
        return view('orders.create' ,['users'=>$users , 'medicines'=>$medicines , 'pharmacy'=>$pharmacy , 'doctors'=>$doctors,'clients'=>$clients,'userAddresses'=>$userAddresses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

      

        $client_id=$request->client_id;
        $doctor_id=$request->doctor_id;
        $pharmacy_id=$request->Pharmacy_id;
        $status = 'processing';
        $is_insured=$request->is_insured;

        $medicine_ids=$request->medicine_ids;
        $qty=$request->qty;

       

        $orderTotalPrice=0;

        for($i = 0 ; $i<count($medicine_ids);$i++){
            $medicine = Medicine::find($medicine_ids[$i]);
      
         $orderTotalPrice+=(intval($medicine->price)*$qty[$i]);
        }


        $order = Order::create([
            'ordered_by_id' => $client_id,
           
            'doctor_id' => $doctor_id,
            'is_insured' => $is_insured,
            'status' => $status,
            'pharmacy_id' => $pharmacy_id, 
            'total_price'=>$orderTotalPrice
        ]);


        foreach ($medicine_ids as $key => $value) {

            $order->medicines($value)->attach($value, ['quantity' => $qty[$key]]);
        }

    

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
    public function edit( $id)
    {
        $users = User::all();
        $clients = Client::all();
        $doctors = User::Role('Admin')->get();
        $pharmacy = Pharmacy::all();
        $order = Order::find($id);
        return view('orders.edit', ['order' => $order, 'clients' => $clients, 'pharmacy' => $pharmacy, 'doctors' => $doctors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request,  $id)
    {
        $order=Order::findorFail($id);
        $is_insured = $request->is_insured;
        $client_id = $request->client_id;
        $status=$request->status;
        $pharmacy_id=$request->pharmacy_id;

        if(!isset($client_id))
        {
            $client_id=$order->ordered_by_id;
        }
        if(!isset($is_insured))
        {
            $is_insured=$order->is_insured;
        }
        if(!isset($pharmacy_id))
        {
            $pharmacy_id=$order->pharmacy_id;
        }
        

        $order->update([
            'status'=>$status,
            'is_insured' => $is_insured,
            'ordered_by_id' => $client_id,
            'pharmacy_id'=>$pharmacy_id,

        ]);

        return to_route('orders.index');
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
