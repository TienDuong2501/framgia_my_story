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
Route::get('/', 'User\PostController@getAllPost')->name('get-all-post');
Route::get('/paginate', 'User\PostController@ajaxPagination');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['editor'], 'prefix' => 'admin'], function () {

    Route::get('/home', 'Admin\UserController@index')->name('admin.home');
    Route::group(['middleware' => 'admin'], function () {
	    Route::get('getuser', 'Admin\UserController@showUser')->name('show-user');
	    Route::post('deactiveUser', 'Admin\UserController@deactiveUser')->name('deactive-user');
	    Route::get('getDeactiveUser', 'Admin\UserController@getDeactiveUser')->name('get-deactive-user');
	    Route::post('deleteUser', 'Admin\UserController@deleteUser')->name('delete-user');
	    Route::post('activeUser', 'Admin\UserController@activeUser')->name('active-user');
	    Route::get('search', 'Admin\UserController@search')->name('search');
	    Route::post('userSearch', 'Admin\UserController@searchUser')->name('search-user');
	    Route::get('editUser', 'Admin\UserController@showEditForm')->name('show-edit-form');
	    Route::post('editUser', 'Admin\UserController@editUser')->name('edit-user');
	    Route::get('showPendingPost', 'Admin\PostController@showAllPendingPost')->name('show-pending-post');
	});
});

Route::group(['middleware' => 'auth'],function () {
    Route::get('postDetail/{id}', 'User\PostController@showPostDetail')->name('show-post-detail');
    Route::get('createPost', 'User\PostController@showPostForm')->name('show-post-form');
    Route::post('createPost', 'User\PostController@createPost')->name('create-post');
    Route::get('mypost', 'User\PostController@showAllMyPost')->name('my-post');
    Route::get('viewMyPost', 'User\PostController@viewMyPost')->name('view-my-post');
    Route::get('editMyPost', 'User\PostController@showMyPostForm')->name('show-mypost-form');
    Route::post('deletePost', 'User\PostController@deletePost')->name('delete-post');
    Route::post('editMyPost', 'User\PostController@editMyPost')->name('edit-mypost');
});



