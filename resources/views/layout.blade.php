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
            @auth
                <div class="emailHome">{{Auth::user()->email}}</div>  
            @endauth
        </div>     
            <nav>
                <ul class=nav2>
                    <li><a href="/">Aanbiedingen</a></li>
                   <li><a href="#over">Over pizza di mama</a></li>
                   <li><a href="#winkels">Winkels </a></li>
                   <li><a href="#werken">Werken bij </a></li>
                   <li><a href="/login">Login/registreren</a></li>
                </ul>
            </nav>        
        @yield('content')
    </body>
<footer class=footer>
    <p>Oscar Li 2023</p>
</footer>
</html>