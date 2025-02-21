<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category; // Fixed the instantiation here
        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfully!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
    if ($category) {
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully!');
    }
    return redirect()->back()->with('error', 'Category not found!');
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Updated Successfully!');

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully!');

        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(4);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/' . $data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully!');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully!');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->paginate(3);

        return view('admin.view_product', compact('product'));
    }

    // public function view_order()
    // {
    //     $data = Order::all();
    //     return view('admin.order',compact('data'));
    // }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'on the way';

        $data->save();

        return redirect('/view_orders');

    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');
    }

    public function print_pdf($id)
{
    // Fetch the order data using the provided ID
    $data = Order::find($id);

    // Define the filename using the customer's name
    $customerName = $data->name; // Assuming 'name' field contains the customer's name
    $fileName = str_replace(' ', '_', $customerName) . '.pdf'; // Replace spaces with underscores for cleaner file names

    // Load the view and pass the data
    $pdf = Pdf::loadView('admin.invoice', compact('data'));

    // Download the PDF with the user's name as the filename
    return $pdf->download($fileName);
}

    public function view_order()
{
    // Paginate orders (10 per page, adjust as needed)
    $data = Order::paginate(10);  // This will return a paginated collection

    // Pass the paginated data to the view
    return view('admin.order', compact('data'));
}

public function destroy($id)
{
    $category = Category::find($id);
    if ($category) {
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    return redirect()->back()->with('error', 'Category not found.');
}


    
}
