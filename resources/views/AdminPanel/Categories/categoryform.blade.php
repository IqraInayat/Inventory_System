@extends('AdminPanel.main')
@section('myheading')
    Add new Category
@endsection
@section('mycontent')
<form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ old('name') }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter slug..." value="{{ old('slug') }}">
            <p class="text-danger">
                @error('slug')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="checkbox" name="status">
            <p class="text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="popular" class="form-label">Popular</label>
            <input type="checkbox" name="popular">
            <p class="text-danger">
                @error('popular')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-12 col-sm-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Enter description...">{{ old('description') }}</textarea>
            <p class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            <p class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta_title..." value="{{ old('meta_title') }}">
            <p class="text-danger">
                @error('meta_title')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="meta_description" rows="3" placeholder="Enter meta_description...">{{ old('meta_description') }}</textarea>
            <p class="text-danger">
                @error('meta_description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <textarea name="meta_keywords" class="form-control" id="meta_keywords" rows="3" placeholder="Enter meta_keywords...">{{ old('meta_keywords') }}</textarea>
            <p class="text-danger">
                @error('meta_keywords')
                    {{ $message }}
                @enderror
            </p>
        </div>
    </div>
    
    <button type="submit" name="submit" class="btn btn-info">Add Category</button>
    <br>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
</form>
@endsection