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
        <a href="" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</a>
        <table class="table table-bordered text-center">
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            @foreach($students as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="" 
                    class="btn btn-success update_student" 
                    data-bs-toggle="modal" 
                    data-bs-target="#updateModal"
                    data-id="{{ $user->id }}"
                    data-name="{{ $user->name }}"
                    data-email="{{ $user->email }}">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
        {{!! $students->links() !!}}
       @include('script_file')
       @include('add_student_modal')
       @include('update_student_modal')
    </body>
</html>