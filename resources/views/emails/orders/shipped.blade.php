@component('mail::message') <!--- php artisan make:mail OrderShipped _ _markdown=emails.orders.shipped -->
# Order Shipped

Order has been shipped.
Your total price {{$order->total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
