<?php

use App\Http\Controllers\Frontend\OnlinePaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home.page');
Route::middleware('auth:web')->group(function(){
    Route::get('/cartview',[\App\Http\Controllers\Frontend\CartController::class,'cartview'])->name('cart.view');
    Route::post('/booking',[\App\Http\Controllers\Frontend\HomeController::class,'BookingTable'])->name('booking.table');
    Route::get('/profileview',[\App\Http\Controllers\Frontend\UserController::class,'ProfileView'])->name('profile.view');
    Route::get('/profileedit/{user_id}',[\App\Http\Controllers\Frontend\UserController::class,'EditProfile'])->name('edit.userprofile');
    Route::get('/chengepassword',[\App\Http\Controllers\Frontend\UserController::class,'ChangePassword'])->name('change.password');
    Route::get('/availabletable',[\App\Http\Controllers\Frontend\HomeController::class,'GetAvailableTable'])->name('available.time');
    Route::post('/send-feedback',[\App\Http\Controllers\Frontend\FeedbackController::class,'SendFeedback'])->name('send.feedback');
    Route::post('/add_to_cart/{food_id}',[\App\Http\Controllers\Frontend\CartController::class,'AddToCart'])->name('add.to.cart');
    Route::get('/user/orders',[\App\Http\Controllers\Frontend\UserController::class,'UserOrders'])->name('user.orders.view');
    Route::get('/user/reservations',[\App\Http\Controllers\Frontend\UserController::class,'UserReservations'])->name('user.reservations.view');
    Route::get('/user/reorder/{order_id}',[\App\Http\Controllers\Frontend\UserController::class,'Reorder'])->name('user.reorder');
});
Route::get('/checkout',[\App\HTTP\Controllers\Frontend\CheckoutController::class,'checkoutview'])->name('checkout.view');
Route::post('/checkout/store',[\App\HTTP\Controllers\Frontend\CheckoutController::class,'store'])->name('checkout.store');

Route::get('/test',[\App\Http\Controllers\Frontend\HomeController::class,'test']);


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
