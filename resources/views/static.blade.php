<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csr-token" content="{{ csrf_token() }}">
    <title>Trading Wars</title>
    <link href="{{ asset('/frontapp/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/4ca1b11701.js" crossorigin="anonymous"></script>
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
                    <i class="fas fa-camera"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="menu__item" href="#">
                    <i class="fas fa-camera"></i>
                    <span>Home</span>
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
