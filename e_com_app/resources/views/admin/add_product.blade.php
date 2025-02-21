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
        margin-top: 40px;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 60%;
        margin: 40px auto;
      }

      label {
        display: inline-block;
        width: 200px;
        font-size: 16px;
        font-weight: bold;
        color: #555;
        margin-bottom: 10px;
      }

      input[type='text'],
      input[type='number'],
      input[type='file'],
      select,
      textarea {
        width: 100%;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
        margin-bottom: 15px;
        color: #333;
        box-sizing: border-box;
      }

      textarea {
        height: 80px;
        resize: none;
      }

      select {
        background-color: #fff;
      }

      .input_deg {
        margin-bottom: 15px;
        width: 100%;
      }

      input[type='submit'] {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      input[type='submit']:hover {
        background-color: #218838;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Add Product</h1>

          <div class="div_deg">
            <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="input_deg">
                <label>Product Title</label>
                <input type="text" name="title" placeholder="Enter product title" required>
              </div>

              <div class="input_deg">
                <label>Description</label>
                <textarea name="description" placeholder="Enter product description" required></textarea>
              </div>

              <div class="input_deg">
                <label>Price</label>
                <input type="text" name="price" placeholder="Enter product price" required>
              </div>

              <div class="input_deg">
                <label>Quantity</label>
                <input type="number" name="qty" placeholder="Enter product quantity" required>
              </div>

              <div class="input_deg">
                <label>Product Category</label>
                <select name="category" required>
                  <option value="">Select a Category</option>
                  @foreach($category as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="input_deg">
                <label>Product Image</label>
                <input type="file" name="image" required>
              </div>

              <div class="input_deg">
                <input type="submit" value="Add Product">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript files -->
    @include('admin.js')
  </body>
</html>
