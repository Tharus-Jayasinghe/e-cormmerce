<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
      /* Reset some default styles */
      /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      } */

      /* Main container styles */
      .page-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
      }

      .table-container {
        width: 120%;
        max-width: 1200px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }

      /* Table styles */
      table {
        width: 90%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 14px;
        text-align: center;
      }

      th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
      }

      th {
        background-color: #007bff;
        color: #fff;
        text-transform: uppercase;
      }

      tr {
        background-color: #f9f9f9;
        transition: background-color 0.3s ease;
      }

      tr:hover {
        background-color: #e9ecef;
      }

      td img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      /* Button styles */
      .btn {
        display: inline-block;
        padding: 6px 12px;
        margin: 0 2px;
        font-size: 12px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      .btn-primary {
        background-color: #007bff;
        width: 50px;
      }

      .btn-primary:hover {
        background-color: #0056b3;
      }

      .btn-success {
        background-color: #28a745;
      }

      .btn-success:hover {
        background-color: #1e7e34;
      }

      .btn-secondary {
        background-color: #6c757d;
      }

      .btn-secondary:hover {
        background-color: #5a6268;
      }

      /* Pagination */
      .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }

      .pagination a {
        padding: 8px 12px;
        margin: 0 4px;
        text-decoration: none;
        color: #007bff;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      .pagination a:hover {
        background-color: #007bff;
        color: #fff;
      }

      /* Responsive design */
      @media (max-width: 768px) {
        table {
          font-size: 12px;
        }

        .btn {
          font-size: 10px;
          padding: 5px 10px;
        }

        th, td {
          padding: 8px;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="table-container">
        <h3 style="text-align: center; font-size: 24px; color: #343a40; margin-bottom: 20px;">All Orders</h3>

        <table>
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Payment Status</th>
              <th>Status</th>
              <th>Change Status</th>
              <th>Print PDF</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $order)
            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->rec_address }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->product->title }}</td>
              <td>${{ number_format((float)($order->product->price ?? 0), 2) }}</td>
              <td>
                <img src="products/{{ $order->product->image }}" alt="Product Image">
              </td>
              <td>{{ $order->payment_status }}</td>
              <td>
                @if($order->status == 'in progress')
                <span style="color: #ffc107; font-weight: bold;">{{ $order->status }}</span>
                @else
                <span style="color: #28a745; font-weight: bold;">{{ $order->status }}</span>
                @endif
              </td>
              <td>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                  <a class="btn btn-primary" href="{{ url('on_the_way', $order->id) }}">On the Way</a>
                  <a class="btn btn-success" href="{{ url('delivered', $order->id) }}">Delivered</a>
                </div>
              </td>
              <td>
                <a class="btn btn-secondary" href="{{ url('print_pdf', $order->id) }}">Print PDF</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="pagination">
          {{ $data->links() }}
        </div>
      </div>
    </div>

    @include('admin.js')
  </body>
</html>
