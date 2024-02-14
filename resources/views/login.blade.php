@extends('layout')

@section('title', "Registreren")

<?php

$Email = '';
$Wachtwoord = '';

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $Email = $_POST['Email'];
    $Wachtwoord = $_POST['Wachtwoord'];
}
?>
@section('content')
<div class=formulier>
    <form method='POST' action="/verwerkenlogin">
      @csrf
      <div name="Email">
        <label for="Email">E-mailadres:</label>
        <br>
        <input type="text" id="Email" name="Email"
            placeholder="E-mailadres" value="" required>
        <br>
    </div>
        <div name="Wachtwoord">
          <label for="Wachtwoord">Wachtwoord:</label>
          <br>
          <input type="password" id="Wachtwoord" name="Wachtwoord"
              placeholder="Wachtwoord" value="" required>
          <br>
        </div>
        <br>
        <button>Voltooien</button>
    </form>
  </div>
  @endsection