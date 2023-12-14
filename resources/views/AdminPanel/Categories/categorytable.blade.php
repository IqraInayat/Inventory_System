@extends('AdminPanel.main')
@section('myheading')
    Categories Data
@endsection

@section('mycontent')
    {{-- Search --}}
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Categories" value="{{ $search }}">
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
                <th>Category Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Created_At</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <img src="{{ asset('./admin/catimages/' . $category->image) }}" height="120px" width="120px">
                    </td>
                    <td>
                        <a href="{{ route('delete_category',['id' => $category->id ])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{ route('edit_category',['id' => $category->id ])}}" class="btn btn-info"><i class="fa-solid fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection