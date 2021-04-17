@extends('admin/layout')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Account</h1>
            </div>

            <div class="row">
                <form action="{{route('upload/user/profile-picture')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <input type="submit" value="Upload">
                </form>
            </div>
        </div>
@endsection

