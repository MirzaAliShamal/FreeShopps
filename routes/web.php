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

Route::get('/admin/login', 'Auth\AuthenticatedSessionController@adminLogin')->name('admin.login');
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
