<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AJAX CRUD</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        
    </head>
    <body>
        <table class="table-bordered">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td>Action</td>
            </tr>
            @foreach(\App\Models\Student::all() as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <button class="btn btn-success">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>

       @include('script_file')
    </body>
</html>