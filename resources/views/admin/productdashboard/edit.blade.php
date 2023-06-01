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
                <input type="text" class="form-control" id="status" name="status" required>
            </div>


            <div class="mb-3">
                <label for="product_type" class="form-label">product_type</label>
                <input type="text" class="form-control" id="product_type" name="product_type" required>
            </div>


            <div class="mb-3">
                <label for="category_id" class="form-label">category_id</label>
                <input type="text" class="form-control" id="category_id" name="category_id" required>
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
