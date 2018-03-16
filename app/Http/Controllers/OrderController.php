<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped; // OrderShipped Class Mailable / app/Mail
use App\Order; // import Order Class Model 
use Carbon\Carbon; // import Carbon Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // import Mail Library

class OrderController extends Controller
{
    public function Orders($type='')
    {
        if($type =='pending'){ // type pending if delivered column == 0 & get that pending orders
            $orders=Order::where('delivered','0')->get(); // Check if the delivered column in orders table == 0
        }elseif ($type == 'delivered'){ // type delivered if delivered column == 1 & get that delivered orders
            $orders=Order::where('delivered','1')->get(); // Check if the delivered column in orders table == 1
        }else{
            $orders=Order::all(); // Get all orders data from Order Class Model/orders & order_product table
        }

        return view('admin.orders',compact('orders')); // Resources/views/admin/orders.blade.php
    }

    public function toggledeliver(Request $request,$orderId) // Parameter $order->id / form/orders.blade.php
    {
        $order=Order::find($orderId);

        if($request->has('delivered')){ // If checkbox is check/delivered
            $time=Carbon::now()->addMinute(1);

            Mail::to($order->user->email)->later($time,new OrderShipped($order)); // <= $order Order Model / $order->user => automatically fetch the User email who ordered

            $order->delivered=$request->delivered; // Conditional in checkbox form/ type delivered == 1 in orders table 
        }else{
            $order->delivered="0";
        }
        $order->save();

        return back(); // admin.orders
    }
}
