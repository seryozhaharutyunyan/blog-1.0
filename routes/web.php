<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix'=>'post'], function () {
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace'=>'Comment', 'prefix'=>'{post}/comments'], function (){
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix'=>'{post}/likes'], function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=>'admin', 'middleware'=>['auth', 'admin', 'verified']], function (){
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/add', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/add', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
    Route::group(['namespace' => 'Post', 'prefix'=>'post'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/add', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
    Route::group(['namespace' => 'User', 'prefix'=>'users'], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('/add', 'CreateController')->name('admin.users.create');
        Route::post('/', 'StoreController')->name('admin.users.store');
        Route::get('/{user}', 'ShowController')->name('admin.users.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.users.delete');
    });
});
Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix'=>'personal', 'middleware'=>['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Like', 'prefix'=>'like'], function () {
        Route::get('/', 'IndexController')->name('personal.like.index');
        Route::get('/{$post}', 'DeleteController')->name('personal.like.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix'=>'comment'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/Egit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
    Route::group(['namespace' => 'Post', 'prefix'=>'post'], function () {
        Route::get('/', 'IndexController')->name('personal.post.index');
        Route::get('/add', 'CreateController')->name('personal.post.create');
        Route::post('/', 'StoreController')->name('personal.post.store');
        Route::get('/{post}', 'ShowController')->name('personal.post.show');
        Route::get('/{post}/edit', 'EditController')->name('personal.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('personal.post.update');
    });
});
Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix'=>'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::group(['namespace' => 'Post', 'prefix'=>'{category}/posts'], function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});
Auth::routes(['verify'=>true]);

