<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/product/{id}', [HomeController::class,'product'])->name('home_product');

//cart
Route::get('/cart/add/{id}', [CartController::class,'addCart'])->middleware(['auth','verified'])->name('add_cart');
Route::get('/cart/remove/{id}', [CartController::class,'addCart'])->middleware(['auth','verified'])->name('remove_cart');
Route::get('/cart', [CartController::class,'ShowCart'])->middleware(['auth','verified'])->name('cart');

//order
Route::get('/order', [OrderController::class,'index'])->middleware(['auth','verified'])->name('order');
Route::post('/order/add', [OrderController::class,'create'])->middleware(['auth','verified'])->name('make_order');



Route::get('/dashboard', [PageController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin
Route::get('/admin',[AdminController::class,'dashboard'])->name('admin')->middleware(['auth','admin']);
Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('adminDashboard')->middleware(['auth','admin']);
Route::get('admin/users',[AdminController::class,'users'])->name('admin_users')->middleware(['auth','admin']);
Route::get('admin/user/{id}',[AdminController::class,'userProfile'])->name('admin_user')->middleware(['auth','admin']);
Route::post('admin/user/update/{id}',[AdminController::class,'userUpdate'])->name('admin_user_update')->middleware(['auth','admin']);
Route::get('admin/user/verify/{id}',[AdminController::class,'userVerify'])->name('admin_user_verify')->middleware(['auth','admin']);
Route::get('admin/user/delete/{id}',[AdminController::class,'deleteUser'])->name('admin_user_delete')->middleware(['auth','admin']);

//category
Route::get('admin/category',[CategoryController::class,'show'])->name('category')->middleware(['auth','admin']);
Route::post('admin/category',[CategoryController::class,'store'])->name('category')->middleware(['auth','admin']);
Route::get('admin/category/remove/{id}',[CategoryController::class,'delete'])->name('delete_category')->middleware(['auth','admin']);
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('edit_category')->middleware(['auth','admin']);
Route::post('admin/category/update/{id}',[CategoryController::class,'update'])->name('update_category')->middleware(['auth','admin']);

//product
Route::get('admin/products',[ProductController::class,'show'])->name('products')->middleware(['auth','admin']);
Route::post('admin/product/new',[ProductController::class,'store'])->name('new_product')->middleware(['auth','admin']);
Route::get('admin/product/add',[ProductController::class,'index'])->name('add_product')->middleware(['auth','admin']);
Route::get('admin/product/remove/{id}',[ProductController::class,'delete'])->name('delete_product')->middleware(['auth','admin']);
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('edit_product')->middleware(['auth','admin']);
Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('update_product')->middleware(['auth','admin']);
Route::get('admin/product/search',[ProductController::class,'search'])->name('search_product')->middleware(['auth','admin']);

//order
Route::get('admin/orders',[OrderController::class,'index'])->name('orders')->middleware(['auth','admin']);
Route::get('admin/orders/process/{id}',[OrderController::class,'process'])->name('process_order')->middleware(['auth','admin']);
Route::get('admin/orders/print/{id}',[OrderController::class,'print'])->name('print_order')->middleware(['auth','admin']);

//user orders
Route::get('/orders',[OrderController::class,'orders'])->name('user_orders')->middleware(['auth','verified']);

//payments
Route::post('/payment/pay', [PaystackController::class, 'redirectToGateway'])->name('pay')->middleware(['auth','verified']);
Route::get('/callback', [PaystackController::class, 'handleGatewayCallback'])->name('callback');

//email testing
Route::get('/mail', [EmailController::class, 'welcomeEmail']);
Route::get('/email', [EmailController::class, 'view']);