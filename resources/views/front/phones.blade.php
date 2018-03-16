@extends('layouts.main')

@section('title','Mobile Phones')
@section('content')
<br/>

    <div style="padding-bottom: 39px;" class="row">
        @forelse($phones as $phone)
            <div class="small-3 medium-3 large-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <!--- cart.addItem/CartController function addItem + product id -->
                        <a href="{{route('cart.addItem',$phone->id)}}"> 
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{url('images',$phone->image)}}"/> 
                        </a>

                    </div>
                    <a href="{{url('/phone',$phone->id)}}"> <!--- Will be redirected to phone.blade.php -->
                        <h6 class="phone-name">
                            {{$phone->name}}
                        </h6>
                    </a>
                    <p class="phone-price">
                       <span class="price">PHP</span> {{$phone->price}}
                    </p>
                    <p>
                        {{$phone->description}}
                    </p>
                </div>
            </div>

        @empty
        <h3>No Items Available</h3>
       @endforelse
    </div>
    <br />
    <br /> 
@endsection