<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta name="description" content="Laravel el. parduotuvė">
    <meta name="keywords" content="Laravel, el. parduotuvė, portfolio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel el. parduotuvė</title>

    <!-- Google Font -->
    

    <!-- Css Styles -->

</head>

<body>

@component('mail::message')

**Užsakymo id:** {{ $order->id }}<br>
**Užsakymo data:** {{ $order->created_at->format('Y/m/d') }}<br><br><br>

**Kliento informacija:** <br>
                                         
**Pristatymo adresas:** {{ $order->bil_adress}}, {{ $order->bil_city}}<br>
**El. paštas:** {{ $order->bil_email}} <br>
**Tel:** {{ $order->bil_phone}}<br><br>




@foreach($order->products as $product)
**Užsakytos prekės:**<br>
**Preke:** {{ $product->name }}<br>
**Nuotrauka:** <img src="{{ asset("/storage/$product->image")}}" width="80px" height="80px"><br>
**Kiekis:** 

@endforeach

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
I svetaine
@endcomponent

Gunakan kode tagihan tersebut untuk membayar tagihan.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
