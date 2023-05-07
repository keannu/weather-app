<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Weather App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}" media="all">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body style="background-color: #4B515D;">
        <div id="index">
            
        </div>
    </body>
    <footer>
        <script type="text/javascript" src="{{ mix('/js/app.js') }}" charset="utf-8"></script>
    </footer>
</html>
