@extends('layout')

@section('title',"formulier")

<?php
$adres = '';
$Pcode = '';
$plaats = '';
$Bdatum = '';
$Totaalprijs ='';
//$newDate = date ('l', strtotime($Bdatum));

// dit gaat naar de DB
if(isset($_POST['submit'])){
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $Bdatum = $_POST['Bdatum'];
    $Totaalprijs = $_POST['Totaalprijs'];
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
      <div name="Bdatum">
            <label for="Bdatum">Bestel/afhaal datum:</label>
            <br>
            <input type="date" id="Bdatum" name="Bdatum"  min="<?php echo date("Y-m-d"); ?>" required>
            <?php
              if ($Bdatum == 1||'Monday') {
                  //maandagprijs();
              }
            
             if (($Bdatum == 4||'Friday') && $Totaalprijs > 20) {
                  $Totaalprijs = $Totaalprijs - 15 * ($Totaalprijs / 100);
                  echo "<script>alert($Bdatum);</script>";
              echo "<script>alert($Totaalprijs);</script>";
              }
            ?>
      </div>
      <br>
      <button class ="voltooi">Voltooien</button>
    </form>
</div>
@endsection