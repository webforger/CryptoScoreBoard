<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csr-token" content="{{ csrf_token() }}">
    <title>Trading Wars</title>
    <link href="{{ asset('/frontapp/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body>
    <nav id="nav-bar">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <li>
                <img src="/frontapp/img/logo.svg" alt="logo">
            </li>
            <li>
                <a class="menu__item" href="#">
                    Home
                </a>
            </li>
            <li>
                <a class="menu__item" href="#">
                    Menu item 2
                </a>
            </li>
        </ul>
    </nav>
    <div id="container">
        <div class="grid">
            <div class="col-lg-4">
                <div class="trading-pool">
                    <div class="top">
                        <p>top</p>
                    </div>
                    <div class="bottom">
                        <p>test</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trading-pool loading">
                    <div class="top">
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                    </div>
                    <div class="bottom">
                        <div class="text-line"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trading-pool loading">
                    <div class="top">
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                    </div>
                    <div class="bottom">
                        <div class="text-line"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trading-pool loading">
                    <div class="top">
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                        <div class="text-line"></div>
                    </div>
                    <div class="bottom">
                        <div class="text-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
