
<div class="gallery_section_2">
    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="gallery_box">
                    <div class="gallery_img">
                        <img id="image_product" src="{{ $product->image1 }}" >
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
