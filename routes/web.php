<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', 'HomeController@home')->name('home');
Route::get('/all', 'HomeController@all')->name('all');
Route::get('/listing/{slug?}', 'HomeController@listing')->name('listing');
Route::get('/store/{slug?}', 'HomeController@store')->name('store');

Route::get('/admin/login', 'Auth\AuthenticatedSessionController@adminLogin')->name('admin.login');

// Auth Routes
Route::middleware('auth')->group(function() {
    Route::get('/post-ad', 'HomeController@postAd')->name('post.ad');
    Route::post('/post-ad-save', 'HomeController@postAdSave')->name('post.ad.save');
    Route::get('/add-to-fav/{id?}', 'HomeController@addToFav')->name('add.fav');
    Route::get('/remove-fav/{id?}', 'HomeController@removeFav')->name('remove.fav');
    Route::get('/cart', 'HomeController@cart')->name('cart');
    Route::get('/add-to-cart/{id?}', 'HomeController@addToCart')->name('add.cart');
    Route::get('/remove-cart/{id?}', 'HomeController@removeCart')->name('remove.cart');
    Route::get('/checkout', 'HomeController@checkout')->name('checkout');
    Route::post('/place-order', 'HomeController@placeOrder')->name('place.order');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth', 'admin')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('/list', 'CategoryController@list')->name('list');
        Route::get('/add', 'CategoryController@add')->name('add');
        Route::get('/edit/{id?}', 'CategoryController@edit')->name('edit');
        Route::post('/save/{id?}', 'CategoryController@save')->name('save');
        Route::get('/delete/{id?}', 'CategoryController@delete')->name('delete');
        Route::get('/status-change/{id?}', 'CategoryController@statusChange')->name('status.change');
    });
});

// User Routes
Route::prefix('user')->name('user.')->namespace('User')->middleware('auth', 'user')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('favourites', 'DashboardController@favourite')->name('favourite');

    // My Listings
    Route::prefix('listings')->group(function() {
        Route::get('/', 'ListingController@listings')->name('listings');
    });

    // Chat
    Route::prefix('chat')->group(function() {
        Route::get('/', 'ChatController@chat')->name('chat');
    });

    // Store Settings
    Route::prefix('store')->group(function() {
        Route::get('/', 'StoreController@store')->name('store');
        Route::post('logo', 'StoreController@storeLogo')->name('store.logo');
        Route::post('banner', 'StoreController@storeBanner')->name('store.banner');
        Route::post('information', 'StoreController@storeInformation')->name('store.information');
        Route::post('schedule', 'StoreController@storeSchedule')->name('store.schedule');
        Route::post('social', 'StoreController@storeSocial')->name('store.social');
        Route::post('location', 'StoreController@storeLocation')->name('store.location');
    });

    // Account Settings
    Route::prefix('settings')->group(function() {
        Route::get('/', 'SettingController@settings')->name('settings');
        Route::post('upload-avatar', 'SettingController@uploadAvatar')->name('upload.avatar');
        Route::post('personal', 'SettingController@personal')->name('personal');
        Route::post('contact', 'SettingController@contact')->name('contact');
        Route::post('password', 'SettingController@password')->name('password');
        Route::post('location', 'SettingController@location')->name('location');
    });
});
