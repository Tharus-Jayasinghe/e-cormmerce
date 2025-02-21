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
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px auto;
      }

      form {
        text-align: center;
      }

      input[type='text'] {
        width: 400px;
        height: 50px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
      }

      input[type='submit'] {
        height: 50px;
        border: none;
        background-color: #5cb85c;
        color: white;
        border-radius: 5px;
        padding: 0 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
      }

      input[type='submit']:hover {
        background-color: #4cae4c;
      }

      .table_deg {
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 80%;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      th {
        background-color: #007bff;
        color: white;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
      }

      td {
        color: #555;
        padding: 10px;
        border: 1px solid #ddd;
      }

      .btn {
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        color: white;
        display: inline-block;
        margin: 5px;
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
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Add Category</h1>

          <div class="div_deg">
            <form action="{{ url('add_category') }}" method="post">
              @csrf
              <input type="text" name="category" placeholder="Enter category name" required>
              <input type="submit" value="Add Category">
            </form>
          </div>

          <div>
            <table class="table_deg">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $data)
                <tr>
                  <td>{{ $data->category_name }}</td>
                  <td>
                    <a class="btn btn-success" href="{{ url('edit_category', $data->id) }}">Edit</a>
                  </td>
                  <td>
                    <!-- Attach the confirmation function to the delete link -->
                    <a class="btn btn-danger" href="#" onclick="confirmation(event, '{{ url('delete_category', $data->id) }}')">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JavaScript files -->
    <script type="text/javascript">
      function confirmation(ev, urlToRedirect) {
        // Prevent the default action of the link
        ev.preventDefault();

        // Display the confirmation dialog
        Swal.fire({
          title: "Are you sure you want to delete this?",
          text: "This delete action will be permanent.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
          // If confirmed, proceed to delete by redirecting
          if (result.isConfirmed) {
            window.location.href = urlToRedirect; // Perform the redirection to delete
          }
        });
      }
    </script>

    @include('admin.js')
  </body>
</html>
