<?php


Route::get('/', function () {
    if(Auth::guard()->guest()) {
        return redirect()->to('login');
    }

    return redirect()->to('/home');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
