@extends('layouts.main')

@section('content')
    <div style="padding-bottom: 234px;padding-top: 80px;" class="row">
        <h3>Items</h3>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Items</th>
                <th>qty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->price}}</td>
                    <td>{{$cartItem->description}}</td>

                    <td>
                        {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!} <!---*** $cartItem->rowId is product id ***-->
                        <input style="width: 60px;" name="qty" type="text" value="{{$cartItem->qty}}">
                    </td>
                    <td>
                        <input style="float: left"  type="submit" class="button success small" value="Ok">
                        {!! Form::close() !!}

                        <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST"> <!--***- $cartItem->rowId is product id ***-->
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input class="button small alert" type="submit" value="Delete">
                         </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td>
                    Tax: <span style="font-size: 13px;">PHP</span> {{Cart::tax()}} <br> <!---*** Change tax rate % go to cart.php in vendor with the name tax ***-->
                    Sub Total: <span style="font-size: 13px;">PHP</span> {{Cart::subtotal()}} <br>
                    Total: <span style="font-size: 13px;">PHP</span> {{Cart::total()}}
                </td>
                <td>
                    Items: {{Cart::count()}}
                </td>
                <td></td>
                <td></td>
            </tr>

            </tbody>
        </table>

        <a href="{{route('checkout.shipping')}}" class="button">Checkout</a> <!--- Redirect to CheckoutController function shipping -->
    </div>

@endsection