<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart; // import Cart library
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\Auth; // import Authenticated User

class Order extends Model
{
    protected $fillable=['total','delivered']; // delivered => 1 == true 0 == false

    public function user()
    {
        return $this->belongsTo(User::class); // Relationship / Get & put Authenticated User id to orders table user_id
    }

    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total')->withTimeStamps(); // Define relationship of Order Model & Product Model / Many to many Relationships/Pivot table => order_product_table fetches both Order & Product Model data withPivot if you want to define/insert additional column
    }

    public static function createOrder(){
        $user=Auth::user();  // The User who logged in
        $order=$user->orders()->create([  // Find & Store User's total order of products with his id to orders table 
            'total'=>Cart::total(), // Cart function 
            'delivered'=>0 // check if delivered boolean method
        ]);

        $cartItems=Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id,[ // Fetch Products/All Cart Content of that User with user_id / $cartItem->id => to product_id in order_product table
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }
  }

}
