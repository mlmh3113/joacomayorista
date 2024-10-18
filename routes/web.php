<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BannerController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/',[MainController::class, 'index'])->name('index');
Route::get('/contact',[MainController::class, 'contact'])->name('contact');

Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

//categories
Route::get('/categories',[CategoryController::class, 'index'])->name('categories');
Route::post('/categories/store',[CategoryController::class,'store'])->name('category.store');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/categories/json', [CategoryController::class, 'categoriesJson'])->name('category.json');

//products
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('products/search/{category}', [ProductController::class, 'searchByCategory'])->name('product.category');

//carrito

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


//compra

Route::post('/compra', [CartController::class, 'store'])->name('compra.store');

//news

Route::post('newsLetter',[NewsController::class, 'store'])->name('newsLetter.store');

//mail
// Route::get('/mail',[MailController::class, 'index'])->name('mail.index');

// Route::get('/mail/send',[MailController::class, 'mailFactura'])->name('mail.send');

//eitar imagen

Route::get('/image/edit', [ImageController::class, 'index'])->name('image.edit');

//edit banner

Route::get('/banner/edit', [BannerController::class, 'index'])->name('banner.edit');
Route::post('/banner/edit', [BannerController::class, 'store'])->name('banner.store');

require __DIR__.'/auth.php';
