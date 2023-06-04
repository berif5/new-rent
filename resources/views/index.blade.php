@extends('layout.master')
@section('content')
<!-- banner section start -->
{{-- hi there --}}
{{-- hi --}}
{{-- hi bahaa --}}
<style>
.price{color: white}
#max_price_label, #min_price_label{color: white}
input[type="range"] {
  accent-color: gray;
  cursor: pointer;
}
</style>
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div id="banner_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Car Rent <br><span style="color: #007495;">For You</span></h1>
                              {{-- <h1 class="banner_taital">Car<br><span style="color: #007495;">For You</span></h1> --}}
                              <p class="banner_text">Discover the convenience of our reliable car rental service. Choose from our diverse fleet of vehicles to suit your needs. Affordable rates, flexible options, and excellent customer support ensure a smooth experience. Book now and explore with ease!</p>
                              <div class="btn_main">
                                 {{-- <div class="contact_bt"><a href="#">Read More</a></div> --}}
                                 {{-- <div class="contact_bt active"><a href="#">Contact Us</a></div> --}}
                                 <div class="contact_bt"><a href="#our_offers">OUR OFFERS</a></div>
                                 <div class="contact_bt active"><a href="#about_us">ABOUT US</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              {{-- <h1 class="banner_taital">Car Rent <br><span style="color: #273f54;">For You</span></h1> --}}
                              <h1 class="banner_taital">Bicycles Rent <br><span style="color: #007495;">For You</span></h1>
                              <p class="banner_text">Experience the freedom of exploring on two wheels with our bicycle rental service. Choose from a diverse fleet of bikes to suit your needs. Affordable rates, flexible rental periods, and friendly customer support ensure a seamless experience. Book now and pedal your way to adventure!</p>
                              <div class="btn_main">
                                 {{-- <div class="contact_bt"><a href="#">Read More</a></div> --}}
                                 {{-- <div class="contact_bt active"><a href="#">Contact Us</a></div> --}}
                                <div class="contact_bt"><a href="#our_offers">OUR OFFERS</a></div>
                                <div class="contact_bt active"><a href="#about_us">ABOUT US</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              {{-- <h1 class="banner_taital">Car Rent <br><span style="color: #273f54;">For You</span></h1> --}}
                              <h1 class="banner_taital">Scooters Rent <br><span style="color: #007495;">For You</span></h1>
                              <p class="banner_text">Embrace the convenience of zipping around town on our scooter rental service. Choose from a variety of scooters to suit your preferences. Affordable rates, flexible rental options, and reliable support ensure a hassle-free experience. Book now and enjoy the ride!</p>
                              <div class="btn_main">
                                <div class="contact_bt"><a href="#our_offers">OUR OFFERS</a></div>
                                <div class="contact_bt active"><a href="#about_us">ABOUT US</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              {{-- <h1 class="banner_taital">Car Rent <br><span style="color: #273f54;">For You</span></h1> --}}
                              <h1 class="banner_taital">Boats Rent <br><span style="color: #007495;">For You</span></h1>
                              <p class="banner_text">Experience the thrill of the open water with our boat rental service. Choose from a wide range of boats to suit your adventure. Competitive rates, flexible rental durations, and expert assistance ensure a memorable boating experience. Reserve now and set sail!</p>
                              <div class="btn_main">
                                <div class="contact_bt"><a href="#our_offers">OUR OFFERS</a></div>
                                <div class="contact_bt active"><a href="#about_us">ABOUT US</a></div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              {{-- <h1 class="banner_taital">Car Rent <br><span style="color: #273f54;">For You</span></h1> --}}
                              <h1 class="banner_taital">Caravans Rent <br><span style="color: #007495;">For You</span></h1>
                              <p class="banner_text">Embark on an unforgettable journey with our caravan rental service. Choose from a diverse range of caravans to suit your travel needs. Competitive rates, flexible rental periods, and comprehensive amenities ensure a comfortable and enjoyable adventure. Book now and hit the road!</p>
                              <div class="btn_main">
                                 {{-- <div class="contact_bt"><a href="#">Read More</a></div> --}}
                                 {{-- <div class="contact_bt active"><a href="#">Contact Us</a></div> --}}
                                <div class="contact_bt"><a href="#our_offers">OUR OFFERS</a></div>
                                <div class="contact_bt active"><a href="#about_us">ABOUT US</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- hello --}}
                     <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                     </a>
                     <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                     </a>
                  </div>
               </div>

            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- about section start -->
      <div class="about_section layout_padding" id="about_us">
         <div class="container">
            <div class="about_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <div class="image_iman">
                        <table  style="border: 10px solid #007495;" cellspacing="0" cellpadding="10">
                            <tr>
                                <td style="width: 450px; height:450px;">
                                    <iframe src='https://www.google.com/maps?q=<?php echo 32.0448774; ?>,<?php echo 35.7079124; ?>&hl=es;z=14&output=embed' style="width:100%; height:100%"></iframe>
                                </td>
                            </tr>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="about_taital_box">
                        {{-- <h1 class="about_taital">About <span style="color: #273f54;">Us</span></h1> --}}
                        <h1 class="about_taital">About <span style="color: #007495;">Us</span></h1>
                        <p class="about_text">Here at BoSmart, we are dedicated to providing exceptional rent vehicle. With years of experience in the industry, we strive to meet the needs and exceed the expectations of our valued customers.

                           Our team of highly skilled professionals is passionate about delivering top-notch rent vehicle that are tailored to suit individual preferences. We believe in fostering long-term relationships with our clients based on trust, reliability, and excellent customer service.

                           At BoSmart, we pride ourselves on our attention to detail and commitment to quality. We continuously stay updated with the latest industry trends and innovations to ensure that we offer cutting-edge solutions to our customers. </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <div class="search_section">

         <form id="searchForm" action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
              {{-- <div class="search_section"> --}}
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="search_taital">Search Your Best Offers</h1>
                    <p class="search_text">Using 'Content here, content here', making it look like readable</p>
                    <!-- select box section start -->
                    <div class="container">
                      <div class="select_box_section">
                        <div class="select_box_main">
                          <div class="row">
                            <div class="col-md-3 select-outline">
                              <select name="category" id="categorySelect" class="form-select">
                                <option value="" disabled selected>Any Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-3 select-outline">
                              <select name="status" id="statusSelect" class="form-select">
                                <option value="" disabled selected>Any Status</option>
                                <option value="0">Available</option>
                                <option value="1">Unavailable</option>
                              </select>
                            </div>
                            <div class="col-md-4 select-outline">
                              <label for="min_price"  class="form-label price">Minimum Price:</label>
                              <input type="range" class="form-range" id="min_price" name="min_price" min="0" max="300" step="20" value="0" class="form-range">
                              <span id="min_price_label"></span>
                                    <br>
                              <label for="max_price" class="form-label price">Maximum Price:</label>
                              <input type="range" class="form-range" id="max_price" name="max_price" min="0" max="300" step="20" value="300" class="form-range">
                              <span id="max_price_label"></span>
                            </div>
                            <div class="col-md-2">
                              <div class="search_btn"><button id="searchBtn" type="submit" class="btn btn-light">Search Now</button></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- select box section end -->
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </form>
      </div>


    <!-- gallery section start -->

    <div class="gallery_section layout_padding" id="our_offers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="gallery_taital">Our offers</h1>
                </div>
            </div>
            <div class="gallery_section_2">
                <div class="row mt-4">
                    @php
                    $limitedProducts = $products->take(6); // Display only 6 products on the page
                    @endphp
                    @foreach ($limitedProducts as $product)
                    <div class="col-md-4">
                        <div class="gallery_box" style="height: 500px; margin:10px;">
                            <div class="gallery_img">
                                <img id="image_product" src="{{ asset('images/'. $product->image1) }}" style="width: 100%; height: 250px;">
                            </div>
                            <h3 class="types_text">{{ $product->product_name }}</h3>
                            <p class="looking_text">Start per day ${{ $product->product_price }}</p>
                            <p style="font-weight: bold; color: {{ $product->status == 0 ? 'green' : 'red' }}; text-align: center;">
                                @if ($product->status == 0)
                                Available
                                @else
                                Unavailable
                                @endif
                            </p>
                            <div class="read_bt">
                                <a href="{{ route('singleproduct', $product->id) }}">See the details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div>{{ $products->links('pagination::bootstrap-4') }}</div> --}}

                </div>

            </div>

        </div>

    </div>




<script>
    function updateRangeValue(inputId, labelId) {
  var input = document.getElementById(inputId);
  var label = document.getElementById(labelId);
  label.textContent = input.value;
}

// Attach event listeners to the range inputs
var minPriceInput = document.getElementById('min_price');
var maxPriceInput = document.getElementById('max_price');

minPriceInput.addEventListener('input', function() {
  updateRangeValue('min_price', 'min_price_label');
});

maxPriceInput.addEventListener('input', function() {
  updateRangeValue('max_price', 'max_price_label');
});

</script>
      @endsection

