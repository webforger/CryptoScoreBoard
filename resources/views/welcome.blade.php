<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csr-token" content="{{ csrf_token() }}">
        <title>Trading Wars</title>
        <link href="{{ asset('/frontapp/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('/frontapp/js/app.js') }}"></script>
    </body>
</html>
