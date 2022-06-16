<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
           
        </style>
        {{-- importo il file css con bootstrap --}}
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/admin') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content">
                {{-- Pagina in construzione --}}
                {{-- root di vue cli --}}
                <div id="root"></div>
            </div>
        </div>

         {{-- Richiamare il javascript con dentro vue --}}
         <script src=" {{ asset( 'js/front.js' ) }} "></script>
         {{-- Richiamare il javascript con dentro bootstrap grazie a webpack --}}
         <script src=" {{ asset( 'js/app.js' ) }} "></script>
    </body>
</html>
