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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
// Route::get('/gallery', 'PagesController@gallery');
Route::get('/contact', 'PagesController@contact');
Route::post('/message-send', 'MessagesController@store')->name('message.send');
Route::get('/team', 'PagesController@team');
Route::get('/blog', 'PagesController@blog');
Route::get('/blog-detail/{id}', 'PagesController@blogDetail')->name('blog.detail');
Route::get('/apply', 'PagesController@apply');

// Auth::routes();

Route::get('login' ,'Auth\LoginController@showLoginForm');
Route::post('login' ,'Auth\LoginController@login')->name('login');
Route::post('logout' ,'Auth\LoginController@logout')->name('logout');
 

Route::prefix('admin')->middleware('auth')->group(function () {
      Route::get('/', 'PagesController@dashboard')->name('dashboard');

      // Posts Routes
      Route::get('posts', 'PostsController@index')->name('posts'); 
      Route::get('posts/create', 'PostsController@create');
      Route::post('add-post', 'PostsController@store')->name('add.post'); 
      Route::get('edit-post/{id}', 'PostsController@edit')->name('edit.post'); 
      Route::post('update-post/{id}', 'PostsController@update')->name('update.post'); 
      Route::get('delete-post/{id}', 'PostsController@destroy')->name('delete.post'); 
      // Teachers Route
      Route::get('teachers', 'TeacherController@index')->name('teachers'); 
      Route::get('teachers/create', 'TeacherController@create'); 
      Route::post('add-teacher', 'TeacherController@store')->name('add.teacher');
      Route::get('/delete-teacher/{id}', 'TeacherController@destroy')->name('delete.teacher');
      Route::get('/edit-teacher/{id}', 'TeacherController@edit')->name('edit.teacher'); 
      Route::post('/update-teacher/{id}', 'TeacherController@update')->name('update.teacher'); 
      // Messages Route
      Route::get('messages', 'MessagesController@index');
      Route::get('message-delete/{id}', 'MessagesController@destroy')->name('delete.message');
      Route::get('message-read/{id}', 'MessagesController@show')->name('read.message');
      // Achivements Route
      Route::get('achievements', 'AchievementController@index')->name('achievements'); 
      Route::get('achievements/create', 'AchievementController@create');
      Route::post('add-achievement', 'AchievementController@store')->name('add.achievement');
      Route::get('delete-achievement/{id}', 'AchievementController@destroy')->name('delete.achievement');
      Route::get('edit-achievement/{id}', 'AchievementController@edit')->name('edit.achievement');
      Route::post('update-achievement/{id}', 'AchievementController@update')->name('update.achievement');
      // Gallery Links 
      // Route::get('photos', 'GalleryController@index')->name('photos');

      // Settings Route
      Route::get('/settings', 'PagesController@settings');
       Route::post('/update-profile/{id}','PagesController@updateProfile')->name('update.profile');
});