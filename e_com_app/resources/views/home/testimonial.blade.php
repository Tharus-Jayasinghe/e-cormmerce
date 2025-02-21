<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    /* Carousel container */
    .carousel-item {
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.8s ease-in-out, transform 1s ease;
      transform: translateY(50px);
    }

    .carousel-item.active {
      opacity: 1;
      transform: translateY(0);
    }

    .box {
      background: linear-gradient(135deg, rgba(0, 123, 255, 0.1), rgba(255, 255, 255, 0.7));
      padding: 100px;
      box-algin: center;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      max-width: 1000px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .box:hover {
      transform: scale(1.05);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .client_name h5 {
      font-size: 26px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
      transition: color 0.3s ease;
    }

    .client_name h6 {
      font-size: 18px;
      color: #777;
    }

    .client_info {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      justify-content: center;
    }

    .fa-quote-left {
      font-size: 35px;
      color: #007bff;
      margin-left: 10px;
    }

    .carousel-control-prev, .carousel-control-next {
      color: #333;
      font-size: 24px;
      transition: color 0.3s ease;
    }

    .carousel-control-prev:hover, .carousel-control-next:hover {
      color: #007bff;
    }

    .carousel-indicators li {
      background-color: #007bff;
      border-radius: 50%;
      width: 50px;
      height: 100px;
      transition: background-color 0.3s ease;
    }

    .carousel-indicators .active {
      background-color: #0056b3;
    }

    /* For smooth fade transition */
    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item.active {
      opacity: 1;
      transition-duration: .6s;
      transition-property: opacity;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- client section -->
    <section class="client_section layout_padding" style="padding: 80px 0; background-color: #f8f9fa;">
      <div class="container">
        <div class="heading_container heading_center">
          <h2 style="font-size: 36px; font-weight: bold; color: #333;">
            What Our Customers Say
          </h2>
        </div>
      </div>
      <div class="container px-0">
        <div id="customCarousel2" class="carousel carousel-fade" data-ride="carousel" data-interval="5000">
          <div class="carousel-inner">
            <!-- Text Review 1 -->
            <div class="carousel-item active">
              <div class="box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>Sophia Williams</h5>
                    <h6>Fashion Enthusiast</h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>"I recently purchased a set of dresses from Luxora, and I couldn't be happier! The selection was amazing, the quality exceeded my expectations, and delivery was prompt. I will definitely be shopping here again!"</p>
              </div>
            </div>

            <!-- Video Review 1 -->
            <div class="carousel-item">
              <div class="box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>Daniel Foster</h5>
                    <h6>Tech Enthusiast</h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <video width="100%" controls>
                  <source src="{{ asset('storage/videos/daniel_review.mp4') }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <p>"I bought a new smartphone from Luxora and the entire experience was seamless. The website is easy to navigate, the customer service was top-notch, and my new phone arrived well-packaged and on time. Highly recommend!"</p>
              </div>
            </div>

            <!-- Text Review 2 -->
            <div class="carousel-item">
              <div class="box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>Emily Taylor</h5>
                    <h6>Home Decor Lover</h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>"Luxora’s home decor section is a dream! I ordered a set of wall art and some furniture pieces. The quality is fantastic, and the items really elevate the look of my living room. I will be back for more!"</p>
              </div>
            </div>
          </div>

          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end client section -->

    @include('home.footer')

</body>

</html>
