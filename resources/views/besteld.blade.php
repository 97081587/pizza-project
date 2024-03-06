@extends('layout')

@section('title','Dit heeft u besteld')

@section('content')
<div class="BesteldGegevens">
    <h2>Dit heeft u besteld:</h2>
    {{-- @foreach ($pizzas as $pizza) --}}
        <div>
            <p>{{$pizzas->HawaiiList}}  Stuks Pizza Hawaii 🍍🍕</p>
            <p>{{$pizzas->FunghiList}} Stuks Pizza Funghi 🍄🍕</p>
            <p>{{$pizzas->MargheritaList}} Stuks Pizza Margherita 🌿🍕</p>
            <p>{{$pizzas->MarinaList}} Stuks Pizza Marina 🐟🍕</p>
            <p>{{$pizzas->QFormaggiList}} Stuks Pizza Quattro Formaggi 🧀🍕</p>
            <p>Totaalprijs: €{{$pizzas->Totaalprijs}},-</p>
            <p>Bestellen of afhalen: {{$pizzas->BOA}}<p>
    {{-- @endforeach   --}}
        {{-- @foreach ($gegevens as $gegeven)   --}}
            <p>Besteldatum: {{$gegevens->Bdatum}}<p>
        </div>
            <h2>Uw gegevens:</h2>
            <div>         
                <p>Adres: {{$gegevens->Adres}}<p>
                <p>Postcode: {{$gegevens->Postcode}}<p>
                <p>Plaats: {{$gegevens->Plaats}}<p>
        {{-- @endforeach --}}
    @foreach ($Users as $User)
                <p>E-mailadres: {{$User ->email}}<p>
            </div>
    @endforeach
</div>
@endsection