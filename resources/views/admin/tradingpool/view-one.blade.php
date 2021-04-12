@extends('admin.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pool - {{ $tradingPool->name }}</h1>
        </div>

        <div class="row">
            @if ($tradingPool->tradingGoal())
                <div class="col-lg-8">
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Goal</h6>
                        </div>
                        <div class="card-body">
                            <p>First to <b>{{ $tradingPool->tradingGoal->value }}</b> {{ $tradingPool->tradingGoal->coin->name }}</p>
                            <p>Pools start at <b>{{ $tradingPool->tradingGoal->tradingPeriod->period_start }}</b> and ends at <b>{{ $tradingPool->tradingGoal->tradingPeriod->period_end }}</b></p>
                            <p>Type <b>{{ $tradingPool->tradingType->name }}</b></p>
                            <p>Allowed Pairs <b>{{ $tradingPool->tradingType->pair->ticker() }}</b></p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($tradingPool->tradingReward())
                <div class="col-lg-4">
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reward - {{ $tradingPool->tradingReward->name }}</h6>
                        </div>
                        <div class="card-body">
                            {{ $tradingPool->tradingReward->description }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Participants ({{ $tradingPool->poolUsersCount() }})</h1>
        </div>

        @foreach ($tradingPool->poolUsers->chunk(2) as $tradingPoolUserChunk)
        <div class="row">
            @foreach($tradingPoolUserChunk as $tradingPoolUser)
                <div class="col-lg-6">
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $tradingPoolUser->user->name }}</h6>
                            <h6 class="m-0 text-secondary">PNL : {{$tradingPoolUser->pnl->value ?? '0' }}</h6>
                        </div>
                        <div class="card-body">
                            <p>Trades</p>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Trade value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tradingPoolUser->trades as $trade)
                                        <tr>
                                            <td>{{$trade->value}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No trades yet</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

