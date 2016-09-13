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

// Super Admin Account
Route::group(['middleware' => ['verify_if_user_is_super_admin']], function() {
    Route::group(['prefix' => 'super_admin'], function() {

        Route::get('dashboard', 'UserController@superAdminDashboard')->name('super_admin_dashboard');

        Route::get('users', 'UserController@superAdminUserIndex')->name('super_admin_user_index');
    });
});

// Admin Account
Route::group(['middleware' => ['verify_if_user_is_admin']], function() {
    Route::group(['prefix' => 'admin'], function() {

        Route::get('dashboard', 'UserController@adminDashboard')->name('admin_dashboard');

        Route::get('users', 'UserController@adminUserIndex')->name('admin_user_index');
        Route::get('create/user/', 'UserController@adminCreateUser')->name('admin_create_user');
        Route::post('create/user/', 'UserController@adminPostUser')->name('post_create_user');



        Route::get('customers', 'CustomerController@adminCustomerIndex')->name('admin_customer_index');
        Route::get('create/customer', 'CustomerController@adminCreateCustomer')->name('admin_customer_create');
        Route::post('create/customer', 'CustomerController@adminPostCustomer')->name('post_create_customer');
    });
});

// Collection Account
Route::group(['middleware' => ['verify_if_user_is_collection']], function() {
    Route::group(['prefix' => 'collection'], function() {

        Route::get('dashboard', 'UserController@collectionDashboard')->name('collection_dashboard');
    });
});

// User Account
Route::group(['middleware' => ['verify_if_user_is_user']], function() {
    Route::group(['prefix' => 'user'], function() {

        Route::get('dashboard', 'UserController@userDashboard')->name('user_dashboard');
    });
});

// Assistant Account
Route::group(['middleware' => ['verify_if_user_is_assistant']], function() {
    Route::group(['prefix' => 'assistant'], function() {

        Route::get('dashboard', 'UserController@assistantDashboard')->name('assistant_dashboard');
    });
});