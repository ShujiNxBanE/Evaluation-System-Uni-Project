<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function(){
    return view('portafolio/main');
});

Route::get('/app/estructura', function(){
    return view('portafolio/estructura');
});

Route::get('/app/ponderacion', function(){
    return view('portafolio/ponderacion');
});

Route::get('/app/consideraciones', function () {
    return view('portafolio/consideraciones');
});

Route::get('/app/manual', function(){
    return view('portafolio/manual');
});

Route::get('/app/proceso', function(){
    return view('proceso/main');
});


Route::get('/app/login', function(){
    return view('login');
});

Route::get('/app/registro', function(){
    return view('registro');
});
