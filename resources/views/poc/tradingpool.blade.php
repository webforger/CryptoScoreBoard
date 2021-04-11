@extends('poc/layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cards</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $tradingPool->name }}</h6>
                        <h6 class="m-0 text-secondary">{{ $tradingPool->poolUsersCount() }} Participants</h6>
                    </div>
                    <div class="card-body">
                        Incredible battle between people with money
                    </div>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Participants</h1>
        </div>

        @foreach ($tradingPool->poolUsers as $tradingPoolUser)
        <div class="row">
            <div class="col-lg-3">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $tradingPoolUser->user->name }}</h6>
                        <h6 class="m-0 text-secondary">PNL : {{$tradingPoolUser->pnl->value ?? '0' }}</h6>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($tradingPoolUser->trades as $trade)
                                <li>{{$trade->value}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

