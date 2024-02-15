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
<div class=formulier>
    <form method='POST' action="/ingelogd">
      @csrf
      <div name="email">
        <label for="email">E-mailadres:</label>
        <br>
        <input type="text" id="email" name="email"
            placeholder="E-mailadres" value="" required>
        <br>
    </div>
        <div name="password">
          <label for="passwood">Wachtwoord:</label>
          <br>
          <input type="password" id="passwoord" name="password"
              placeholder="Wachtwoord" value="" required>
          <br>
        </div>
        <br>
        <button>Voltooien</button>
    </form>
  </div>
  @endsection