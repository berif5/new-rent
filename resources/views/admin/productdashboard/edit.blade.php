@extends('admin.layout1.master')

@section('content')
    <div class="container">
        <h1>Edit product</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('productdashboard.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_name" class="form-label">product_name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">product_description</label>
                <input type="text" class="form-control" id="product_description" name="product_description" value="{{ $product->email }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">product_price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" required>
            </div>


            <div class="mb-3">
                <label for="status" class="status">status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Available</option>
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="product_type" class="form-label">product_type</label>
                <select name="product_type" id="product_type" class="form-control" required>
                    <option value="sedan">Sedan</option>
                    <option value="offroad">Off Road</option>
                    <option value="pickup">Pickup</option>
                    <option value="sport">Sport</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="category_id" class="form-label">category_id</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="mb-3">
                <label for="image1" class="form-label">image1</label>
                <input type="file" class="form-control" id="image1" name="image1">
            </div>
            <div class="mb-3">
                <label for="image2" class="form-label">image2</label>
                <input type="file" class="form-control" id="image2" name="image2">
            </div>
            <div class="mb-3">
                <label for="image3" class="form-label">image3</label>
                <input type="file" class="form-control" id="image3" name="image3">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
