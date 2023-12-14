<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserorderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for FrontEnd 
Route::get('/',[HomeController::class,'Website_Main_Page'])->name('website');
Route::get('/category',[HomeController::class,'Frontend_Category_Page'])->name('category');
Route::get('/view_category/{slug}/{query?}', [HomeController::class, 'View_Category'])->name('view_category');
Route::get('/category/{cat_slug}/{prod_slug}',[HomeController::class,'Product_Detail'])->name('product_details');
Route::post('/add-to-cart',[CartController::class,'AddProduct'])->name('cart_product');
Route::post('/delete-cart-item',[CartController::class,'Delete_Item'])->name('delete_cart');
Route::post('update-cart',[CartController::class,'Update_cart'])->name('update_cart');
// Route for dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart',[CartController::class,'View_Cart'])->name('view_cart');
    Route::get('checkout',[CheckoutController::class,'Checkout_Page'])->name('checkout_page');
    Route::post('place-order',[CheckoutController::class,'placeOrder'])->name('place_order');
    Route::get('my-orders',[UserorderController::class,'User_Order'])->name('user_order');
    Route::get('view-order/{id}',[UserorderController::class,'User_View_Order_Page'])->name('user_view_order');

});
require __DIR__.'/auth.php';

//Group Routing
Route::group(['prefix' => 'user'], function () {
    Route::get('/home_page',[UserController::class,'show_user'])->name('logged_user_table');
    Route::get('/delete{id}',[UserController::class,'destroy_user'])->name('delete_user');
    Route::get('/edit{id}',[UserController::class,'edit_user'])->name('edit_user');
    Route::post('/update{id}',[UserController::class,'update_user'])->name('update_user');
    Route::post('/search',[UserController::class,"show_user"])->name('search');
});

Route::group(['prefix' => 'staff'], function () {
Route::get('/staff_dash',[StaffController::class,'Display_Product'])->name('staff');
Route::get('/search',[StaffController::class,'Display_Product'])->name('search');
Route::get('/orders',[StaffController::class,"Orders"])->name('staff_orders');
Route::get('/view-order/{id}',[StaffController::class,"View_Orders"])->name('staff_view_orders');
Route::put('/update-order/{id}',[StaffController::class,"Update_Order"])->name('staff_update_order');
Route::get('/order-history',[StaffController::class,"Order_History"])->name('staff_order_history');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/category_form',[CategoryController::class,'Category_Form'])->name('add_category');
    Route::post('/category_form',[CategoryController::class,'Add_Category']);
    Route::get('/show_categories',[CategoryController::class,'Display_Category'])->name('category_table');
    Route::get('/delete_categories{id}',[CategoryController::class,'Destroy_Category'])->name('delete_category');
    Route::get('/edit_categories{id}',[CategoryController::class,'Edit_Category'])->name('edit_category');
    Route::post('/update_categories{id}',[CategoryController::class,'Update_Category'])->name('update_category');
    Route::post('/search',[CategoryController::class,"Display_Category"])->name('search');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/product_form',[ProductController::class,'Product_Form'])->name('add_product');
    Route::post('/product_form',[ProductController::class,'Add_Product']);
    Route::get('/show_products',[ProductController::class,'Display_Product'])->name('product_table');
    Route::get('/delete_products{id}',[ProductController::class,'Destroy_Product'])->name('delete_product');
    Route::get('/edit_products{id}',[ProductController::class,'Edit_Product'])->name('edit_product');
    Route::post('/update_products{id}',[ProductController::class,'Update_Product'])->name('update_product');
    Route::post('/search',[ProductController::class,"Display_Product"])->name('search');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/',[OrderController::class,"Orders"])->name('orders');
    Route::get('/view-order/{id}',[OrderController::class,"View_Orders"])->name('view_orders');
    Route::put('/update-order/{id}',[OrderController::class,"Update_Order"])->name('update_order');
    Route::get('/order-history',[OrderController::class,"Order_History"])->name('order_history');
});

Route::group(['prefix' => 'sales'], function () {
    Route::get('/',[SaleController::class,"Go_To_Sale_Page"])->name("sales");
    Route::post('/record',[SaleController::class,"RecordSale"])->name('record_sales');
    Route::get('/sales-history', [SaleController::class, 'salesHistory'])->name('sales_history');
    Route::get('/delete_sale/{id}', [SaleController::class, 'deleteSale'])->name('delete_sale');
    Route::get('/edit_sale/{id}', [SaleController::class, 'editSale'])->name('edit_sale');
    Route::post('/update_sale/{id}', [SaleController::class, 'updateSale'])->name('update_sale');

});

