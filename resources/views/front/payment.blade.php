@extends('layouts.main')

@section('content')
<div class="container">

	 <div style="padding: 150px 430px;">
	    <div style="border: 1px solid teal;padding: 50px;border-width: 10px;">
	    <h3 class="text-center">Thank you for your order</h3>
        <img style="padding-left: 5px;" src="../images/stripeimage.jpg">
        <br/>
		<form style="padding-left: 60px;" action="{{route('payment.store')}}" method="POST">
		{{csrf_field()}}
		  <script
		    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		    data-key="pk_test_k0c9Sz0iSI7VKS4pYTLoI7a2"
		    data-amount= {{Cart::total()*100}}
		    data-currency="php"
		    data-name="Stripe.com"
		    data-description="Widget"
		    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		    data-locale="auto"
		    data-zip-code="true">
		  </script>
		</form>
		</div>
	 </div>

</div>
   
@endsection