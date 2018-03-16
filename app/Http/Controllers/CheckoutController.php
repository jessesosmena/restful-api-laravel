<?php

namespace App\Http\Controllers;

use App\Order; // import Order Class Model
use Gloudemans\Shoppingcart\Facades\Cart; // import Cart library/aliases
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // import Auth 

class CheckoutController extends Controller
{
    
    public function shipping()
    {
        return view('front.shipping-info'); // resources/views/front/shipping-info.blade.php
    }

    public function payment()
    {
        return view('front.payment');
    }

    public function storePayment(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_Oqg9OZlUoDxmAMaA5SzBxIw9");

        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $_POST['stripeToken'];

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => Cart::total()*100, // Amount in cents
          "currency" => "php",
          "description" => "Example charge",
          "source" => $token,
        ));

        order::createOrder();  // Order Model createOrder function

        return redirect()->route('home'); // <-- / uri redirect to FrontController/index --> resources/views/front/home.blade.php
    }

}
