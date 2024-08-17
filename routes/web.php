<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Rutas públicas
// Rutas sin prefijo /app

Route::prefix('/app')->group(function (){
    // Rutas protegidas por autenticación
    // Rutas con prefijo /app
    Route::get('/home', function (){return view('welcome');})->name('welcome');
    Route::get('/registro', function(){return view('registro');})->middleware('check_permission:create_user');

    Route::prefix('/proceso')->group(function (){
        // Rutas protegidas por autenticación
        // Rutas con prefijo /app/proceso
    });
})->middleware('auth:sanctum');

Route::get('/app', function(){
    return view('portafolio/main');
});

Route::get('/app/estructura', function(){
    return view('portafolio/estructura');
})->name('estructura');

Route::get('/app/ponderacion', function(){
    return view('portafolio/ponderacion');
});

Route::get('/app/consideraciones', function () {
    return view('portafolio/consideraciones');
});

Route::get('/app/proceso', function(){
    return view('proceso/main');
});

Route::get('/login', function(){
    if (auth()->check()) {
        return redirect()->route('welcome');
    }
    return view('portafolio/login');
})->name('login');

Route::get('/create/user', [AuthController::class, 'register'])->name('createUser');
Route::get('/login/user', [AuthController::class, 'login'])->name('loginUser');

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

Route::get('/app/no-tienes-permisos', function () {
    return view('no-permission');
});

Route::get('/app/crearPrograma', function(){
    return view('create-program');
});

Route::get('/app/categoria', function(){
    return view('categorias');
});
