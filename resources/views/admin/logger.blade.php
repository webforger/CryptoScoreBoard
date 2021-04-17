@extends('admin/layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Logger</h1>
        </div>

        <div class="row">
            <iframe src="/logger" width="100%" height="600"></iframe>
        </div>
    </div>
@endsection

