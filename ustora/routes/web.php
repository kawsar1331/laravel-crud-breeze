<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
// Frontend Routing
Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/single-product', 'singleproduct')->name('singleproduct');
    Route::get('/single-product1/{id}', 'singleproduct1')->name('singleproduct1');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');

});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Backend Routing
Route::controller(BackendController::class)->group(function() {
    Route::get('/login-page', 'loginpage')->name('loginpage');
    Route::post('/admin-login', 'adminlogin')->name('adminlogin');
    Route::get('/admin-logout', 'adminlogout')->name('adminlogout');
});
// User Routing
Route::controller(UserController::class)->group(function() {
    Route::get('/register-page', 'registerpage')->name('registerpage');
    Route::get('/add-user', 'adduser')->name('adduser');
    Route::post('/added-user', 'addeduser')->name('addeduser');
    Route::get('/manage-user', 'manageuser')->name('manageuser');
    
});

// Product Routing
Route::controller(ProductController::class)->group(function() {
    Route::get('/add-product', 'addproduct')->name('addproduct');
    Route::post('/added-product', 'addedproduct')->name('addedproduct');
    Route::get('/manage-product', 'manageproduct')->name('manageproduct');
    Route::get('/delete-product/{id}', 'deleteproduct')->name('deleteproduct');
    Route::get('/edit-product/{id}', 'editproduct')->name('editproduct');
    Route::post('/update-product/{id}', 'updateproduct')->name('updateproduct');
    Route::get('/active-status/{id}', 'active')->name('active');
    Route::get('/inactive-status/{id}', 'inactive')->name('inactive');
    
});
