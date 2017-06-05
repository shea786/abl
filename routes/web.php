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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/users'], function () {
        Route::post('/approve/{id}','admin\adminUsersController@markApprove')->name('admin.users.markApprove');
        Route::post('/rejecte/{id}','admin\adminUsersController@markRejected')->name('admin.users.markReject');
        Route::get('/',[
            'uses' => 'admin\adminUsersController@index',
            'as' => 'admin.users.index',
            'middleware' => ['auth', 'acl'],
            'is' => 'administrator'
        ]);
    });
    
    Route::group(['prefix' => '/roles'], function () {
        Route::get('/create','admin\adminRolesController@create')->name('admin.roles.create');
        Route::post('/create','admin\adminRolesController@store')->name('admin.roles.store');
        Route::get('/{slug}','admin\adminRolesController@show')->name('admin.roles.show');
        Route::get('/{slug}/add/user','admin\adminRolesController@addUser')->name('admin.roles.addUser');
        Route::post('/{slug}/add/user','admin\adminRolesController@addUserStore')->name('admin.roles.addUserStore');
        Route::get('/','admin\adminRolesController@index')->name('admin.roles.index');
    });
});
