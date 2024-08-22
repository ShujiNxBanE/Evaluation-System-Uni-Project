<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\Institutional_DataController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function(){
    if (Auth::check()) {
        return redirect()->route('portfolio_index');
    }
    return view('/login');
})->name('login');

Route::get('/create/user', [AuthController::class, 'register'])->name('createUser');
Route::get('/login/user', [AuthController::class, 'login'])->name('loginUser');
Route::post('/logout' , [AuthController::class, 'logout'])->name('logoutUser');

Route::prefix('/portfolio')->group(function (){
    Route::get('/no_permission', function () { return view('no_permission'); })->name('no_permission');

    Route::get('/index', function(){ return view('portfolio/index'); })->name('portfolio_index');
    Route::get('/structure', function(){ return view('portfolio/structure'); })->name('structure');
    Route::get('/ponderation', function(){ return view('portfolio/ponderation'); })->name('ponderation');
    Route::get('/considerations', function () { return view('portfolio/considerations'); })->name('considerations');

    Route::middleware('check_permission:create_user, create, show, edit, update, destroy, show_details')->group(function(){
        Route::prefix('/admin')->group(function(){

            Route::get('/create_user', function(){return view('create_user');})->name('create_user');

            // Route for programs crud

            Route::get('/programs', [ProgramController::class, 'index'])->name('programs');

            Route::get('/programs/create', [ProgramController::class, 'create'])->name('create_programs');

            Route::get('/create_new_program', [ProgramController::class, 'store'])->name('create_new_program');

            Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('show_program_details');

            Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('edit_program');

            Route::get('/programs/{program}/update', [ProgramController::class, 'update'])->name('update_program');

            Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('destroy_program');

            //Route for categories crud

            Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

            Route::get('/categories/create', [CategoryController::class, 'create'])->name('create_categories');

            Route::get('/create_new_category', [CategoryController::class, 'store'])->name('create_new_category');

            Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('show_category_details');

            Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('edit_category');

            Route::get('/categories/{category}/update', [CategoryController::class, 'update'])->name('update_category');

            Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('destroy_category');

            //Route for evaluations crud

            Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations');

            Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('create_evaluations');

            Route::get('/create_new_evaluation', [EvaluationController::class, 'store'])->name('create_new_evaluation');

            Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('show_evaluation_details');

            Route::get('/evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('edit_evaluation');

            Route::get('/evaluations/{evaluation}/update', [EvaluationController::class, 'update'])->name('update_evaluation');

            Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('destroy_evaluation');

            //Route for evidences crud

            Route::get('/evidences', [EvidenceController::class, 'index'])->name('evidences');

            Route::get('/evidences/create', [EvidenceController::class, 'create'])->name('create_evidences');

            Route::get('/create_new_evidence', [EvidenceController::class, 'store'])->name('create_new_evidence');

            Route::get('/evidences/{evidence}', [EvidenceController::class, 'show'])->name('show_evidence_details');

            Route::get('/evidences/{evidence}/edit', [EvidenceController::class, 'edit'])->name('edit_evidence');

            Route::get('/evidences/{evidence}/update', [EvidenceController::class, 'update'])->name('update_evidence');

            Route::delete('/evidences/{evidence}', [EvidenceController::class, 'destroy'])->name('destroy_evidence');

            //Route for reports crud

            Route::get('/reports', [ReportController::class, 'index'])->name('reports');

            Route::get('/reports/create', [ReportController::class, 'create'])->name('create_reports');

            Route::get('/create_new_report', [ReportController::class, 'store'])->name('create_new_report');

            Route::get('/reports/{report}', [ReportController::class, 'show'])->name('show_report_details');

            Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('edit_report');

            Route::get('/reports/{report}/update', [ReportController::class, 'update'])->name('update_report');

            Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('destroy_report');

            //Route for institutional_datas crud

            Route::get('/institutional_datas', [Institutional_DataController::class, 'index'])->name('institutional_datas');

            Route::get('/institutional_datas/create', [Institutional_DataController::class, 'create'])->name('create_institutional_datas');

            Route::get('/create_new_institutional_data', [Institutional_DataController::class, 'store'])->name('create_new_institutional_data');

            Route::get('/institutional_datas/{institutional_data}', [Institutional_DataController::class, 'show'])->name('show_institutional_data_details');

            Route::get('/institutional_datas/{institutional_data}/edit', [Institutional_DataController::class, 'edit'])->name('edit_institutional_data');

            Route::get('/institutional_datas/{institutional_data}/update', [Institutional_DataController::class, 'update'])->name('update_institutional_data');

            Route::delete('/institutional_datas/{institutional_data}', [Institutional_DataController::class, 'destroy'])->name('destroy_institutional_data');
        });
    });

    Route::prefix('/process')->group(function (){
        Route::get('/index', function(){ return view('process/index'); })->name('process_index');
    });

})->middleware('auth:sanctum');

Route::get('/app/categoria', function(){
    return view('categorias');
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


