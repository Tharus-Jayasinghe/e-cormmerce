<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\OrderController;

use Illuminate\Http\Request;
use App\Models\Product;



route::get('/',[HomeController::class,'home']);

route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders',[HomeController::class,'myorders'])->middleware(['auth', 'verified']);





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);
route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);

route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

route::get('product_details/{id}',[HomeController::class,'product_details']);

route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);

route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth', 'verified']);

route::post('comfirm_order',[HomeController::class,'comfirm_order'])->middleware(['auth', 'verified']);

// route::get('shop',[HomeController::class,'shop']);

route::get('why',[HomeController::class,'why']);

route::get('testimonial',[HomeController::class,'testimonial']);

route::get('contact',[HomeController::class,'contact']);

route::get('category',[HomeController::class,'category']);


Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});


route::get('view_orders',[AdminController::class,'view_order'])->middleware(['auth','admin']);

route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware(['auth','admin']);

route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth','admin']);

route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware(['auth','admin']);

// Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/search', [SearchController::class, 'search'])->name('search');



Route::get('/search', [ProductController::class, 'search']);

Route::middleware(['auth'])->group(function () {
    Route::get('/shopping-lists', [ShoppingListController::class, 'index'])->name('shopping.index');
    Route::get('/shopping-lists/create', [ShoppingListController::class, 'create'])->name('shopping.create');
    Route::post('/shopping-lists', [ShoppingListController::class, 'store'])->name('shopping.store');
    Route::get('/shopping-lists/{shoppingList}', [ShoppingListController::class, 'show'])->name('shopping.show');
});


Route::get('delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

Route::get('/order_product/{id}', [HomeController::class, 'orderProduct'])->name('order_product');
Route::post('/confirm_order', [HomeController::class, 'comfirm_order'])->name('confirm_order');


Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/mycart', [HomeController::class, 'show'])->name('mycart');

Route::get('/mycart', [HomeController::class, 'mycart'])->name('mycart');

Route::get('/mycart/{id}', [HomeController::class, 'show']);
Route::resource('mycart', HomeController::class);

Route::get('/shop', [ShopController::class, 'index']);


Route::get('/shop', [ShopController::class, 'shop']);


Route::get('/category/{id}/products', [ProductController::class, 'getProductsByCategory']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'addItem'])->name('cart.add');

Route::delete('/cart/remove/{productId}', [CartController::class, 'removeItem'])->name('cart.remove');

Route::post('/cart/confirm', [CartController::class, 'confirmOrder'])->name('cart.confirm');

// Route::get('/search', function (Request $request) {
//     $query = $request->input('query');
//     $category = $request->input('category');
//     $products = Product::where('title', 'LIKE', "%{$query}%")
//                        ->where('category_id', $category)
//                        ->get();
//     return response()->json($products);
// });


Route::get('/search', function (Request $request) {
    $query = $request->query('query');
    $category = $request->query('category');

    // Query the products based on the search query and category
    $products = Product::where('title', 'like', '%' . $query . '%')
        ->when($category, function ($q) use ($category) {
            return $q->where('category_id', $category);
        })
        ->get();

    return response()->json($products);
});


Route::post('/confirm_order', [OrderController::class, 'confirmOrder']);
Route::get('/mycart', [CartController::class, 'showCart'])->name('mycart');
Route::post('/confirm_order', [OrderController::class, 'confirmOrder'])->name('confirm_order');

// Route::get('/mycart', [CartController::class, 'showCart'])->name('mycart');