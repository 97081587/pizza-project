@extends('layout')

@section('title', "Registreren")

<?php

$email = '';
$password = '';

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
}
?>
@section('content')
@auth
  <form method='POST' action="/uitgelogd">
    @csrf
    <button>Uitloggen</button>
  </form>
@else
<div class=formulierRegistreren>
    <form method='POST' action="/registreren">
      @csrf
      <div>
        <label for="email">E-mailadres:</label>
        <br>
        <input type="text" name="RegiEmail"
            placeholder="E-mailadres" required>
        <br>
    </div>
        <div>
          <label for="password">Wachtwoord:</label>
          <br>
          <input type="password" name="RegiPassword"
              placeholder="Wachtwoord" required>
          <br>
        </div>
        <div>
          <label for="password">Bevestig uw achtwoord:</label>
          <br>
          <input type="password" name="RegiPassword"
              placeholder="Bevestig uw wachtwoord" required>
          <br>
        </div>
      <br>
  <button>Registreren</button>      
</div>
  <form method='POST' action="/ingelogd">
    @csrf
      <div>
        <label for="email">E-mailadres:</label>
        <br>
        <input type="text" name="email"
          placeholder="E-mailadres" required>
        <br>
      </div>
    <div>
      <label for="password">Wachtwoord:</label>
      <br>
      <input type="password" name="password"
          placeholder="Wachtwoord" required>
      <br>
    </div>
    <br>
      <button>Inloggen</button>
  </form>
@endauth
@endsection