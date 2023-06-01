@extends('layout.master')
@section('content')
    <div class="search_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="search_taital">Search Your Best Cars</h1>
                    <p class="search_text">Using 'Content here, content here', making it look like readable</p>
                    <!-- select box section start -->
                    <div class="container">
                        <div class="select_box_section">
                            <div class="select_box_main">
                                <div class="row">
                                    <div class="col-md-3 select-outline">
                                        <form action="{{ route('vehicle') }}" method="GET">
                                            <select class="mdb-select md-form md-outline colorful-select dropdown-primary"
                                                name="category">
                                                <option value="" disabled selected>Categories</option>
                                                <option value="">all</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-3 select-outline">
                                        <select class="mdb-select md-form md-outline colorful-select dropdown-primary"
                                            name="type">
                                            <option value="" disabled selected>status</option>
                                            <option value="">all</option>
                                            <option value="1">Available</option>
                                            <option value="0">Unavailable</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                           <label for="">Start Price</label>
                                           <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control">
                                       </div>
                                       <div class="col-md-4">
                                           <label for="">End Price</label>
                                           <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "900";} ?>" class="form-control">
                                       </div>
                                       <div class="col-md-4">
                                           <label  for="">Click Me</label> <br/>
                                           <button type="submit" class="btn btn-primary px-4">Filter</button>
                                       </div>
                                   </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- select box section end -->
                </div>
            </div>
        </div>
    </div>
    <!-- gallery section start -->
    <div class="gallery_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="gallery_taital">Our best offers</h1>
                </div>
            </div>
            <div class="gallery_section_2">
                <div class="row mt-4">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="gallery_box">
                                <div class="gallery_img">
                                    <img src="{{ $product->image1 }}" width="400" height="290">
                                 </div>
                                <h3 class="types_text">{{ $product->product_name }}</h3>
                                <p class="looking_text">Start per day ${{ $product->product_price }}</p>
                                <div class="read_bt"><a href="#">Book Now</a></div>
                                <div class="read_bt">
                                 <a href="{{ route('singleproduct', $product->id) }}">Read more</a>
                             </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- gallery section end -->
@endsection
