@extends('layout')

@section('title','Dit heeft u besteld')

@section('content')
<p>Dit heeft u besteld:</p>
    @foreach ($pizzas as $pizza)
        <p>{{$pizza->HawaiiList}}  Stuks Pizza Hawaii 🍍🍕</p>
        <p>{{$pizza->FunghiList}} Stuks Pizza Funghi 🍄🍕</p>
        <p>{{$pizza->MargheritaList}} Stuks Pizza Margherita 🌿🍕</p>
        <p>{{$pizza->MarinaList}} Stuks Pizza Marina 🐟🍕</p>
        <p>{{$pizza->QFormaggiList}} Stuks Pizza Quattro Formaggi 🧀🍕</p>
        <p>Bestellen of afhalen: {{$pizza->BOA}}<p>
    @endforeach  
        @foreach ($users as $user)      
            <p>Besteldatum: {{$user}}<p>
            <p>Uw gegevens:</p>
            <p>Naam: {{$user}}<p>
            <p>Adres: {{$user}}<p>
            <p>Postcode: {{$user}}<p>
            <p>Plaats: {{$user}}<p>
        @endforeach
@endsection