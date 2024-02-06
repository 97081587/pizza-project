@extends('layout')

@section('title',"👩‍🍳Pizza di mama's official website 🍕🍕🍕", Auth::user())

<?php
$Totaalprijs = '';
//Dit is voor de prijzen op maandag en vrijdag
$PrijsPHawaii = 11.50;
$PrijsPFunghi = 12.50;
$PrijsPMargherita = 12.50;
$PrijsPMarina = 12.50;
$PrijsPQFormaggi = 14.50;

$PrijsPMargheritaMA = 7.50;
$PrijsPFunghiMA = 7.50;
$PrijsPMarinaMA = 7.50;
$PrijsPHawaiiMA = 7.50;
$PrijsPQFormaggiMA = 7.50;

$newDate = date ('l', strtotime('Today'));
if ($newDate == 'Monday') {
    $PrijsPMargherita = $PrijsPMargheritaMA;
    $PrijsPFunghi = $PrijsPFunghiMA;
    $PrijsPMarina = $PrijsPMarinaMA;
    $PrijsPHawaii = $PrijsPHawaiiMA;
    $PrijsPQFormaggi = $PrijsPQFormaggiMA;
} 

// dit gaat naar de controller
if(isset($_POST['Submit'])){
    $BOA = $_POST['BOA'];
    $HawaiiList = $_POST['HawaiiList'];
    $FunghiList = $_POST['FunghiList'];
    $MargheritaList = $_POST['MargheritaList'];
    $MarinaList = $_POST['MarinaList'];
    $QFormaggiList = $_POST['QFormaggiList'];
    $Totaalprijs = $_POST['Totaalprijs'];
}
?>

<!--dit is voor de dropdown op de home & prijs berekenen !-->
<script>
    PrijsPHawaii = <?php echo $PrijsPHawaii; ?>;
    PrijsPFunghi = <?php echo $PrijsPFunghi; ?>;
    PrijsPMargherita = <?php echo $PrijsPMargherita; ?>;
    PrijsPMarina = <?php echo $PrijsPMarina; ?>;
    PrijsPQFormaggi = <?php echo $PrijsPQFormaggi; ?>;
    Totaalprijs = 0;
    newDate = "<?php echo $newDate; ?>";
    
        function bestellenHawaii(){
            HawaiiList = document.getElementById('HawaiiList').value;
            document.getElementById('HawaiiPlek').innerHTML =  HawaiiList + " Stuks Pizza Hawaii 🍍🍕";
            totaalprijsHawaii = HawaiiList * PrijsPHawaii;
            berekenTotaal(totaalprijsHawaii);
        }

        function bestellenFunghi(){
            FunghiList = document.getElementById('FunghiList').value;
            document.getElementById('FunghiPlek').innerHTML =  FunghiList + " Stuks Pizza Funghi 🍄🍕";
            totaalprijsFunghi = FunghiList * PrijsPFunghi;
            berekenTotaal(totaalprijsFunghi);
        }

        function bestellenMargherita(){
            MargheritaList = document.getElementById('MargheritaList').value;
            document.getElementById('MargheritaPlek').innerHTML =  MargheritaList + " Stuks Pizza Margherita 🌿🍕";
            totaalprijsMargherita = MargheritaList * PrijsPMargherita;
            berekenTotaal(totaalprijsMargherita);
        }

        function bestellenMarina(){
            MarinaList = document.getElementById('MarinaList').value;
            document.getElementById('MarinaPlek').innerHTML =  MarinaList + " Stuks Pizza Marina 🐟🍕";
            totaalprijsMarina = MarinaList * PrijsPMarina;
            berekenTotaal(totaalprijsMarina);
        }

        function bestellenQFormaggi(){
            QFormaggiList = document.getElementById('QFormaggiList').value;
            document.getElementById('QFormaggiPlek').innerHTML =  QFormaggiList + " Stuks Pizza Quattro Formaggi 🧀🍕";
            totaalprijsQFormaggi = QFormaggiList * PrijsPQFormaggi;
            berekenTotaal(totaalprijsQFormaggi); 
        }

    function berekenTotaal (totaalprijsPizza) {
        Totaalprijs = totaalprijsHawaii;
        // for (i = 0; i < HawaiiList; i++) {
            
        // }
        //Totaalprijs = totaalprijsHawaii + totaalprijsFunghi + totaalprijsMargherita + totaalprijsMarina + totaalprijsQFormaggi;
        
        document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-"; 

        if (newDate == 'Friday' && Totaalprijs > 20) {
            Totaalprijs = Totaalprijs - 15 * (Totaalprijs / 100);
            document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
        } 
    }

    function bezorgkosten(boa) {
        if (boa === 'bezorgen') {
            Totaalprijs += 5;
        } else if (boa === 'afhalen') {
            Totaalprijs -= 5;
        }
        document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
    }

</script>

@section('content')
<div class = home>
    <form method="POST" action="/verwerkenpizza" class="home">
        @csrf
        <ul class = pizza name = pizza>
            <li class = hawaii>
                <img src="{{ asset('images/pizza_hawaii2.webp') }}" alt="pizza hawaii" width="180" height="180">
                <p>Pizza Hawaii</p>
                <?php echo "€" .$PrijsPHawaii ."0,-"?>
                <select id="HawaiiList" name="HawaiiList" onchange="bestellenHawaii()">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </li>
            <li class = funghi> 
                <img src="{{ asset('images/Pizza_funghi.webp') }}" alt="pizza funghi" width="180" height="180">
                <p>Pizza Funghi</p>
                <?php echo "€" .$PrijsPFunghi ."0,-"?>
                <select id="FunghiList" name="FunghiList" onchange="bestellenFunghi()">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </li>
            <li class = margherita>
                <img src="{{ asset('images/pizza_margherita2.webp') }}" alt="pizza margherita" width="180" height="180">
                <p>Pizza Margherita</p>
                <?php echo "€" .$PrijsPMargherita ."0,-"?>
                <select id="MargheritaList" name="MargheritaList" onchange="bestellenMargherita()">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </li>
            <li class = marina>
                <img src="{{ asset('images/pizza_marina.jpg') }}" alt="pizza marina" width="180" height="180">
                <p>Pizza Marina</p>
                <?php echo "€" .$PrijsPMarina ."0,-"?>
                <select id="MarinaList" name="MarinaList" onchange="bestellenMarina()">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </li>
            <li class = QF>
                <img src="{{ asset('images/pizza_QF.jpg') }}" alt="pizza Quattro Formaggi" width="180" height="180" >
                <p>Pizza Quattro Formaggi</p>
                <?php echo "€" .$PrijsPQFormaggi ."0,-"?>
                <select id="QFormaggiList" name="QFormaggiList" onchange="bestellenQFormaggi()">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </li>
        </ul>
            <div class = lijst>
                <div class = dropdownNumbers>
                    <div id = HawaiiPlek>
                    </div>
                        <div id = FunghiPlek>
                        </div>
                            <div id = MargheritaPlek>
                            </div>
                        <div id = MarinaPlek>
                        </div>
                    <div id = QFormaggiPlek>
                    </div>
                </div>      
                <div class = veldbot>
                    <div id="Kosten" name="Totaalprijs">
                    </div> 
                    <div class = BOA name = BOA id = BOA>
                        <input type="radio" id="afhalen" name="BOA" value ="afhalen" onchange="bezorgkosten('afhalen')" checked>Afhalen</input>
                        <label>
                            <input type="radio" id="bezorgen" name="BOA" value ="bezorgen" onchange="bezorgkosten('bezorgen')">Bezorgen (+ €5)</input>
                        </label>
                    </div> 
                <button class ="button1" type="submit">Afrekenen</button>
            </div>
        </div>
    </form>
</div>    
@endsection