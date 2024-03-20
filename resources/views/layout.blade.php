<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="faviconPizza.ico">
    <link rel="stylesheet" href="{{ URL::asset ('css/pizza2.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="top">
            <div>
                <h1>👩‍🍳 Pizza di mama. 🍕</h1>
                <h2 class=est>Est. 2022 "la migliore pizza fatta in casa."</h2> 
            </div>  
        </div>     
            <nav>
                <ul class=nav2>
                    <li><a href="/">Aanbiedingen</a></li>
                   <li><a href="#over">Over pizza di mama</a></li>
                   <li><a href="#winkels">Winkels </a></li>
                   <li><a href="#werken">Werken bij </a></li>
                   <div class="dropdown">
                    <button class="dropbtn">Inloggen/Registreren
                    </button>
                    <div class="inloggen-registreren">
                        @auth
                        <div class="emailHome">{{Auth::user()->email}}</div>  
                        <form method='POST' action="/uitgelogd">
                            @csrf
                            <br>
                            <div>
                            <button class="Uitloggen">Uitloggen</button>
                            </div>
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
                  </div> 
                </ul>
            </nav>        
        @yield('content')
    </body>
<footer class=footer>
    <p>Oscar Li 6/10/2023-20/3/2024</p>
</footer>
</html>