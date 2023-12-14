@extends('AdminPanel.main')
@section('myheading')
    Users Data
@endsection
@section('mycontent')
{{-- Search --}}
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Users" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>
{{-- Success message --}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
{{-- Table --}}
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('delete_user',['id' => $user->id ])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{ route('edit_user',['id' => $user->id ])}}" class="btn btn-info"><i class="fa-solid fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection