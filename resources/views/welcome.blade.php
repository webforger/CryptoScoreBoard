<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csr-token" content="{{ csrf_token() }}">
        <title>Trading Wars</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{ asset('/frontapp/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('/frontapp/js/app.js') }}"></script>
    </body>
</html>
