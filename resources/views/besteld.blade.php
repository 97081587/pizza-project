@extends('layout')

@section('title','Dit heeft u besteld')

@section('content')
<p>Dit heeft u besteld:</p>
    @foreach ($pizzas as $pizza)
        <p>{{$pizza->HawaiiList}}</p>
        <p>{{$pizza->FunghiList}}</p>
        <p>{{$pizza->MargheritaList}}</p>
        <p>{{$pizza->MarinaList}}</p>
        <p>{{$pizza->QFormaggiList}}</p>
    @endforeach
        @foreach ($pizzas as $pizza)
            <p>Bestellen of afhalen: {{}}<p>
        @endforeach  
        @foreach ($items as $item)      
            <p>Besteldatum: {{}}<p>
        @endforeach
        <p>Uw gegevens:</p>
            @foreach ($items as $item)
                <p>Naam: {{}}<p>
                <p>Adres: {{}}<p>
                <p>Postcode: {{}}<p>
                <p>Plaats: {{}}<p>
            @endforeach
@endsection