@extends('layout')

@section('title', "Registreren")

<?php

$RegiEmail = '';
$RegiPassword = '';

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $RegiEmail = $_POST['RegiEmail'];
    $RegiPassword = $_POST['RegiPassword'];
}
?>
@section('content')
@auth
  <form method='POST' action="/uitgelogd">
    @csrf
    <button>Uitloggen</button>
  </form>
@else
<div class=formulierRegistrerenEnInloggen>
    <div class="1">
      <form method='POST' action="/registreren">
        @csrf
        <h2>Registreren</h2>
        <div>
          <label for="email">E-mailadres:</label>
          <br>
          <input type="text" name="RegiEmail" placeholder="E-mailadres">
          <br>
        </div>
          <div>
            <label for="password">Wachtwoord:</label>
            <br>
            <input type="password" name="RegiPassword" placeholder="Wachtwoord">
            <br>
          </div>
          {{-- <div>
            <label for="password">Bevestig uw achtwoord:</label>
            <br>
            <input type="password" name="RegiPassword"
                placeholder="Bevestig uw wachtwoord">
            <br>
          </div> --}}
        <br>
        <button>Registreren</button>
      </form>
    </div>
    <br>
  <div class="2">      
    <form method='POST' action="/ingelogd">
      @csrf
      <h2>Inloggen</h2>
        <div>
          <label for="email">E-mailadres:</label>
          <br>
          <input type="text" name="email" placeholder="E-mailadres">
          <br>
        </div>
      <div>
        <label for="password">Wachtwoord:</label>
        <br>
        <input type="password" name="password" placeholder="Wachtwoord">
        <br>
      </div>
      <br>
        <button>Inloggen</button>
    </form>
  </div>
</div>
@endauth
@endsection