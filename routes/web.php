<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index')->name('list_posts');

Route::group(['prefix' => 'post'], function(){

	Route::get('/drafts', 'PostController@drafts')
		->name('list_drafts')
		->middleware('auth');

	Route::get('/published', 'PostController@published_posts')
		->name('list_published_posts')
		->middleware('auth');

	Route::get('/show/{id}', 'PostController@show')
		->name('show_post');

	Route::get('/show_draft/{id}', 'PostController@show_draft')
		->name('show_draft');

	Route::get('/create', 'PostController@create')
		->name('create_post')
		->middleware('can:create-post');

	Route::post('/create', 'PostController@store')
		->name('store_post')
		->middleware('can:create-post');

	Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:update-post,post');
        
    Route::post('/edit/{post}', 'PostController@update')
        ->name('update_post')
        ->middleware('can:update-post,post');

	Route::get('/publish/{post}', 'PostController@publish')
		->name('publish_post')
		->middleware('can:publish-post');

	Route::get('/unpublish/{post}', 'PostController@unpublish')
		->name('unpublish_post')
		->middleware('can:publish-post');

	Route::get('/activate/{post}', 'PostController@activate')
		->name('activate_post')
		->middleware('can:activate-post');

	Route::get('/deactivate/{post}', 'PostController@deactivate')
		->name('deactivate_post')
		->middleware('can:publish-post');

	Route::get('/delete/{post}', 'PostController@delete')
		->name('delete_post')
		->middleware('auth');

	Route::get('/deleted', 'PostController@deleted')
		->name('list_deleted_posts')
		->middleware('can:activate-post');

	Route::get('/restore/{post}', 'PostController@restore')
		->name('restore_post')
		->middleware('can:activate-post');

	Route::post('/review/{id}', 'ReviewController@store')
		->name('review_post')
		->middleware('auth');
		
});

Route::group(['prefix' => 'profile'], function(){

	Route::get('/', 'ProfileController@index')
		->name('profile_index')
		->middleware('auth');

	Route::get('/change_image', 'ProfileController@change_image')
		->name('profile_change_image')
		->middleware('auth');

	Route::post('/change_image', 'ProfileController@update_image')
		->name('profile_update_image')
		->middleware('auth');

});