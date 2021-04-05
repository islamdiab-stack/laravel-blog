<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// -->>> Homepage route
Route::get('/home', 'HomeController@index')->name('home');

// -->>> about route
Route::get('/about', 'PagesController@getAbout')->name('about');

// -->>> contact route
Route::get('/contact', 'PagesController@getContact')->name('contact');

// -->> Profile route
// Route::get('/profile', "ProfileController@index")->name('profile');

Route::resource('profile', 'ProfileController')->only([
    'index','update'
])->parameters([
    'profile' => 'profile'
])->names([
    'index' => 'profile.index',
    'update' => 'profile.update'
]);
// Route::get('profile/setting', 'ProfileController@setting')->name('profile.setting');

// -->> Post Route
Route::resource('posts', 'PostController')->parameters([
    'posts' => 'post'
])->names([
    'index' => 'posts.index',
    'create' => 'post.create',
    'store' => 'post.store',
    'show' => 'post.show',
    'edit' => 'post.index',
    'update' => 'post.update',
    'destroy' => 'post.destroy'
]);
Route::get('posts/trashed', 'PostController@postsTrashed')->name('posts.trashed');
Route::get('posts/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
Route::get('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
