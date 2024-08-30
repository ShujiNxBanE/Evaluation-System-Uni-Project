<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProgramController;

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

Route::prefix('/portfolio')->middleware('auth:sanctum')->group(function (){
    Route::get('/no_permission', function () { return view('no_permission'); })->name('no_permission');

    Route::get('/index', function(){ return view('portfolio/index'); })->name('portfolio_index');
    Route::get('/structure', function(){ return view('portfolio/structure'); })->name('structure');
    Route::get('/ponderation', function(){ return view('portfolio/ponderation'); })->name('ponderation');
    Route::get('/considerations', function () { return view('portfolio/considerations'); })->name('considerations');

    Route::prefix('/process')->group(function (){
        Route::get('/index', [ProcessController::class, 'index'])->name('process_index');

        Route::get('/program/{program}/information', [ProcessController::class, 'show'])->name('process_program');

        Route::get('/program/{program}/institutional_data/create', [ProcessController::class, 'create_institutional_data'])->name('process_create_institutional_data');

        Route::get('/program/{program}/create_new_institutional_data', [ProcessController::class, 'store_institutional_data'])->name('process_create_new_institutional_data');

        Route::get('/program/{program}/edit_institutional_data', [ProcessController::class, 'edit_institutional_data'])->name('process_edit_institutional_data');

        Route::get('/program/{program}/update_institutional_data', [ProcessController::class, 'update_institutional_data'])->name('process_update_institutional_data');

        Route::get('/program/{program}/category/{category}', [ProcessController::class, 'show_category'])->name('process_category');

        Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/create_evidence', [ProcessController::class, 'create_evidence'])->name('process_create_evidence');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/evidence', [ProcessController::class, 'store_evidence'])->name('process_create_new_evidence');

        Route::delete('program/{program}/category/{category}/evaluation/{evaluation}/evidence/{evidence}', [ProcessController::class, 'delete_evidence'])->name('process_delete_evidence');

        Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/create_report', [ProcessController::class, 'create_report'])->name('process_create_report');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report', [ProcessController::class, 'store_report'])->name('process_create_new_report');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/edit', [ProcessController::class, 'edit_report'])->name('process_edit_report');

        route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/update', [ProcessController::class, 'update_report'])->name('process_update_report');
    });

    Route::middleware('check_permission:create_user, create, show, edit, update, destroy, show_details')->group(function(){
        Route::prefix('/admin')->group(function(){

            Route::get('/create_user', function(){return view('create_user');})->name('create_user');

            // Route for programs crud

            Route::get('/programs', [AdminController::class, 'index'])->name('programs');

            Route::get('/programs/create', [ProgramController::class, 'create'])->name('create_programs');

            Route::get('/create_new_program', [ProgramController::class, 'store'])->name('create_new_program');

            Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('edit_program');

            Route::get('/programs/{program}/update', [ProgramController::class, 'update'])->name('update_program');

            Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('destroy_program');

            //New routes for admin

            Route::get('/program/{program}/information', [AdminController::class, 'show'])->name('admin_show_program');

            Route::get('/program/{program}/category/{category}', [AdminController::class, 'show_category'])->name('admin_show_category');

            Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/show_evidences', [AdminController::class, 'show_evidences'])->name('admin_show_evidences');

            Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/show', [AdminController::class, 'show_report'])->name('admin_show_report');

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

        });
    });
});

Route::get('/app/proceso/estructuraPrograma', function(){
    return view('process/estructuraPrograma');
});

Route::get('/app/proceso/informeFinal', function(){
    return view('process/informeFinal');
});

Route::get('/app/proceso/puntuacion', function(){
    return view('process/puntuacion');
});

Route::get('/app/proceso/subirInformeFinal', function(){
    return view('process/subirInformeFinal');
});


