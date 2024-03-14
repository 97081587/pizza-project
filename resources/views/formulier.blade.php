@extends('layout')

@section('title',"formulier")

<?php
$adres = '';
$Pcode = '';
$plaats = '';

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
}
?>

@section('content')
<div class=formulier>
    <form method='POST' action="/allesverwerken">
     @csrf 
      <div name="adres">
        <label for="adres">Adres:</label>
        <br>
        <input type="text" id="adres" name="adres"
            placeholder="Adres" value="" required>
        <br>
      </div>
        <div name="postcode">
          <label for="Pcode">Postcode:</label>
          <br>
          <input type="text" id="pcode" name="postcode"
              placeholder="Postcode" maxlength="12" value="" required>
          <br>
        </div>
      <div name="plaats">
            <label for="Plaats">Plaats:</label>
            <br>
            <input type="text" id="plaats" name="plaats"
                placeholder="Plaats" maxlength="85" value="" required>
            <br>
      </div>
      <br>
      <button class ="voltooi">Voltooien</button>
    </form>
</div>
@endsection