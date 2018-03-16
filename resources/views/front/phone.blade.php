@extends('layouts.main')

@section('title','Phone')

@section('content')
<br/><br/>
   
    <div style="padding-bottom: 102px;" class="row">
    
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{url('images',$phone->image)}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h3 class="subheader">
                     <a href="{{url('/phone',$phone->id)}}"> <!--- Will be redirected to phone.blade.php -->
                        <h6 class="phone-name">
                            {{$phone->name}}
                        </h6>
                    </a>
                  <p class="phone-price">
                       <span class="price">PHP</span> {{$phone->price}}
                    </p>
                </h3>
                <p>
                    Description: {{$phone->description}}
                </p>
                <div class="row">
                    <div class="large-12 columns">
                        <a href="{{route('cart.addItem',$phone->id)}}" class="button">Add to Cart</a>
                    </div>
                </div>
                <p class="text-left subheader">
                    <small>* Designed by <a href="#">Jesse Jay</a></small>
                </p>

            </div>
        </div>
       
    </div>
    
@endsection