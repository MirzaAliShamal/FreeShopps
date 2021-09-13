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
Route::get('/blog/{slug?}', 'HomeController@blog')->name('blog');
Route::get('/category/{slug?}', 'HomeController@blogCategory')->name('blog.category');
Route::post('/post-comment/{id?}', 'HomeController@postComment')->name('post.comment');
Route::get('/all', 'HomeController@all')->name('all');
Route::get('/listing/{slug?}', 'HomeController@listing')->name('listing');
Route::get('/store/{slug?}', 'HomeController@store')->name('store');


Route::get('/post-ad', 'HomeController@postAd')->name('post.ad');
Route::post('/post-ad-save/{id?}', 'HomeController@postAdSave')->name('post.ad.save');
Route::get('/thankyou', 'HomeController@thankyou')->name('thankyou');


Route::get('/admin/login', 'Auth\AuthenticatedSessionController@adminLogin')->name('admin.login');

// Auth Routes
Route::middleware('auth')->group(function() {
    Route::post('/delete-listing-image/{id?}', 'HomeController@deleteListingImage')->name('delete.listing.image');
    Route::get('/add-to-fav/{id?}', 'HomeController@addToFav')->name('add.fav');
    Route::get('/remove-fav/{id?}', 'HomeController@removeFav')->name('remove.fav');
    Route::get('/cart', 'HomeController@cart')->name('cart');
    Route::get('/add-to-cart/{id?}', 'HomeController@addToCart')->name('add.cart');
    Route::get('/remove-cart/{id?}', 'HomeController@removeCart')->name('remove.cart');
    Route::get('/checkout', 'HomeController@checkout')->name('checkout');
    Route::post('/place-order', 'HomeController@placeOrder')->name('place.order');
    Route::get('/notification/{id?}', 'HomeController@notification')->name('notification');
    Route::get('/mark-read/{id?}', 'HomeController@markRead')->name('mark.read');
    Route::get('/mark-unread/{id?}', 'HomeController@markUnread')->name('mark.unread');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth', 'admin')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::post('profile-update', 'DashboardController@profileUpdate')->name('profile.update');
    Route::get('security', 'DashboardController@security')->name('security');
    Route::post('security-update', 'DashboardController@securityUpdate')->name('security.update');

    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('/list', 'CategoryController@list')->name('list');
        Route::get('/add', 'CategoryController@add')->name('add');
        Route::get('/edit/{id?}', 'CategoryController@edit')->name('edit');
        Route::post('/save/{id?}', 'CategoryController@save')->name('save');
        Route::get('/delete/{id?}', 'CategoryController@delete')->name('delete');
        Route::get('/status-change/{id?}', 'CategoryController@statusChange')->name('status.change');
    });

    Route::prefix('listings')->name('listing.')->group(function() {
        Route::get('/', 'ListingController@all')->name('all');
        Route::get('/in-review', 'ListingController@inReview')->name('review');
        Route::get('/published', 'ListingController@published')->name('published');
        Route::get('/rejected', 'ListingController@rejected')->name('rejected');
        Route::get('/delete/{id?}', 'ListingController@delete')->name('delete');
        Route::get('/status-change/{id?}/{status?}', 'ListingController@statusChange')->name('status.change');
    });

    Route::prefix('orders')->name('order.')->group(function() {
        Route::get('/', 'OrderController@all')->name('all');
        Route::get('/active', 'OrderController@active')->name('active');
        Route::get('/completed', 'OrderController@completed')->name('completed');
        Route::get('/cancelled', 'OrderController@cancelled')->name('cancelled');
        Route::get('/delete/{id?}', 'OrderController@delete')->name('delete');
        Route::get('/status-change/{id?}/{status?}', 'OrderController@statusChange')->name('status.change');
    });

    Route::prefix('stores')->name('store.')->group(function() {
        Route::get('/', 'StoreController@all')->name('all');
        Route::get('/active', 'StoreController@active')->name('active');
        Route::get('/disabled', 'StoreController@disabled')->name('disabled');
        Route::get('/delete/{id?}', 'StoreController@delete')->name('delete');
        Route::get('/status-change/{id?}/{status?}', 'StoreController@statusChange')->name('status.change');
    });

    Route::prefix('users')->name('user.')->group(function() {
        Route::get('/', 'UserController@all')->name('all');
        Route::get('/delete/{id?}', 'UserController@delete')->name('delete');
    });

    Route::prefix('earnings')->name('earning.')->group(function() {
        Route::get('/', 'EarningController@all')->name('all');
    });

    Route::prefix('blog-categories')->name('blog.categories.')->group(function() {
        Route::get('/list', 'BlogCategoryController@list')->name('list');
        Route::get('/add', 'BlogCategoryController@add')->name('add');
        Route::get('/edit/{id?}', 'BlogCategoryController@edit')->name('edit');
        Route::post('/save/{id?}', 'BlogCategoryController@save')->name('save');
        Route::get('/delete/{id?}', 'BlogCategoryController@delete')->name('delete');
        Route::get('/status-change/{id?}', 'BlogCategoryController@statusChange')->name('status.change');
    });

    Route::prefix('posts')->name('post.')->group(function() {
        Route::get('/', 'BlogPostController@all')->name('all');
        Route::get('/in-review', 'BlogPostController@inReview')->name('review');
        Route::get('/draft', 'BlogPostController@draft')->name('draft');
        Route::get('/published', 'BlogPostController@published')->name('published');
        Route::get('/rejected', 'BlogPostController@rejected')->name('rejected');
        Route::get('/add', 'BlogPostController@add')->name('add');
        Route::get('/edit/{id?}', 'BlogPostController@edit')->name('edit');
        Route::post('/save/{id?}', 'BlogPostController@save')->name('save');
        Route::get('/delete/{id?}', 'BlogPostController@delete')->name('delete');
        Route::get('/status-change/{id?}/{status?}', 'BlogPostController@statusChange')->name('status.change');
    });

    Route::prefix('comments')->name('comment.')->group(function() {
        Route::get('/', 'BlogCommentController@all')->name('all');
        Route::get('/active', 'BlogCommentController@active')->name('active');
        Route::get('/hidden', 'BlogCommentController@hidden')->name('hidden');
        Route::get('/delete/{id?}', 'BlogCommentController@delete')->name('delete');
        Route::get('/status-change/{id?}/{status?}', 'BlogCommentController@statusChange')->name('status.change');
    });
});

// User Routes
Route::prefix('user')->name('user.')->namespace('User')->middleware('auth', 'user')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('favourites', 'DashboardController@favourite')->name('favourite');

    // My Listings
    Route::prefix('listings')->group(function() {
        Route::get('/', 'ListingController@listings')->name('listings');
        Route::get('/edit/{id?}', 'ListingController@edit')->name('listings.edit');
        Route::get('/delete/{id?}', 'ListingController@delete')->name('listings.delete');
    });

    // Orders
    Route::prefix('order')->group(function() {
        Route::get('/{order_no?}', 'OrderController@order')->name('order');
        Route::get('/status/{order_no?}/{status?}', 'OrderController@status')->name('order.status');
    });

    // Chat
    Route::prefix('chat')->group(function() {
        Route::get('/', 'ChatController@chat')->name('chat');
        Route::get('/get', 'ChatController@get')->name('chat.get');
        Route::post('/save', 'ChatController@save')->name('chat.save');
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
