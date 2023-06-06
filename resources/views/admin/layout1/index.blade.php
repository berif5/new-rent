 @extends('admin.layout1.master')
@section('content')
    <!--*******************
            Preloader start
        ********************-->
        {{-- <style>
            table{display: none;}
        </style> --}}
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <!--*******************
            Preloader end
        ********************-->


    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
                Nav header start
            ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    {{-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> --}}
                    {{-- <span class="brand-title">
                        <img src="images/logo.png" alt="" width="150px">
                    </span> --}}
                </a>
            </div>
        </div>
        <!--**********************************
                Nav header end
            ***********************************-->

        <!--**********************************
                Header start
            ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">

                        </div>

                        <div class="drop-down animated flipInX d-md-none">

                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">

                       </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">



                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>

                            </div>
                        </li>

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('appProfile') }}"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>


                                        <hr class="my-2">
                                        <li>
                                            <a href="{{route("logout")}}"><i class="icon-lock"></i> <span>Log out</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

        <!--**********************************
                Sidebar start
            ***********************************-->
            {{-- <style>
                li a span {text-decoration: none;}
            </style> --}}
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <li class="nav-label">Dashboard</li> --}}
                    <li>
                        <a>
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard:</span>
                        </a>
                    </li>
                    <li ><a href="#users"><i class="fa-solid fa-users menu-icon"></i><span class="nav-text">Users</span></a></li>
                    <li ><a href="#lessors"><i class="fa-solid fa-users menu-icon"></i><span class="nav-text">Lessors</span></a></li>
                    <li ><a href="#products"><i class="fa-solid fa-truck-plane menu-icon"></i><span class="nav-text">Products</span></a></li>
                    <li ><a href="#bookings"><i class="fa-solid fa-calendar-check menu-icon"></i><span class="nav-text">Bookings</span></a></li>

                </ul>
            </div>
        </div>
        <!--**********************************
                Sidebar end
            ***********************************-->

        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">
            {{-- @foreach ($products as $product) --}}
            <div class="container-fluid mt-3">
                {{-- <div class="row"> --}}
                    <div class="container" style="display: flex">

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                             <div class="card-body">
                                <h3 class="card-title text-white">Products rents</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $productCount }}</h2>
                                    {{-- <p class="text-white mb-0"></p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
 {{-- @endforeach --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Lessors</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $lessorCount }}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Users</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $userCount }}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Bookings</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $bookingCount }}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>


{{-- table users --}}
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Users
                        </div>
                        <div class="card-body">
                            <table class="table" id="users">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        {{-- <th>password</th> --}}
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{ $user->address }}</td>
                                            {{-- <td>{{ $user->password }}</td> --}}
                                            <td><img src="{{ asset('images/' . $user->image) }}" alt="" style="width: 75px; height: 75px;"></td>


                                            {{-- <td><img src="{{ $user->image }}" alt="user img" width="50px" height="50px"></td> --}}
                                            <td>
                                                <a href="{{ route('userdashboard.show', $user->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                                <form action="{{ route('userdashboard.destroy', $user->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $users->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- new lessors --}}

                <div class="container">
                    <div class="card">
                        <div class="card-header">
                           Lessors
                        </div>
                        <div class="card-body">
                            <table class="table" id="lessors">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        {{-- <th>password</th> --}}
                                        <th>phone_number</th>
                                        <th>address</th>
                                        {{-- <th>city</th> --}}
                                        <th>image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessors as $lessor)
                                        <tr>
                                            <td>{{ $lessor->name }}</td>
                                            <td>{{ $lessor->email }}</td>
                                            {{-- <td>{{ $user->password }}</td> --}}
                                            <td>{{ $lessor->phone_number }}</td>
                                            <td>{{ $lessor->address }}</td>
                                            {{-- <td>{{ $lessor->city }}</td> --}}
                                            <td><img src="{{ $lessor->image }}" alt="user img" style="width: 75px; height: 75px;" ></td>

                                            <td>
                                                <a href="{{ route('lessordashboard.show', $lessor->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ route('lessordashboard.edit', $lessor->id) }}" class="btn btn-success">Edit</a>
                                                <form action="{{ route('lessordashboard.destroy', $lessor->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $lessors->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
{{-- table products --}}

<div class="container">
    <div class="card ">

      <div class="card-header">
         Proudcts
      </div>
      <div class="card-body">
          <table class="table" id="products">
              <thead>
                  <tr>
                      <th>product_name</th>
                      {{-- <th>product_description</th> --}}
                       <th>product_price</th>
                      <th>status</th>
                      {{-- <th>product_type</th> --}}
                      <th>category_name</th>
                      {{-- <th>lessors_id </th> --}}

                      <th>image</th>
                      {{-- <th>image2</th> --}}
                      {{-- <th>image3</th> --}}
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                      <tr>
                          <td>{{ $product->product_name }}</td>
                          {{-- <td>{{  $product->product_description}}</td> --}}
                           <td>{{ $product->product_price }}</td>
                          <td>{{ $product->status }}</td>
                          {{-- <td>{{ $product->product_type }}</td> --}}
                          <td>{{ $product->category->category_name }}</td>

                          {{-- <td><img src="{{ $product->image2 }}" alt="product image" width="100" height="100"></td> --}}
                          {{-- <td><img src="{{ $product->image3 }}" alt="product image" width="100" height="100"></td> --}}

                          {{-- <td>{{ $product->lessor_id }}</td> --}}
                          <td><img src="{{ asset('images/' . $product->image1) }}" alt="product image" style="width: 75px; height: 75px;" ></td>

                          <td>
                              <a href="{{ route('productdashboard.show', $product->id) }}" class="btn btn-primary">View</a>
                              <a href="{{ route('productdashboard.edit', $product->id) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('productdashboard.destroy', $product->id) }}" method="POST" style="display: inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="d-flex justify-content-center">
              {{ $products->links('pagination::bootstrap-4') }}
          </div>
      </div>
  </div>
</div>

{{-- new table --}}

<div class="container">
    <div class="card ">

      <div class="card-header">
         Bookings
      </div>
      <div class="card-body">
          <table class="table" id="bookings">
              <thead>
                  <tr>
                      <th>User Id</th>
                       <th>Product Id</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Total Price</th>

                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($bookings as $booking)
                      <tr>
                          <td>{{ $booking->user_id }}</td>
                          <td>{{  $booking->product_id}}</td>
                           <td>{{ $booking->start_date }}</td>
                          <td>{{ $booking->end_date }}</td>
                          <td>{{ $booking->total_price }}</td>

                          <td>
                              <a href="{{ route('productdashboard.show', $product->id) }}" class="btn btn-primary">View</a>
                              <a href="{{ route('productdashboard.edit', $product->id) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('productdashboard.destroy', $product->id) }}" method="POST" style="display: inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="d-flex justify-content-center">
              {{ $products->links('pagination::bootstrap-4') }}
          </div>
      </div>
  </div>
</div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="active-member">
                                        <div class="table-responsive">
                                            <form action="" method="GET">
                                                <label for="status">Filter by Status:</label>
                                                <select name="status" id="status" class="form-select">
                                                    <option value="all"
                                                        {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                                                    <option value="1"
                                                        {{ request('status') == '1' ? 'selected' : '' }}>unavilable</option>
                                                    <option value="2"
                                                        {{ request('status') == '0' ? 'selected' : '' }}>Avilable
                                                    </option>

                                                </select>

                                                <label for="price">Filter by Price:</label>
                                                <input type="number" name="price" id="price"
                                                    value="{{ request('price') }}" placeholder="Enter max price">


                                                <button type="submit">Filter</button>
                                            </form>
                                            <table class="table table-xs mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>product_name</th>
                                                        <th>product_description</th>
                                                        <th>product_price</th>
                                                        <th>Status</th>
                                                        <th>product_type</th>
                                                        <th>category_id </th>
                                                        <th>image1</th>
                                                        <th>lessor_id </th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($products as $product)
                                                        @if (request('status') == 'all' || request('status') == $product->status)
                                                            <tr>
                                                                <td>{{ $product->product_name }}</td>
                                                                <td>{{ $product->product_description }}</td>
                                                                <td>{{ $product->product_price }}</td>
                                                                <td>{{ $product->status }}</td>
                                                                <td>{{ $product->product_type }}</td>
                                                                <td>{{ $product->category_id }}</td>
                                                                <td>{{ $product->image1 }}</td>
                                                                <td>{{ $product->lessor_id }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                </tbody>


                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

            </div>


            <!-- #/ container -->
        </div>
        <!--**********************************
                Content body end
            ***********************************-->


        <!--**********************************
                Footer start
            ***********************************-->
            @push('scripts')
<script>
    // Get all the list items inside the "mylist" class
    const listItems = document.querySelectorAll('.mylist li');

    // Loop through each list item
    listItems.forEach((item) => {
        item.addEventListener('click', () => {
            // Get the table corresponding to the clicked list item
            const tableId = item.dataset.tableId;
            const table = document.getElementById(tableId);

            // Toggle the visibility of the table
            if (table.style.display === 'none') {
                table.style.display = 'block';
            } else {
                table.style.display = 'none';
            }
        });
    });
</script>
@endpush

        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy;</p>
            </div>
        </div>
        <!--**********************************
                Footer end
            ***********************************-->
    </div>
    <!--**********************************
            Main wrapper end
        ***********************************-->

    <!--**********************************
            Scripts
        ***********************************-->
@endsection
