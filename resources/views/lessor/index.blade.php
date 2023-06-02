@extends('layout.master')

@section('content')
<style>
    .profile {
        margin-top: 20px;
        margin-bottom: 20px;

        /* box-shadow: 5px 10px #999; */
        /* border: 1px solid gray; */
    }

    .profile h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .profile p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .profile img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .profile a , .properties a , .mybutton{
        width: 100%;
    float: left;
    font-size: 18px;
    background-color: #007495;
    color: #fcf8f8;
    text-align: center;
    padding: 10px;
    }

    .properties {
        margin-top: 20px;
        margin-bottom: 20px;
        /* border: 1px solid gray; */

    }

    .properties h3 , .profile h3 {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .properties ul {
        list-style-type: none;
        padding-left: 0;
    }

    .properties li {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .no-properties {
        color: #999;
        font-style: italic;
    }

    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }

    .modal-content {
        padding: 20px;
    }
    .cardd {
        margin-top: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 profile">
            <a href="#" id="editProfileBtn">Edit Profile</a>
            <img src="{{ $lessor->image }}" alt="User Image">
            <h2 id="nameField">{{ $lessor->name }}</h2>
            {{-- <p id="emailField">Email: {{ $lessor->email }}</p>
            <p id="phoneField">Phone: {{ $lessor->phone_number }}</p>
            <p id="addressField">Address: {{ $lessor->city }} - {{ $lessor->address }}</p> --}}

            <form id="editProfileForm" action="{{ route('lessor.update', ['lessor' => $lessor->id]) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $lessor->email }}">
                        <input type="text" name="email" class="form-control" id="editableEmail" value="{{ $lessor->email }}" style="display: none;">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticPhone" value="{{ $lessor->phone_number }}">
                        <input type="text" name="phone_number" class="form-control" id="editablePhone" value="{{ $lessor->phone_number }}" style="display: none;">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticAddress" value="{{ $lessor->address }}">
                        <input type="text" name="address" class="form-control" id="editableAddress" value="{{ $lessor->address }}" style="display: none;">
                    </div>
                </div>

                <button type="submit" id="saveProfileBtn" style="display: none;" class="mybutton">Save</button>
            </form>
        </div>



        <div class="col-md-6 profile">
            <h3>My Total Properties: <?= count($properties) ?></h3>
            <h3>Average Rating: </h3>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 properties">

            <h3>Your Properties</h3>
            <a href="#" data-toggle="modal" data-target="#editProfileModal">Add New Property</a>

            @if ($properties->isEmpty())
            <p class="no-properties">You have no properties.</p>
            @else
            {{-- <ul> --}}

                <div class="row">

                @foreach($properties as $property)
                <div class="col-md-4 cardd">
                    <div class="gallery_box">
                       <div class="gallery_img"><img src="{{ $property->image1 }}" width="100%" height="100%"></div>
                       <h3 class="types_text">{{ $property->product_name }}</h3>
                         <p class="looking_text">{{ $property->product_description }}</p>
                       <div class="read_bt"><a href="#">{{ $property->product_price }} JD</a></div>
                    </div>
                 </div>
                <!-- Display more property details as needed -->
                @endforeach
            </div>
            {{-- </ul> --}}

            @endif
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3>Add New Property</h3>
            <form action="{{ route('property.store', ['lessor' => $lessor->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lessors_id" id="lessor_id" value="{{ $lessor->id }}">

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
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_type">Product Type</label>
                    <input type="text" class="form-control" id="product_type" name="product_type" required>
                </div>

                <div class="form-group">
                    <label for="image1">Image 1</label>
                    <input type="text" class="form-control" id="image1" name="image1">
                </div>
                <div class="form-group">
                    <label for="image2">Image 2</label>
                    <input type="text" class="form-control" id="image2" name="image2">
                </div>
                <div class="form-group">
                    <label for="image3">Image 3</label>
                    <input type="text" class="form-control" id="image3" name="image3">
                </div>
                <button type="submit" class="mybutton">Save Property</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('editProfileBtn').addEventListener('click', function(event) {
        // event.preventDefault();

        // Hide the information fields
        // document.getElementById('phoneField').style.display = 'none';
        // document.getElementById('addressField').style.display = 'none';
        // document.getElementById('emailField').style.display = 'none';
        // document.getElementById('nameField').style.display = 'none';


        // Show the edit profile form
        // document.getElementById('editProfileForm').style.display = 'block';
        document.getElementById('saveProfileBtn').style.display = 'block';

        // Hide the plain text email
    document.getElementById('staticEmail').style.display = 'none';
    document.getElementById('staticPhone').style.display = 'none';
    document.getElementById('staticAddress').style.display = 'none';


// Show the editable email input field
document.getElementById('editableEmail').style.display = 'block';
document.getElementById('editablePhone').style.display = 'block';
document.getElementById('editableAddress').style.display = 'block';

    });
</script>
@endsection
