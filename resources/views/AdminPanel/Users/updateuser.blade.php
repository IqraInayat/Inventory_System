@extends('AdminPanel.main')
@section('myheading')
    Update Data
@endsection
@section('mycontent')
<form action="{{ route('update_user',['id' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">User Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $user->name }}">
        <p class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </p>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email..." value="{{ $user->email }}">
        <p class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </p>
    </div>

    <button type="submit" name="submit" class="btn btn-info">Submit</button>
</form>
@endsection