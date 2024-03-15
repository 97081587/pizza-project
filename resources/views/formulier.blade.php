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
          <label>Adres:
          <br>
          <input type="text" id="adres" name="adres"
              placeholder="Adres" value="" required>
          </label>
        <br>
      </div>
        <div name="postcode">
            <label>Postcode:
            <br>
            <input type="text" id="pcode" name="postcode"
                placeholder="Postcode" maxlength="12" value="" required>
            </label>
          <br>
        </div>
      <div name="plaats">
              <label>Plaats:
              <br>
              <input type="text" id="plaats" name="plaats"
                  placeholder="Plaats" maxlength="85" value="" required>
              </label>
            <br>
      </div>
      <br>
      <button class ="voltooi">Voltooien</button>
    </form>
</div>
@endsection