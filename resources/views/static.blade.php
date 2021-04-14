<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csr-token" content="{{ csrf_token() }}">
    <title>Trading Wars</title>
    <link href="{{ asset('/frontapp/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <nav id="nav-bar">
        <img src="/frontapp/img/logo.svg" alt="logo">
    </nav>
    <div id="container">
        <div class="grid">
            <div class="col-lg-4">
                <div class="trading-pool">
                    <div class="bottom">
                        <p>test</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
