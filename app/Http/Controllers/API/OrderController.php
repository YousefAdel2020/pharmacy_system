<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->order ?? Order::all();
        return OrderResource::collection($orders);
    }
     public function show(Order $order)
    {

        return new OrderResource($order);
    }
    public function store(StoreOrderRequest $request)
    {
        $order = $request->validate();
        $order = Order::Create([

            'status'=> $order['status'],
            'is_insured'=> $order['is_insured'],
            'user_id'=> Auth::user()->id,

        ]);
        if ($request->hasFile('prescription')) {


            $files = $request->file('prescription');

            foreach ($files as $file) {

                $path = $file->store('order-'.$order->id , ['disk'=>'prescription']);

                Prescription::Create([
                    'order_id'=> $order->id ,
                    'path'=> $path,
                ]);
            }
        }
        return new OrderResource($order);
    }
    public function update(StoreOrderRequest $request , Order $order)
    {
        if ($order->status == 'New') {

            if ($request->hasFile('prescription')){

                $directory = 'order-'.$order->id;
                Storage::disk('prescription')->deleteDirectory($directory);

                $files = $request->file('prescription');

                foreach ($files as $file) {

                    $path = $file->store('order-'.$order->id, ['disk'=>'prescription']);

                    $order->prescription()->delete();

                    Prescription::Create([
                        'order_id'=> $order->id ,
                        'path'=> $path,
                    ]);
                }
            }

            $order->update([
                'status'=> $request->status,
            ]);

            return new OrderResource($order);
        }

        return response()->json(['message'=>"your order is ".$order->status." you cant change it"] , 406);
    }
}
