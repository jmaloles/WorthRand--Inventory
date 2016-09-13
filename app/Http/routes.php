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

Route::group(['middleware' => 'check_if_user_is_super_admin'], function() {
    Route::group(['prefix' => 'super_admin'], function() {
        Route::get('dashboard', 'UserController@superAdminDashboard')->name('super_admin_dashboard');

        Route::get('users', 'UserController@superAdminUserIndex')->name('super_admin_user_index');
    });
});

// Admin Account
Route::group(['middleware' => ['verify_if_user_is_admin']], function() {
    Route::group(['prefix' => 'admin'], function() {
        # DASHBOARD
        Route::get('dashboard', 'UserController@adminDashboard')->name('admin_dashboard');

        # USERS
        Route::get('users', 'UserController@adminUserIndex')->name('admin_user_index');
        Route::get('create/user/', 'UserController@adminCreateUser')->name('admin_create_user');
        Route::post('create/user/', 'UserController@adminPostUser')->name('post_create_user');
        Route::get('/sales_engineers', 'UserController@showSalesEngineers')->name('admin_sales_engineer_index');

        # ITEMS
        Route::get('/items', 'ItemController@index')->name('items');
        Route::get('/item/create/group', 'ItemController@adminCreateGroup')->name('admin_create_group');
        Route::post('/item/create/group', 'ItemController@adminPostGroup')->name('admin_post_group');
        Route::get('/after_markets', 'ItemController@afterMarketIndex')->name('after_market_index');
        Route::get('/after_market/create', 'ItemController@createAfterMarket')->name('create_after_market');
        Route::post('/after_market/create', 'ItemController@postAfterMarket')->name('post_after_market');
        Route::get('create/project', 'ItemController@createProject')->name('create_project');
        Route::post('create/project', 'ItemController@postProject')->name('post_project');

        # CUSTOMERS
        Route::get('customers', 'CustomerController@adminCustomerIndex')->name('admin_customer_index');
        Route::get('create/customer', 'CustomerController@adminCreateCustomer')->name('admin_customer_create');
        Route::post('create/customer', 'CustomerController@adminPostCustomer')->name('post_create_customer');


    });
});
