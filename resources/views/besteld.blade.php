@extends('layout')

@section('title','Dit heeft u besteld')

@section('content')
<div>
    <p>Dit heeft u besteld:</p>
    @foreach ($pizzas as $pizza)
        <p>{{$pizza->HawaiiList}}  Stuks Pizza Hawaii 🍍🍕</p>
        <p>{{$pizza->FunghiList}} Stuks Pizza Funghi 🍄🍕</p>
        <p>{{$pizza->MargheritaList}} Stuks Pizza Margherita 🌿🍕</p>
        <p>{{$pizza->MarinaList}} Stuks Pizza Marina 🐟🍕</p>
        <p>{{$pizza->QFormaggiList}} Stuks Pizza Quattro Formaggi 🧀🍕</p>
        <P>Totaalprijs: €{{$pizza->Totaalprijs}},-</p>
        <p>Bestellen of afhalen: {{$pizza->BOA}}<p>
    @endforeach  
        @foreach ($users as $user)      
            <p>Besteldatum: {{$user->Bdatum}}<p>
            <p>Uw gegevens:</p>
            <p>Naam: {{$user->Naam}}<p>
            <p>Adres: {{$user->Adres}}<p>
            <p>Postcode: {{$user->Postcode}}<p>
            <p>Plaats: {{$user->Plaats}}<p>
        @endforeach
</div>
@endsection