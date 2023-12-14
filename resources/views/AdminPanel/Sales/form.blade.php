@extends('AdminPanel.main')
@section('myheading')
    Record Sale
    <a href="{{ route('sales_history')}}" class="btn btn-warning float-right">Sales History</a>
@endsection
@section('mycontent')
<form action="{{ route('record_sales') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="sale_date" class="form-label">Sale Date:</label>
        <input type="date" id="sale_date" class="form-control" name="sale_date" value="{{ old('sale_date')}}">
        <p class="text-danger">
            @error('sale_date')
                {{ $message }}
            @enderror
        </p>
    </div>

    <div class="mb-3">
        <label for="product_id" class="form-label">Product Name:</label>
        <select id="product_id" name="product_id" class="form-control">
            <option value="">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Quantity -->
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity Sold:</label>
        <input type="number" id="quantity" name="quantity" min="1" class="form-control" placeholder="Enter Quantity Sold" value="{{ old('quantity')}}">
    </div>

    <button type="submit" name="submit" class="btn btn-info">Record Sale</button>

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    
</form>
@endsection
