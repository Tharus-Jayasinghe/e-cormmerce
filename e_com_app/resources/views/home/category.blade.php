<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    .category-section {
      margin: 30px auto;
      padding: 20px;
      max-width: 800px;
      border: none;
      border-radius: 12px;
      background-color: #ffffff;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .category-section h1 {
      font-size: 2rem;
      color: #333;
      margin-bottom: 20px;
      font-weight: bold;
    }

    .row {
      display: flex;
      justify-content: space-around;
      margin: 20px 0;
    }

    .category-container {
      margin: 10px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      flex: 1;
      max-width: 48%;
    }

    .category-item {
      position: relative;
      border: none;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin: 0 auto;
    }

    .category-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .category-item h3 {
      font-size: 1.2rem;
      margin-bottom: 15px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .category-item button {
      padding: 10px 20px;
      border: none;
      background-color: rgba(255, 255, 255, 0.8);
      color: #333;
      border-radius: 20px;
      cursor: pointer;
      font-size: 0.9rem;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .category-item button:hover {
      background-color: #ffffff;
      transform: scale(1.1);
    }

    .products-section {
      display: none;
      margin-top: 30px;
      padding: 20px;
      max-width: 800px;
      border-radius: 12px;
      background-color: #ffffff;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .products-section h2 {
      font-size: 1.8rem;
      color: #333;
      margin-bottom: 20px;
      font-weight: bold;
      text-align: center;
    }

    .product-item {
      margin: 10px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    footer {
      margin-top: 30px;
      text-align: center;
      font-size: 0.9rem;
      color: #777;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <!-- Shop Section -->
  <div class="category-section">
    <h1>Choose a Category</h1>
    @foreach ($data->chunk(2) as $row)
    <div class="row">
      @foreach ($row as $category)
      <div class="category-container">
        <div class="category-item" data-id="{{ $category->id }}">
          <h3>{{ $category->category_name }}</h3>
          <button class="select-btn">Select</button>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
  </div>

  <!-- Products Section -->
  <div class="products-section">
    <h2>Products</h2>
    <div id="products-container">
      <!-- Products will be dynamically injected here -->
    </div>
  </div>

  @include('home.footer')

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const categoryButtons = document.querySelectorAll('.select-btn');
      const productsSection = document.querySelector('.products-section');
      const productsContainer = document.getElementById('products-container');

      categoryButtons.forEach(button => {
        button.addEventListener('click', (event) => {
          const categoryItem = event.target.closest('.category-item');
          const selectedCategoryId = categoryItem.getAttribute('data-id');

          // Fetch products for the selected category
          fetch(`/category/${selectedCategoryId}/products`)
            .then(response => response.json())
            .then(products => {
              productsContainer.innerHTML = '';
              productsSection.style.display = 'block';

              if (products.length > 0) {
                products.forEach(product => {
                  const productElement = document.createElement('div');
                  productElement.className = 'product-item';
                  productElement.innerHTML = `
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <p><strong>Price:</strong> $${product.price}</p>
                  `;
                  productsContainer.appendChild(productElement);
                });
              } else {
                productsContainer.innerHTML = '<p>No products found for this category.</p>';
              }
            })
            .catch(error => {
              console.error('Error fetching products:', error);
            });
        });
      });
    });
  </script>
</body>

</html>
