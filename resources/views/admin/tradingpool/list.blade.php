@extends('admin.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Trading Pool</h1>
        </div>

        @foreach ($tradingPools->chunk(4) as $chunks)
            <div class="row">

                @foreach ($chunks as $tradingPool)
                    <div class="col-lg-6">
                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $tradingPool->name }}</h6>
                                <h6 class="m-0 text-secondary">{{ $tradingPool->poolUsersCount() }} Participants</h6>
                            </div>
                            <div class="card-body">
                                <a href="/admin/trading-pool/{{ $tradingPool->id }}" class="btn btn-primary">View pool</a>
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

