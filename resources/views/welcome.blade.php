<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SPA tutorial by Voerro</title>
    </head>
    <body>
        <div id="app">
            <vue-layout></vue-layout>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>