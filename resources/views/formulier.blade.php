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

<script>
  if (Bdatum == 'monday') {
    PrijsPHawaii = <?php echo $PrijsPHawaii; ?>;
    PrijsPFunghi = <?php echo $PrijsPFunghi; ?>;
    PrijsPMargherita = <?php echo $PrijsPMargherita; ?>;
    PrijsPMarina = <?php echo $PrijsPMarina; ?>;
    PrijsPQFormaggi = <?php echo $PrijsPQFormaggi; ?>;

    PrijsPHawaii = 7.5;
    PrijsPFunghi = 7.5;
    PrijsPMargherita = 7.5;
    PrijsPMarina = 7.5;
    PrijsPQFormaggi = 7.5;
  }

 if (Bdatum == 'Friday' && Totaalprijs > 20) {
      Totaalprijs = Totaalprijs - 15 * (Totaalprijs / 100);
      document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
      //waarde
      document.getElementById('Kosten2').value = Totaalprijs.toFixed(2);
  }
</script>

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
      <div name="Bdatum">
            <label for="Bdatum">Bestel/afhaal datum:</label>
            <br>
            <input type="date" id="Bdatum" name="Bdatum"  min="<?php echo date("d-m-Y"); ?>" required>
      </div>
      <br>
      <button class ="voltooi">Voltooien</button>
    </form>
</div>
@endsection