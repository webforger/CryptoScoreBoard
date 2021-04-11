<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

    @foreach ($tradingPools as $tradingPool)
        <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
            <h1>{{ $tradingPool->name }}</h1>
            <h2>Users {{ $tradingPool->poolUsersCount() }}</h2>
            <div class="mt-3">
                @foreach ($tradingPool->poolUsers as $tradingPoolUser)
                    <h3>{{$tradingPoolUser->user->name}}</h3>
                    <p>PNL : {{$tradingPoolUser->pnl->value ?? 'not yet' }}</p>
                    <h3>Trades</h3>
                    @foreach ($tradingPoolUser->trades as $trade)
                        <li>{{$trade->value}}</li>
                    @endforeach
                @endforeach
            </div>

        </div>
    @endforeach
    </body>
</html>
