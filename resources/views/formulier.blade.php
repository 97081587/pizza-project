@extends('layout')

@section('title',"formulier")

<?php

$fname = '';
$adres = '';
$Pcode = '';
$plaats = '';
$Bdatum = '';
$newDate = date ('l', strtotime($Bdatum));

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $Fname = $_POST['naam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $Bdatum = $_POST['Bdatum'];
}
?>
@section('content')
<div class=formulier>
  <form method='POST' action="{{url('/besteld1')}}">
    @csrf
      <div name="naam">
        <label for="fname">Voornaam:</label>
        <br>
        <input type="text" id="fname" name="fname"
            placeholder="Voornaam" value="" required>
        <br>
    </div>
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
          <input type="text" id="pcode" name="pcode"
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
      <div name="Bdatum">
            <label for="Bdatum">Bestel/afhaal datum:</label>
            <br>
            <input type="date" id="Bdatum" name="Bdatum"  min="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <br>
      <button>Voltooien</button>
  </form>
</div>
@endsection