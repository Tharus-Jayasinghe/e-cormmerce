<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto-Switching Slider</title>
  <style>
    /* Base Slider Styles */
    .slider_section {
      max-width: 1200px;
      margin: 20px auto;
      position: relative;
      overflow: hidden;
      border: 5px solid #3498db;
      border-radius: 20px;
      background: linear-gradient(135deg, #000000, #f9f9f9);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .slider {
      display: flex;
      transition: transform 0.8s ease-in-out;
    }
    .slider-item {
      flex: 0 0 100%;
      display: flex;
      align-items: center;
    }
    .img-box {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .img-box img {
      width: 90%;
      border-radius: 10px;
      object-fit: cover;
    }
    .detail-box {
      flex: 1;
      padding: 20px;
    }
    .detail-box h1, .detail-box h2 {
      font-size: 2rem;
      font-weight: bold;
      color: #2c3e50;
      margin-bottom: 10px;
    }
    .detail-box p {
      font-size: 1rem;
      color: #7f8c8d;
      margin-bottom: 15px;
    }
    .detail-box .btn {
      padding: 10px 25px;
      font-size: 0.9rem;
      font-weight: bold;
      border-radius: 50px;
      background-color: #e74c3c;
      color: white;
      border: none;
      transition: all 0.3s ease-in-out;
    }
    .detail-box .btn:hover {
      background-color: #c0392b;
    }

    /* Slider Controls */
    .slider-controls {
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-between;
      pointer-events: none;
    }
    .slider-controls button {
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      font-size: 1.5rem;
      pointer-events: auto;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <section class="slider_section">
    <div class="slider">
      <!-- Slide 1 -->
      <div class="slider-item">
        <div class="detail-box">
          <h1>Welcome to Shop!</h1>
          <p>Discover top-quality products at unbeatable prices. Upgrade your wardrobe, enhance your tech, or spruce up your space. Your perfect find is just a click away!</p>
          <a class="btn" href="{{url('shop')}}">Shop Now</a>
        </div>
        <div class="img-box">
          <img src="images/image3.jpeg" alt="Shop Banner">
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="slider-item">
        <div class="detail-box">
          <h2>Exclusive Deals</h2>
          <p>Grab limited-time offers on trending products. Shop smarter and save more today!</p>
          <a class="btn" href="deals.html">View Deals</a>
        </div>
        <div class="img-box">
          <img src="images/image3.jpeg" alt="Exclusive Deals">
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="slider-item">
        <div class="detail-box">
          <h2>New Arrivals</h2>
          <p>Be the first to own the latest products. Start shopping now and stand out in style!</p>
          <a class="btn" href="new-arrivals.html">Shop New</a>
        </div>
        <div class="img-box">
          <img src="images/image3.jpeg" alt="New Arrivals">
        </div>
      </div>
    </div>
    <div class="slider-controls">
      <button class="prev-slide">❮</button>
      <button class="next-slide">❯</button>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const slider = document.querySelector('.slider');
      const slides = Array.from(document.querySelectorAll('.slider-item'));
      const prevButton = document.querySelector('.prev-slide');
      const nextButton = document.querySelector('.next-slide');
      let currentSlide = 0;

      function updateSlide(position) {
        const offset = -position * 100;
        slider.style.transform = `translateX(${offset}%)`;
      }

      function goToNextSlide() {
        currentSlide = (currentSlide < slides.length - 1) ? currentSlide + 1 : 0;
        updateSlide(currentSlide);
      }

      function goToPrevSlide() {
        currentSlide = (currentSlide > 0) ? currentSlide - 1 : slides.length - 1;
        updateSlide(currentSlide);
      }

      // Auto-switch functionality
      let autoSwitchInterval = setInterval(goToNextSlide, 4000); // 4 seconds interval

      prevButton.addEventListener('click', () => {
        goToPrevSlide();
        resetAutoSwitch();
      });

      nextButton.addEventListener('click', () => {
        goToNextSlide();
        resetAutoSwitch();
      });

      function resetAutoSwitch() {
        clearInterval(autoSwitchInterval);
        autoSwitchInterval = setInterval(goToNextSlide, 4000);
      }
    });
  </script>
</body>
</html>
