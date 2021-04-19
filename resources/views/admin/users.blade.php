@extends('admin/layout')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">--}}
</head>

<body>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users panel</h1>
</div>
<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table">
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Email</th>
            <th scope="col">Creation date</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
</body>
</html>
@endsection
