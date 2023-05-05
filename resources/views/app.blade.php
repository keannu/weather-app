<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Weather App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" media="all">
    </head>
    <body class="antialiased">
        <div id="index">
            
        </div>
    </body>
    <footer>
        <script type="text/javascript" src="{{ mix('/js/app.js') }}" charset="utf-8"></script>
    </footer>
</html>
