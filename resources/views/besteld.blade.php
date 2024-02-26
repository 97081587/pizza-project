@extends('layout')

@section('title','Dit heeft u besteld')

@section('content')
<div class="BesteldGegevens">
    <h2>Dit heeft u besteld:</h2>
    @foreach ($pizzas as $pizza)
        <div>
            <p>{{$pizza->HawaiiList}}  Stuks Pizza Hawaii 🍍🍕</p>
            <p>{{$pizza->FunghiList}} Stuks Pizza Funghi 🍄🍕</p>
            <p>{{$pizza->MargheritaList}} Stuks Pizza Margherita 🌿🍕</p>
            <p>{{$pizza->MarinaList}} Stuks Pizza Marina 🐟🍕</p>
            <p>{{$pizza->QFormaggiList}} Stuks Pizza Quattro Formaggi 🧀🍕</p>
            <p>Totaalprijs: €{{$pizza->Totaalprijs}},-</p>
            <p>Bestellen of afhalen: {{$pizza->BOA}}<p>
    @endforeach  
        @foreach ($gegevens as $gegeven)  
            <p>Besteldatum: {{$gegeven->Bdatum}}<p>
        </div>
            <h2>Uw gegevens:</h2>
            <div>         
                <p>Adres: {{$gegeven->Adres}}<p>
                <p>Postcode: {{$gegeven->Postcode}}<p>
                <p>Plaats: {{$gegeven->Plaats}}<p>
        @endforeach
    @foreach ($Users as $User)
                <p>E-mailadres: {{$User ->email}}<p>
            </div>
    @endforeach
</div>
@endsection