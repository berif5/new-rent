@extends('layout.master')
@section('content')
<head>

</head>
    <!-- about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="about_section_2">
               {{-- <div class="row">
                  <div class="col-md-6">
                     <div class="image_iman"><img src="images/yach2.jpg" class="about_img"></div>
                  </div> --}}
                  {{-- <div class="col-md-6">
                     <div class="about_taital_box">
                        <h1 class="about_taital">About <span style="color: #007495;">Us</span></h1>
                        <p class="about_text">going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined </p>
                        <div class="readmore_btn"><a href="#">Read More</a></div>
                     </div>
                  </div> --}}
               </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="image_iman">
                            <table style="border: 10px solid #007495;" cellspacing="0" cellpadding="10">
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
                            <h1 class="about_taital">About <span style="color: #007495;">Us</span></h1>
                            <p class="about_text">Here at BeSmart, we are dedicated to providing exceptional rent vehicle. With years of experience in the industry, we strive to meet the needs and exceed the expectations of our valued customers.

                                Our team of highly skilled professionals is passionate about delivering top-notch rent vehicle that are tailored to suit individual preferences. We believe in fostering long-term relationships with our clients based on trust, reliability, and excellent customer service.
                                
                                At BeSmart, we pride ourselves on our attention to detail and commitment to quality. We continuously stay updated with the latest industry trends and innovations to ensure that we offer cutting-edge solutions to our customers.
                                
                                Whether you're looking for rent, you can rely on us to deliver outstanding results. We prioritize customer satisfaction above all else and are always ready to go the extra mile to ensure that your experience with us is nothing short of exceptional.
                                
                                For more information about our rent vehicle, please don't hesitate to get in touch. We look forward to serving you and exceeding your expectations.</p>
                            <div class="readmore_btn"><a href="#">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            }
        }
        function showPosition(position){
            document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
        }
        function showError(error){
            switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                    location.reload();
                    break;
            }
        }
    </script>
@endsection


{{--`latitude`,
    `longitude`)
( '35.7079124'),
( '35.7079124'); --}}
