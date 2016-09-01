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

Route::group(['middleware' => ['check_if_admin']], function() {
    Route::group(['prefix' => 'admin'], function() {

        Route::get('dashboard', 'UserController@adminDashboard')->name('admin_dashboard');
    });
});