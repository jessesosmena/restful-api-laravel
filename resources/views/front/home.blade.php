@extends('layouts.main') <!--*** This content will be bind from layouts/main.blade.php ***-->

@section('content')
    <section style="border-bottom: #333;" class="hero text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>
            <strong>
                
            </strong>
        </h2>
        <br><br/><br/><br/><br/>
        <a href="{{route('phones')}}"> <!--*** /phones FrontController@phones ***-->
            <button class="button medium">See All Phones Here</button>
        </a>
    </section>
    <br/>
    <div class="subheader text-center">
        <h3>
            Itm Mobile Shop
        </h3>
    </div>

    <!-- Latest Phones -->
    <div class="row latest-phones">
        @forelse($phones->chunk(4) as $chunk) <!--- chunk limits fetch data -->
            @foreach($chunk as $phone)
            <div class="small-3 medium-3 large-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.addItem',$phone->id)}}"> 
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{url('images',$phone->image)}}"/>
                        </a>
                    </div>
                    <a href="{{url('/phone',$phone->id)}}"> <!---*** FrontController@phone ***-->
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
            @endforeach
        @empty
            <h3>No Items</h3>
        @endforelse
    </div>

    <!-- Footer -->
    <br>
@endsection