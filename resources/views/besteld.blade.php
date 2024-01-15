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
     <p>BOA: {{ $pizza->BOA }}</p>
 @endforeach
@endsection