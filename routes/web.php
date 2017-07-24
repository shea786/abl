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
//public routes

Route::get('/', 'HomeController@index')->name('default');
Route::get('/home', 'HomeController@index')->name('home.index');


Route::group(['prefix' => '/inbox',
    'middleware' => ['auth','acl'],
    'is' => 'administrator'
],function(){
    Route::get('/', 'MessageController@index')->name('inbox.index');
    Route::get('/{inbox_id}', 'MessageController@getMessages')->name('inbox.messages.get');
    Route::post('/{inbox_id}', 'MessageController@postMessages')->name('inbox.messages.post');
});

Route::group(['prefix' => '/about-us'],function(){
    Route::get('/', 'AboutUsController@index')->name('aboutus.index');
});

Route::group(['prefix' => '/services'],function(){
    Route::get('/', 'ServicesController@index')->name('services.index');
});

Route::group(['prefix' => '/forum'],function(){
    Route::get('/', 'ForumController@index')->name('forum.index');
});

Route::group(['prefix' => '/blog'],function(){
    Route::post('/{slug}','BlogController@addComment')->name('blog.add.comment');
    Route::get('/{slug}','BlogController@show')->name('blog.show');
    Route::get('/','BlogController@index')->name('blog.index');#
});


Route::group(['prefix' => '/contact'],function(){
    Route::post('/','ContactController@store')->name('contact.store');
    Route::get('/','ContactController@index')->name('contact.index');
});



//Administrator Routes 

Route::group(['prefix' => '/admin',
    'middleware' => ['auth','acl'],
    'is' => 'administrator'
],function () {
    Route::group(['prefix' => '/users'],function () {
        Route::post('/rejecte/{id}','admin\adminUsersController@markRejected')->name('admin.users.markReject');
        Route::post('/approve/{id}','admin\adminUsersController@markApprove')->name('admin.users.markApprove');
        Route::post('/edit/{id}','admin\adminUsersController@update')->name('admin.users.update');
        Route::get('/edit/{id}','admin\adminUsersController@edit')->name('admin.users.edit');
        Route::get('/','admin\adminUsersController@index')->name('admin.users.index');
    });
    
    Route::group(['prefix' => '/roles'], function () {
        Route::get('/create','admin\adminRolesController@create')->name('admin.roles.create');
        Route::post('/create','admin\adminRolesController@store')->name('admin.roles.store');
        Route::get('/{slug}','admin\adminRolesController@show')->name('admin.roles.show');
        Route::get('/{slug}/add/user','admin\adminRolesController@addUser')->name('admin.roles.addUser');
        Route::post('/{slug}/add/user','admin\adminRolesController@addUserStore')->name('admin.roles.addUserStore');
        Route::get('/','admin\adminRolesController@index')->name('admin.roles.index');
    });
    
    Route::group(['prefix' => '/blogs'],function () {
        Route::get('/approve/{id}','admin\adminBlogController@markApprove')->name('admin.blogs.mark.approve');
        Route::post('/edit/{id}','admin\adminBlogController@update')->name('admin.blogs.update');
        Route::get('/edit/{id}','admin\adminBlogController@edit')->name('admin.blogs.edit');
        Route::post('/create','admin\adminBlogController@store')->name('admin.blogs.store');
        Route::get('/create','admin\adminBlogController@create')->name('admin.blogs.create');
        Route::get('/','admin\adminBlogController@index')->name('admin.blogs.index');
    });
    
    Route::group(['prefix' => '/category'],function () {
        Route::post('/edit/{id}','admin\adminCategoryController@update')->name('admin.categories.update');
        Route::get('/edit/{id}','admin\adminCategoryController@edit')->name('admin.categories.edit');
        Route::post('/create','admin\adminCategoryController@store')->name('admin.categories.store');
        Route::get('/create','admin\adminCategoryController@create')->name('admin.categories.create');
        Route::get('/','admin\adminCategoryController@index')->name('admin.categories.index');
    });
    
  
    
});
