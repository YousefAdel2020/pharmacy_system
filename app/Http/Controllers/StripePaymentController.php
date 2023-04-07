<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe($id)
    {
         $order=Order::findOrFail($id);
        return view('stripes.stripe',compact("order"));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$id)
    {

        $order=Order::findOrFail($id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => intval($order->total_price),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "payment for our pharmacy." 
        ]);
      
        $order->update([
            'status' => 5
        ]);

        Session::flash('success', 'Payment successful!');
              
        return to_route('orders.confirm',['order'=>$order]);
    }
}
