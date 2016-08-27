<?php


Route::get('/', function () {
    return redirect()->to('/login');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
