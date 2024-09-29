<?php

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
Route::prefix('/adminpanel')->group(function(){
    Route::middleware('IsAdmin')->group(function(){
        Route::view('/','layouts.admin')->name('adminpanel');
        Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
            Route::get('/slider','index')->name('slider.admin.view');
            Route::get('/slider/create','create')->name('slider.admin.create');
            Route::post('/slider/store','store')->name('slider.admin.store');
            Route::get('/slider/edit/{slider_id}','edit')->name('slider.admin.edit');
            Route::put('/slider/update/{slider_id}','update')->name('slider.admin.update');
            Route::get('/slider/delete/{slider_id}','destory')->name('slider.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
            Route::get('/category','index')->name('category.admin.view');
            Route::get('/category/create','create')->name('category.admin.create');
            Route::post('/category/store','store')->name('category.admin.store');
            Route::get('/category/edit/{category_id}','edit')->name('category.admin.edit');
            Route::put('/category/update/{category_id}','update')->name('category.admin.update');
            Route::get('/category/delete/{category_id}','destory')->name('category.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\ChefController::class)->group(function(){
            Route::get('/chef','index')->name('chef.admin.view');
            Route::get('/chef/create','create')->name('chef.admin.create');
            Route::post('/chef/store','store')->name('chef.admin.store');
            Route::get('/chef/edit/{chef_id}','edit')->name('chef.admin.edit');
            Route::put('/chef/update/{chef_id}','update')->name('chef.admin.update');
            Route::get('/chef/delete/{chef_id}','destory')->name('chef.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function(){
            Route::get('/setting','index')->name('setting.admin.view');
            Route::get('/setting/edit','edit')->name('setting.admin.edit');
            Route::put('/setting/update','update')->name('setting.admin.update');
            Route::post('/gallery/store/images','StoreGallery')->name('gellery.admin.store');
            Route::delete('/gallery/delete/image/{image_id}','DeleteGalleryImage')->name('gellery.image.admin.delete');
            Route::put('/gallery/update/image/{image_id}','UpdateGalleryImage')->name('gellery.image.admin.update');
        });
        Route::controller(App\Http\Controllers\Admin\FoodController::class)->group(function(){
            Route::get('/food','index')->name('food.admin.view');
            Route::get('/food/create','create')->name('food.admin.create');
            Route::post('/food/store','store')->name('food.admin.store');
            Route::get('/food/edit/{food_id}','edit')->name('food.admin.edit');
            Route::put('/food/update/{food_id}','update')->name('food.admin.update');
            Route::get('/food/delete/{food_id}','destory')->name('food.admin.delete');
        });
    
        Route::controller(App\Http\Controllers\Admin\BookingController::class)->group(function(){
            Route::get('/booking','index')->name('booking.admin.view');
            Route::get('/booking/edit/{booking_id}','edit')->name('booking.admin.edit');
            Route::put('/booking/update/{booking_id}','update')->name('booking.admin.update');
            Route::get('/booking/delete/{booking_id}','destory')->name('booking.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\EventController::class)->group(function(){
            Route::get('/event','index')->name('event.admin.view');
            Route::get('/event/create','create')->name('event.admin.create');
            Route::post('/event/store','store')->name('event.admin.store');
            Route::get('/event/edit/{event_id}','edit')->name('event.admin.edit');
            Route::put('/event/update/{event_id}','update')->name('event.admin.update');
            Route::get('/event/delete/{event_id}','destory')->name('event.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\TableController::class)->group(function(){
            Route::get('/table','index')->name('table.admin.view');
            Route::get('/table/create','create')->name('table.admin.create');
            Route::post('/table/store','store')->name('table.admin.store');
            Route::get('/table/edit/{table_id}','edit')->name('table.admin.edit');
            Route::put('/table/update/{table_id}','update')->name('table.admin.update');
            Route::get('/table/delete/{table_id}','destory')->name('table.admin.delete');
        });
        Route::controller(App\Http\Controllers\Admin\FeedbackController::class)->group(function(){
            Route::get('/feedback','index')->name('feedback.admin.view');
    
        });
        Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
            Route::get('/orders','index')->name('order.admin.view');
            Route::get('/order/create','create')->name('order.admin.create');
            Route::post('/order/store','store')->name('order.admin.store');
            Route::get('/order/edit/{order_id}','edit')->name('order.admin.edit');
            Route::put('/order/update/{order_id}','update')->name('order.admin.update');
            Route::get('/order/delete/{order_id}','destory')->name('order.admin.delete');
            Route::get('order/today', 'OrderToday')->name('order.today');
            Route::post('order/update/status/{order_id}', 'UpdateOrderStatus')->name('order.updatestatus');
        });
        Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function(){
            Route::get('/profile','ViewProfile')->name('profile.admin.view');
    
        });
        
    });


});
require __DIR__.'/adminauth.php';