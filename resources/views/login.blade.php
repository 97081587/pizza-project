@extends('layout')

@section('title', "Registreren")

<?php

$Uname = '';
$Wachtwoord = '';

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $Uname = $_POST['gebruikersnaam'];
    $Wachtwoord = $_POST['Wachtwoord'];
}
?>
@section('content')
<div class=formulier>
    <form method='POST' action="/">
      @csrf
        <div name="naam">
          <label for="fname">Gebruikersnaam:</label>
          <br>
          <input type="text" id="fname" name="Gebruikersnaam"
              placeholder="Gebruikersnaam" value="" required>
          <br>
      </div>
        <div name="adres">
          <label for="adres">Wachtwoord:</label>
          <br>
          <input type="text" id="adres" name="Wachtwoord"
              placeholder="Wachtwoord" value="" required>
          <br>
        </div>
        <br>
        <button>Voltooien</button>
    </form>
  </div>
  @endsection