@extends('layout.lessormaster')

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
    /* .notification-link {
    color: blue;
    font-weight: bold;
}

.notification-message {
    background-color: yellow;
    padding: 10px;
    border: 1px solid black;
    margin-bottom: 5px;
} */
/* .notification{display: flex} */
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 profile">
            <a href="#" id="editProfileBtn">Edit Profile</a>
            <img src="{{ $lessor->image }}" alt="User Image">
            <h2 id="nameField">{{ $lessor->name }}</h2>

            {{-- edit profile form --}}
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
            <a href="#" class="notification-link">Your Notifications</a>
            <div id="notificationsContainer">
                @foreach($notifications as $notification)
                    <div class="notification">
                        <p class="notification-message">{{ $notification->data['message'] }}</p>
                        {{-- <a href="{{ route('markAsRead', $notification->id) }}" class="close-button">&times;</a> --}}
                    </div>
                @endforeach
            </div>
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
                            <div class="gallery_img">
                                <img src="{{ asset('images/' . $property->image1) }}" width="100%" >
                              </div>
                              <h3 class="types_text">{{ $property->product_name }}</h3>
                            <h3 style="font-weight: bold; color: {{ $property->status == 0 ? 'green' : 'red' }}; text-align: center;">
                                {{ $property->status ? 'Un-Available' : 'Available' }}
                            </h3>
                            {{-- <h3 class="types_text"></h3> --}}
                            <p class="looking_text">{{ $property->product_description }}</p>
                            <p class="looking_text">{{ $property->product_price }} JD</p>
                            <div class="read_bt">
                                <a href="#" data-toggle="modal" data-target="#editPropertyModal{{ $property->id }}">Edit</a>
                            </div>
                            <div class="read_bt">
                                <a href="#" onclick="event.preventDefault(); deleteProperty({{ $property->id }})">Delete</a>
                            </div>
                            <form id="deletePropertyForm" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <!-- Display more property details as needed -->

                    <div class="modal fade" id="editPropertyModal{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="editPropertyModalLabel{{ $property->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPropertyModalLabel{{ $property->id }}">Edit Property</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add form fields for editing the property -->
                                    <form id="editPropertyForm{{ $property->id }}" method="POST" action="{{ route('property.update', ['id' => $property->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <!-- Add form fields for editing the property information -->
                                        <div>
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" id="product_name" class="form-control" name="product_name" value="{{ $property->product_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="0">Available</option>
                                                <option value="1">Unavailable</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="product_description">Product Description:</label>
                                            <textarea id="product_description" class="form-control" name="product_description">{{ $property->product_description }}</textarea>
                                        </div>
                                        <div>
                                            <label for="product_price">Product Price:</label>
                                            <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $property->product_price }}">
                                        </div>
                                        <br>
                                        <button type="submit" class="mybutton">Save</button>
                                        <!-- Add more form fields for editing the property as needed -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>

            {{-- </ul> --}}

            @endif
        </div>
    </div>

<script>
    function deleteProperty(propertyId) {
        if (confirm('Are you sure you want to delete this property?')) {
            // User confirmed deletion, perform the delete request
            const deleteForm = document.getElementById('deletePropertyForm');
            deleteForm.action = '{{ route('property.destroy', ['id' => ':propertyId']) }}'
                .replace(':propertyId', propertyId);
            deleteForm.submit();
        }
    }
</script>

<!-- Edit Property Modal -->


<!-- JavaScript code -->
{{-- <script>
function updateProperty(propertyId) {
    const editForm = document.getElementById('editPropertyForm' + propertyId);
    editForm.submit();
}
</script> --}}



<!-- add property Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3>Add New Property</h3>
            <form action="{{ route('property.store', ['lessor' => $lessor->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lessors_id" id="lessors_id" value="{{ $lessor->id }}">

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
                        <option value="0">Available</option>
                        <option value="1">Unavailable</option>
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
                    <div class="custom-file">
                      <input type="file" id="image1" name="image1" class="custom-file-input" onchange="displayFileName('image1')">
                      <label class="custom-file-label" for="image1">Choose file</label>
                    </div>
                    <p id="file-name1"></p>
                  </div>

                  <div class="form-group">
                    <label for="image2">Image 2</label>
                    <div class="custom-file">
                      <input type="file" id="image2" name="image2" class="custom-file-input" onchange="displayFileName('image2')">
                      <label class="custom-file-label" for="image2">Choose file</label>
                    </div>
                    <p id="file-name2"></p>
                  </div>

                  <div class="form-group">
                    <label for="image3">Image 3</label>
                    <div class="custom-file">
                      <input type="file" id="image3" name="image3" class="custom-file-input" onchange="displayFileName('image3')">
                      <label class="custom-file-label" for="image3">Choose file</label>
                    </div>
                    <p id="file-name3"></p>
                  </div>

                <button type="submit" class="mybutton">Save Property</button>
            </form>

        </div>
    </div>
</div>
<script>
    function displayFileName(inputId) {
      var fileInput = document.getElementById(inputId);
      var fileName = fileInput.files[0].name;
      var customFileLabel = document.querySelector(`label[for=${inputId}]`);
      customFileLabel.textContent = fileName;

      var fileNameElement = document.getElementById("file-name" + inputId.slice(-1));
      fileNameElement.textContent = "Selected file: " + fileName;
    }
  </script>

<script>
    document.getElementById('editProfileBtn').addEventListener('click', function(event) {

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
