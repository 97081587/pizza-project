@extends('layout')

@section('title',"formulier")

<?php
$adres = '';
$Pcode = '';
$plaats = '';
$Bdatum = '';
$newDate = date ('l', strtotime($Bdatum));

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $Bdatum = $_POST['Bdatum'];
}
?>
@section('content')
<div class=formulier>
    @auth
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
      <div name="Bdatum">
            <label for="Bdatum">Bestel/afhaal datum:</label>
            <br>
            <input type="date" id="Bdatum" name="Bdatum"  min="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <br>
      <button>Voltooien</button>
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
</div>
@endsection