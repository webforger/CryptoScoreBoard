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
    <nav id="nav-bar">
        <input id="menu__toggle" type="checkbox"/>
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <li>
                <a class="menu__item active" href="#">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="menu__item" href="#">
                    <i class="fas fa-camera"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="menu__item sign__out" href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <section id="container">
        <div class="container-right">
            <nav class="main-header">
                <p>test</p>
            </nav>
            <p>test</p>
        </div>
        <div class="container-left px-4">
            <header class="main-header">
                <p>test</p>
            </header>

            <div class="row mb-4">
                <header class="col-lg-12 px-4" id="home-header">
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-4 px-4">
                                <h1>Free pools <br /><span>Join Now totally free</span></h1>
                                <p>Trading Wars 2021</p>
                                <a class="btn btn-secondary px-lg-5">JOIN NOW</a>
                            </div>
                            <div class="col-lg-8">
                                <div id="main-chart">test</div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <div class="row px-2">
                <div class="col-lg-3 px-4">
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
                    <a class="btn btn-primary">
                        Primary
                    </a>
                    <a class="btn btn-secondary">
                        Secondary
                    </a>
                    <a class="btn btn-pink">
                        Pink
                    </a>
                    <a class="btn btn-gold">
                        Gold
                    </a>
                    <a class="btn disabled">
                        Disabled
                    </a>
                    <a class="btn btn-outline-primary">
                        Outline primary
                    </a>
                    <a class="btn btn-outline-secondary">
                        Outline secondary
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
