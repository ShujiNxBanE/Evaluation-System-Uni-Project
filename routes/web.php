<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function(){
    return view('main');
});

Route::get('/app/estructura', function(){
    return view('estructura');
});

Route::get('/app/login', function(){
    return view('login');
});

Route::get('/app/registro', function(){
    return view('registro');
});
