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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::prefix('dashboard')->group(function () {
    Route::get('/', 'Dashboard\BlogController@index')->name('blog-list');
    Route::prefix('blog')->group(function () {
      Route::get('add', 'Dashboard\BlogController@create')->name('add-blog');
      Route::post('add', 'Dashboard\BlogController@store')->name('add-blog');
      Route::get('user/profile', 'Dashboard\BlogController@update')->name('user-profile');
      Route::post('user/profile', 'Dashboard\BlogController@update')->name('user-profile');
      Route::get('details/{id}', 'Dashboard\BlogController@show')->name('blog-details');
      Route::get('delete/{id}', 'Dashboard\BlogController@destroy')->name('blog-delete');
      Route::get('edit/{id}', 'Dashboard\BlogController@edit')->name('blog-edit');
    });
  });
});
