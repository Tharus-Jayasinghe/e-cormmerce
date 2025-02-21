<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script>
  <style>
    /* General layout and background improvements */
    body {
      background-color: #f4f4f4;
      font-family: 'Arial', sans-serif;
    }

    .hero_area {
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .product-container {
      display: flex;
      gap: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      padding: 25px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-container:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .image-container {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #threejs-container {
      width: 100%;
      height: 100%;
      max-width: 300px;
      max-height: 300px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .details-container {
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .detail-box h6 {
      margin: 10px 0;
      font-size: 18px;
      color: #333;
    }

    .detail-box span {
      color: #ff6600;
      font-weight: bold;
    }

    .size-select {
      margin: 10px 0;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      padding: 10px 20px;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      align-self: flex-start;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <!-- Product details start -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="product-container">
        <!-- 3D Product Image -->
        <div class="image-container">
          <div id="threejs-container"></div>
        </div>

        <!-- Product Details -->
        <div class="details-container">
          <div class="detail-box">
            <h6><strong>{{$data->title}}</strong></h6>
            <h6>Price: <span>${{$data->price}}</span></h6>
            <h6>Category: {{$data->category}}</h6>
            <h6>Available Quantity: {{$data->quantity}}</h6>
            <h6>Size:</h6>
            <div class="size-select">
              <select class="form-control" name="size">
                <option value="small">S</option>
                <option value="medium">M</option>
                <option value="large">L</option>
              </select>
            </div>
            <p>{{$data->description}}</p>
            <a class="btn btn-primary" href="{{url('add_cart',$data->id)}}">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Info section -->
  @include('home.footer')

  <script>
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000); // Aspect ratio of 1
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    renderer.setSize(300, 300); // Match container size
    document.getElementById('threejs-container').appendChild(renderer.domElement);

    const geometry = new THREE.BoxGeometry();
    const texture = new THREE.TextureLoader().load('/products/{{$data->image}}');
    const material = new THREE.MeshBasicMaterial({ map: texture });
    const cube = new THREE.Mesh(geometry, material);
    scene.add(cube);

    camera.position.z = 2;

    function animate() {
      requestAnimationFrame(animate);
      cube.rotation.x += 0.01;
      cube.rotation.y += 0.01;
      renderer.render(scene, camera);
    }
    animate();
  </script>
</body>

</html>