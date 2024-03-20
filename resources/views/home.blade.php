@extends('layout')

@section('title', "👩‍🍳Pizza di mama's official website 🍕🍕🍕")

<?php
//Dit is voor de prijzen op maandag en vrijdag
$PrijsPHawaii = 11.5;
$PrijsPFunghi = 12.5;
$PrijsPMargherita = 12.5;
$PrijsPMarina = 12.5;
$PrijsPQFormaggi = 14.5;

$PrijsPizzasMA = 7.5;

$Bdatum = '';

$newDate = date('l', strtotime('Today'));

// if ($newDate == 'Monday') {
//         $PrijsPMargherita = $PrijsPizzasMA;
//         $PrijsPFunghi = $PrijsPizzasMA;
//         $PrijsPMarina = $PrijsPizzasMA;
//         $PrijsPHawaii = $PrijsPizzasMA;
//         $PrijsPQFormaggi = $PrijsPizzasMA;
//     }

$RegiEmail = '';
$RegiPassword = '';

// dit gaat naar de controller
if (isset($_POST['Submit'])) {
    $BOA = $_POST['BOA'];
    $HawaiiList = $_POST['HawaiiList'];
    $FunghiList = $_POST['FunghiList'];
    $MargheritaList = $_POST['MargheritaList'];
    $MarinaList = $_POST['MarinaList'];
    $QFormaggiList = $_POST['QFormaggiList'];
    $Totaalprijs = $_POST['Totaalprijs'];
    $RegiEmail = $_POST['RegiEmail'];
    $RegiPassword = $_POST['RegiPassword'];
    $Bdatum = $_POST['Bdatum'];
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
    PizzaArray = [];
    AantalArray = [];
    let bezorging = false;


        function bestellenHawaii() {
            HawaiiList = document.getElementById('HawaiiList').value;
            document.getElementById('HawaiiPlek').innerHTML = HawaiiList + " Stuks Pizza Hawaii 🍍🍕";
            totaalprijsHawaii = HawaiiList * PrijsPHawaii;
            AantalArray["HawaiiList"] = HawaiiList * 1;
            PizzaArray["totaalprijsHawaii"] = totaalprijsHawaii;
            berekenTotaal();
        }

        function bestellenFunghi() {
            FunghiList = document.getElementById('FunghiList').value;
            document.getElementById('FunghiPlek').innerHTML = FunghiList + " Stuks Pizza Funghi 🍄🍕";
            totaalprijsFunghi = FunghiList * PrijsPFunghi;
            AantalArray["FunghiList"] = FunghiList * 1;
            PizzaArray["totaalprijsFunghi"] = totaalprijsFunghi;
            berekenTotaal();
        }

        function bestellenMargherita() {
            MargheritaList = document.getElementById('MargheritaList').value;
            document.getElementById('MargheritaPlek').innerHTML = MargheritaList + " Stuks Pizza Margherita 🌿🍕";
            totaalprijsMargherita = MargheritaList * PrijsPMargherita;
            AantalArray["MargheritaList"] = MargheritaList * 1;
            PizzaArray["totaalprijsMargherita"] = totaalprijsMargherita;
            berekenTotaal();
        }

        function bestellenMarina() {
            MarinaList = document.getElementById('MarinaList').value;
            document.getElementById('MarinaPlek').innerHTML = MarinaList + " Stuks Pizza Marina 🐟🍕";
            totaalprijsMarina = MarinaList * PrijsPMarina;
            AantalArray["MarinaList"] = MarinaList * 1;
            PizzaArray["totaalprijsMarina"] = totaalprijsMarina;
            berekenTotaal();
        }

        function bestellenQFormaggi() {
            QFormaggiList = document.getElementById('QFormaggiList').value;
            document.getElementById('QFormaggiPlek').innerHTML = QFormaggiList + " Stuks Pizza Quattro Formaggi 🧀🍕";
            totaalprijsQFormaggi = QFormaggiList * PrijsPQFormaggi;
            AantalArray["QFormaggiList"] = QFormaggiList * 1;
            PizzaArray["totaalprijsQFormaggi"] = totaalprijsQFormaggi;
            berekenTotaal();
        }

        function berekenTotaal() {
            var Bdatum = document.getElementById('Bdatum');
            var Bdatum2 = new Date(Bdatum.value);
            if(Bdatum2.getDay() === 5){
                newDate = 'Friday'
                //alert(newDate)
            } else if(Bdatum2.getDay() === 1){
                newDate = 'Monday'
                //alert(newDate)
            } else {
                newDate = 'Today'
            }
           // alert(newDate)
            //alert(PizzaArray.length);
            // alert(totaalprijsHawaii)

            //totaalpijs
            let totaalprijsPerPizza = 0;
            Object.values(PizzaArray).forEach(value => {
                totaalprijsPerPizza += value;
            });
            Totaalprijs = totaalprijsPerPizza;

            //aantal pizzas
            let totaalAantalPerPizza = 0;
                Object.values(AantalArray).forEach(value => {
                    totaalAantalPerPizza += value;
                });
            totaalAantalPizza = totaalAantalPerPizza;
            //alert(totaalAantalPizza);

            //vrijdag
            if (newDate == 'Friday' && Totaalprijs > 20) {
                Totaalprijs = Totaalprijs - 15 * (Totaalprijs / 100);
                document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
                //waarde
                document.getElementById('Kosten2').value = Totaalprijs.toFixed(2);
            }

            //maandag
            if(newDate == 'Monday'){
                Totaalprijs = totaalAantalPizza * 7.5
                //alert(totaalAantalPizza)
                document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
                //waarde
                document.getElementById('Kosten2').value = Totaalprijs.toFixed(2);
            }
            // alert(Totaalprijs);

            if (bezorging) {
                Totaalprijs += 5;
            }
            document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
            //waarde
            document.getElementById('Kosten2').value = Totaalprijs.toFixed(2);
        }

        function bezorgkosten(boa) {
            if (boa === 'bezorgen') {
                bezorging = true;
            } else if (boa === 'afhalen') {
                bezorging = false;
            }
            berekenTotaal();

            document.getElementById('Kosten').innerHTML = "Totaalprijs: €" + Totaalprijs.toFixed(2) + ",-";
            //waarde
            document.getElementById('Kosten2').value = Totaalprijs.toFixed(2);
        }
</script>

@section('content')
<div>
    <div class="home">
        @auth
        <form method="POST" action="/verwerkenpizza" class="home">
            @csrf
            <ul class="pizza" name="pizza">
                <li class="hawaii">
                    <img src="{{ asset('images/hawaii.png') }}" alt="pizza hawaii" width="180" height="180">
                    <p>Pizza Hawaii</p>
                    <?php echo '€' . $PrijsPHawaii . '0,-'; ?>
                    <select id="HawaiiList" name="HawaiiList" onchange="bestellenHawaii()">
                        <option selected>0</option>
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
                <li class="funghi">
                    <img src="{{ asset('images/funghi.png') }}" alt="pizza funghi" width="180" height="180">
                    <p>Pizza Funghi</p>
                    <?php echo '€' . $PrijsPFunghi . '0,-'; ?>
                    <select id="FunghiList" name="FunghiList" onchange="bestellenFunghi()">
                        <option selected>0</option>
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
                <li class="margherita">
                    <img src="{{ asset('images/margherita.png') }}" alt="pizza margherita" width="180"
                        height="180">
                    <p>Pizza Margherita</p>
                    <?php echo '€' . $PrijsPMargherita . '0,-'; ?>
                    <select id="MargheritaList" name="MargheritaList" onchange="bestellenMargherita()">
                        <option selected>0</option>
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
                <li class="marina">
                    <img src="{{ asset('images/marina.png') }}" alt="pizza marina" width="180" height="180">
                    <p>Pizza Marina</p>
                    <?php echo '€' . $PrijsPMarina . '0,-'; ?>
                    <select id="MarinaList" name="MarinaList" onchange="bestellenMarina()">
                        <option selected>0</option>
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
                <li class="QF">
                    <img src="{{ asset('images/QF.png') }}" alt="pizza Quattro Formaggi" width="180"
                        height="180">
                    <p>Pizza Quattro Formaggi</p>
                    <?php echo '€' . $PrijsPQFormaggi . '0,-'; ?>
                    <select id="QFormaggiList" name="QFormaggiList" onchange="bestellenQFormaggi()">
                        <option selected>0</option>
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
            <div class="lijst">
                <div name="Bdatum"> 
                        <label for="Bdatum">Bestel/afhaal datum:</label>
                        <br>
                        <input type="date" id="Bdatum" name="Bdatum" oninput="berekenTotaal()" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>" required>
                </div>
                    <div class="dropdownNumbers">
                        <div id="HawaiiPlek">
                        </div>
                        <div id="FunghiPlek">
                        </div>
                        <div id="MargheritaPlek">
                        </div>
                        <div id="MarinaPlek">
                        </div>
                        <div id="QFormaggiPlek">
                    </div>
            </div>
                <div class="veldbot">
                    <div id="Kosten" name="Totaalprijs1">
                    </div>
                    <input name="Totaalprijs" id="Kosten2" type="hidden">
                        <div class="BOA" name="BOA" id="BOA">
                            <label>
                                <input type="radio" id="afhalen" name="BOA" value ="afhalen"
                                    onchange="bezorgkosten('afhalen')" checked>Afhalen</input>
                            </label>
                            <label>
                                <input type="radio" id="bezorgen" name="BOA" value ="bezorgen"
                                    onchange="bezorgkosten('bezorgen')">Bezorgen (+ €5)</input>
                            </label>
                        </div>
                    <button class ="button1" type="submit">Afrekenen</button>
                </div>
            </div>
        </form>
    </div>
 @else
    <script>
        function registreer() {
            alert("Login of registreer aub");
        }
    </script>

        <div class="home">
            <ul class="pizza" name="pizza">
                <li class="hawaii">
                    <img src="{{ asset('images/hawaii.png') }}" alt="pizza hawaii" width="180" height="180">
                    <p>Pizza Hawaii</p>
                    <?php echo '€' . $PrijsPHawaii . '0,-'; ?>
                    <select id="HawaiiList" name="HawaiiList" onclick="registreer()">
                        <option selected disabled hidden>0</option>
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
                <li class="funghi">
                    <img src="{{ asset('images/funghi.png') }}" alt="pizza funghi" width="180" height="180">
                    <p>Pizza Funghi</p>
                    <?php echo '€' . $PrijsPFunghi . '0,-'; ?>
                    <select id="FunghiList" name="FunghiList" onclick="registreer()">
                        <option selected disabled hidden>0</option>
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
                <li class="margherita">
                    <img src="{{ asset('images/margherita.png') }}" alt="pizza margherita" width="180"
                        height="180">
                    <p>Pizza Margherita</p>
                    <?php echo '€' . $PrijsPMargherita . '0,-'; ?>
                    <select id="MargheritaList" name="MargheritaList" onclick="registreer()">
                        <option selected disabled hidden>0</option>
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
                <li class="marina">
                    <img src="{{ asset('images/marina.png') }}" alt="pizza marina" width="180" height="180">
                    <p>Pizza Marina</p>
                    <?php echo '€' . $PrijsPMarina . '0,-'; ?>
                    <select id="MarinaList" name="MarinaList" onclick="registreer()">
                        <option selected disabled hidden>0</option>
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
                <li class="QF">
                    <img src="{{ asset('images/QF.png') }}" alt="pizza Quattro Formaggi" width="180"
                        height="180">
                    <p>Pizza Quattro Formaggi</p>
                    <?php echo '€' . $PrijsPQFormaggi . '0,-'; ?>
                    <select id="QFormaggiList" name="QFormaggiList" onclick="registreer()">
                        <option selected disabled hidden>0</option>
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
            <div class="lijst">
                <div name="Bdatum"> 
                    <label for="Bdatum">Bestel/afhaal datum:</label>
                    <br>
                    <input type="date" id="Bdatum" name="Bdatum" oninput="registreer()" min="<?php echo date("Y-m-d")?>" required>
                </div>
                <div class="dropdownNumbers">
                    <div id="HawaiiPlek">
                    </div>
                    <div id="FunghiPlek">
                    </div>
                    <div id="MargheritaPlek">
                    </div>
                    <div id="MarinaPlek">
                    </div>
                    <div id="QFormaggiPlek">
                    </div>
                </div>
                <div class="veldbot">
                    <div id="Kosten" name="Totaalprijs">
                    </div>
                    <input name="Totaalprijs" type="hidden">
                    <div class="BOA" name="BOA" id="BOA">
                        <input type="radio" id="afhalen" name="BOA" value ="afhalen"
                            onclick="registreer()" checked>Afhalen</input>
                        <label>
                            <input type="radio" id="bezorgen" name="BOA" value ="bezorgen"
                            onclick="registreer()">Bezorgen (+ €5)</input>
                        </label>
                    </div>
                    <button class ="button1" type="submit"onclick="registreer()">Afrekenen</button>
                </div>
            </div>
        </div>        
     @endauth
</div>
@endsection
