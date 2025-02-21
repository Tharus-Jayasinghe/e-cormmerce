<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
      body {
        background-color: #f4f4f4;
        font-family: 'Muli', sans-serif;
      }

      h1 {
        color: #ffffff;
        text-align: center;
        margin-top: 30px;
        font-weight: bold;
      }

      .div_deg {
        margin-top: 40px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 90%;
        margin: 40px auto;
      }

      .search-bar {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      input[type='search'] {
        width: 400px;
        height: 40px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        margin-right: 10px;
      }

      input[type='submit'] {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      input[type='submit']:hover {
        background-color: #0056b3;
      }

      .table_deg {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
      }

      th {
        background-color: #007bff;
        color: white;
        font-size: 16px;
      }

      td {
        background-color: #f9f9f9;
        color: #333;
      }

      td img {
        border-radius: 5px;
      }

      .btn {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
      }

      .btn-success {
        background-color: #28a745;
      }

      .btn-success:hover {
        background-color: #218838;
      }

      .btn-danger {
        background-color: #dc3545;
      }

      .btn-danger:hover {
        background-color: #c82333;
      }

      .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }

      .pagination a {
        color: #007bff;
        padding: 5px 10px;
        text-decoration: none;
        margin: 0 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }

      .pagination a:hover {
        background-color: #007bff;
        color: white;
      }

      .pagination .active {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>View Products</h1>

          <div class="search-bar">
            <form action="{{ url('product_search') }}" method="get">
              @csrf
              <input type="search" name="search" placeholder="Search products..." required>
              <input type="submit" value="Search">
            </form>
          </div>

          <div class="div_deg">
            <table class="table_deg">
              <thead>
                <tr>
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $products)
                <tr>
                  <td>{{ $products->title }}</td>
                  <td>{!! Str::limit($products->description, 50) !!}</td>
                  <td>{{ $products->category }}</td>
                  <td>{{ $products->price }}</td>
                  <td>{{ $products->quantity }}</td>
                  <td>
                    <img src="products/{{ $products->image }}" height="100" width="100">
                  </td>
                  <td>
                    <a class="btn btn-success" href="{{ url('update_product', $products->id) }}">Edit</a>
                  </td>
                  <td>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a>
                 
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="pagination">
            {{ $product->onEachSide(1)->links() }}
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault();
        console.log("Confirmation triggered");
        const urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: "Are You Sure?",
          text: "This action is irreversible!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            console.log("Redirecting to:", urlToRedirect);
            window.location.href = urlToRedirect;
    }
  });
}

    </script>

    @include('admin.js')
  </body>
</html>
