@extends('AdminPanel.main')
@section('myheading')
    Update Product
@endsection
@section('mycontent')
<form action="{{ route('update_product',['id' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $product->name }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter slug..." value="{{ $product->slug }}">
            <p class="text-danger">
                @error('slug')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="category" class="form-label dropdown-item">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="category">Select Category*</option>
                @foreach ($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">
                @error('category')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity..." value="{{ $product->quantity }}">
            <p class="text-danger">
                @error('quantity')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="original_price" class="form-label">Original Price</label>
            <input type="number" name="original_price" class="form-control" id="original_price" placeholder="Enter original_price..." value="{{ $product->original_price }}">
            <p class="text-danger">
                @error('original_price')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="selling_price" class="form-label">Selling Price</label>
            <input type="number" name="selling_price" class="form-control" id="selling_price" placeholder="Enter selling_price..." value="{{ $product->selling_price }}">
            <p class="text-danger">
                @error('selling_price')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter discount..." value="{{ $product->discount }}">
            <p class="text-danger">
                @error('discount')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <p class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3 form-floating">
            <textarea name="small_description" class="form-control" id="small_description" rows="3" placeholder="Enter small description">{{ $product->small_description }}</textarea>
            <label for="small_description" class="form-label px-4">Write Small Description</label>
            <p class="text-danger">
                @error('small_description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3 form-floating">
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description">{{ $product->description }}</textarea>
            <label for="description" class="form-label px-4">Write Long Description</label>
            <p class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="trending" class="form-label">Trending</label>&nbsp;&nbsp;
            <input type="checkbox" name="trending"  {{ $product->trending == '1' ? 'checked' : '' }}>
            <p class="text-danger">
                @error('trending')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta_title" value="{{ $product->meta_title }}">
            <p class="text-danger">
                @error('meta_title')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" id="meta_description" rows="3" placeholder="Enter meta description">{{ $product->meta_description}}</textarea>
            <p class="text-danger">
                @error('meta_description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
            <label for="meta_keywords" class="form-label">Meta keywords</label>
            <textarea name="meta_keywords" class="form-control" id="meta_keywords" rows="3" placeholder="Enter meta keywords">{{ $product->meta_keywords}}</textarea>
            <p class="text-danger">
                @error('meta_keywords')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <button type="submit" name="submit" class="btn btn-info">Update Product</button>
    </div>
    <br>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
</form>
@endsection