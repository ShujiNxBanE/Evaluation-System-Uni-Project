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

Route::get('/app/proceso', function(){
    return view('proceso/main');
});

Route::get('/app/login', function(){
    return view('portafolio/login');
});

Route::get('/app/registro', function(){
    return view('registro');
});

Route::get('/app/proceso/datosInstitucionales', function(){
    return view('proceso/datosInstitucionales');
});

Route::get('/app/proceso/tarjetaDePuntuacion', function(){
    return view('proceso/tarjetaDePuntuacion');
});

Route::get('/app/proceso/apoyoInstitucional', function(){
    return view('proceso/apoyoInstitucional');
});

Route::get('/app/proceso/apoyoTecnologico', function(){
    return view('proceso/apoyoTecnologico');
});

Route::get('/app/proceso/desarrolloDiseno', function(){
    return view('proceso/desarrolloDiseno');
});

Route::get('/app/proceso/estructuraPrograma', function(){
    return view('proceso/estructuraPrograma');
});

Route::get('/app/proceso/ensenanzaAprendizaje', function(){
    return view('proceso/ensenanzaAprendizaje');
});

Route::get('/app/proceso/participacion', function(){
    return view('proceso/participacion');
});

Route::get('/app/proceso/apoyoDocente', function(){
    return view('proceso/apoyoDocente');
});

Route::get('/app/proceso/apoyoAlumno', function(){
    return view('proceso/apoyoAlumno');
});

Route::get('/app/proceso/evaluacionValoracion', function(){
    return view('proceso/evaluacionValoracion');
});

Route::get('/app/proceso/informeFinal', function(){
    return view('proceso/informeFinal');
});

Route::get('/app/proceso/puntuacion', function(){
    return view('proceso/puntuacion');
});

Route::get('/app/proceso/subirInformeFinal', function(){
    return view('proceso/subirInformeFinal');
});

Route::get('/app/proceso/gestorArchivos', function(){
    return view('gestor-archivos');
});

Route::get('/app/proceso/informeIndicador', function(){
    return view('informe-indicador');
});
