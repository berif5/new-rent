@extends('layout.master')
@section('content')
<form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="product_description">Product Description</label>
        <textarea class="form-control" id="product_description" name="product_description" required></textarea>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" class="form-control" id="product_price" name="product_price" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1">Available</option>
            <option value="0">Unavailable</option>
        </select>
    </div>

    <div class="form-group">
        <label for="product_type">Product Type</label>
        <input type="text" class="form-control" id="product_type" name="product_type" required>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" name="category" required>
    </div>
    <div class="form-group">
        <label for="image1">Image 1</label>
        <input type="text" class="form-control-file" id="image1" name="image1">
    </div>
    <div class="form-group">
        <label for="image2">Image 2</label>
        <input type="text" class="form-control-file" id="image2" name="image2">
    </div>
    <div class="form-group">
        <label for="image3">Image 3</label>
        <input type="text" class="form-control-file" id="image3" name="image3">
    </div>
    <button type="submit" class="btn btn-primary">Save Property</button>
</form>
@endsection
