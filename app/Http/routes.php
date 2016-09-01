<?php


Route::get('/', function () {
    if(Auth::guard()->guest()) {
        return redirect()->to('login');
    } else {
        return redirect()->to(Auth::user()->role . '/dashboard');
    }
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['verify_if_user_is_admin']], function() {
        Route::group(['prefix' => 'admin'], function() {

            Route::get('dashboard', 'UserController@adminDashboard')->name('admin_dashboard');
        });


});

Route::group(['middleware' => ['verify_if_user_is_collection']], function() {
    Route::group(['prefix' => 'collection'], function() {

        Route::get('dashboard', 'UserController@collectionDashboard')->name('collection_dashboard');
    });


});

Route::group(['middleware' => ['verify_if_user_is_user']], function() {
    Route::group(['prefix' => 'user'], function() {

        Route::get('dashboard', 'UserController@userDashboard')->name('user_dashboard');
    });


});

Route::group(['middleware' => ['verify_if_user_is_assistant']], function() {
    Route::group(['prefix' => 'assistant'], function() {

        Route::get('dashboard', 'UserController@assistantDashboard')->name('assistant_dashboard');
    });


});