<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FileController;
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


Route::get('/login/user', [AuthController::class, 'login'])->name('loginUser');
Route::post('/logout' , [AuthController::class, 'logout'])->name('logoutUser');

Route::prefix('/portfolio')->middleware('auth:sanctum')->group(function (){
    Route::get('/no_permission', function () { return view('no_permission'); })->name('no_permission');

    Route::get('/index', function(){ return view('portfolio/index'); })->name('portfolio_index');
    Route::get('/structure', function(){ return view('portfolio/structure'); })->name('structure');
    Route::get('/ponderation', function(){ return view('portfolio/ponderation'); })->name('ponderation');
    Route::get('/considerations', function () { return view('portfolio/considerations'); })->name('considerations');

    Route::prefix('/process')->group(function (){

        Route::get('download/{filename}', [FileController::class, 'download'])->name('download');

        Route::get('downloadFinalReport/{filename}', [FileController::class, 'downloadFinalReport'])->name('downloadFinalReport');

        Route::get('/programs', [ProcessController::class, 'index'])
                ->middleware('check_permission:show_programs')->name('process_index');

        Route::get('/program/{program}/information', [ProcessController::class, 'show'])
                ->middleware('check_permission:show_program_information')->name('process_program');

        Route::get('/program/{program}/send_final_report', [ProcessController::class, 'upload_final_report'])
                ->middleware('check_permission:create_final_report')->name('process_upload_final_report');

        Route::post('/program/{program}/save_final_report', [ProcessController::class, 'store_final_report'])
                ->middleware('check_permission:store_final_report')->name('process_store_final_report');

        Route::get('/program/{program}/destroy_final_report', [ProcessController::class, 'destroy_final_report'])
                ->middleware('check_permission:destroy_final_report')->name('process_destroy_final_report');

        Route::get('/program/{program}/institutional_data/create', [ProcessController::class, 'create_institutional_data'])
                ->middleware('check_permission:create_institutional_data')->name('process_create_institutional_data');

        Route::get('/program/{program}/create_new_institutional_data', [ProcessController::class, 'store_institutional_data'])
                ->middleware('check_permission:store_institutional_data')->name('process_create_new_institutional_data');

        Route::get('/program/{program}/edit_institutional_data', [ProcessController::class, 'edit_institutional_data'])
                ->middleware('check_permission:edit_institutional_data')->name('process_edit_institutional_data');

        Route::get('/program/{program}/update_institutional_data', [ProcessController::class, 'update_institutional_data'])
                ->middleware('check_permission:update_institutional_data')->name('process_update_institutional_data');

        Route::get('/program/{program}/category/{category}', [ProcessController::class, 'show_category'])
                ->middleware('check_permission:show_program_category')->name('process_category');

        Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/create_evidence', [ProcessController::class, 'create_evidence'])
                ->middleware('check_permission:create_evidence')->name('process_create_evidence');

        Route::post('program/{program}/category/{category}/evaluation/{evaluation}/evidence', [ProcessController::class, 'store_evidence'])
                ->middleware('check_permission:store_evidence')->name('process_create_new_evidence');

        Route::delete('program/{program}/category/{category}/evaluation/{evaluation}/evidence/{evidence}', [ProcessController::class, 'delete_evidence'])
                ->middleware('check_permission:destroy_evidence')->name('process_delete_evidence');

        Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/create_report', [ProcessController::class, 'create_report'])
                ->middleware('check_permission:create_report')->name('process_create_report');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report', [ProcessController::class, 'store_report'])
                ->middleware('check_permission:store_report')->name('process_create_new_report');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/edit', [ProcessController::class, 'edit_report'])
                ->middleware('check_permission:edit_report')->name('process_edit_report');

        route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/update', [ProcessController::class, 'update_report'])
                ->middleware('check_permission:update_report')->name('process_update_report');
    });

    Route::prefix('/admin')->group(function(){

        Route::get('/users', [AdminController::class, 'show_users'])
                ->middleware('check_permission:admin_show_user')->name('admin_show_users');

        Route::get('/create_user', function(){return view('create_user');})
                ->middleware('check_permission:create_user')->name('create_user');

        Route::get('/create/user', [AuthController::class, 'register'])
                ->middleware('check_permission:store_user')->name('createUser');

        Route::get('/users/{user}/edit', [AdminController::class, 'edit_user'])
                ->middleware('check_permission:edit_user')->name('admin_edit_user');

        Route::get('/users/{user}/store', [AdminController::class, 'update_user'])
                ->middleware('check_permission:update_user')->name('admin_update_user');

        Route::delete('/users/{user}/destroy', [AdminController::class, 'destroy_user'])
                ->middleware('check_permission:destroy_user')->name('admin_destroy_user');

        // Route for programs crud

        Route::get('/programs', [AdminController::class, 'index'])
                ->middleware('check_permission:admin_show_programs')->name('programs');

        Route::get('/program/{program}/information', [AdminController::class, 'show'])
        ->middleware('check_permission:admin_show_program_information')->name('admin_show_program');

        Route::get('/programs/create', [ProgramController::class, 'create'])
                ->middleware('check_permission:create_program')->name('create_programs');

        Route::get('/create_new_program', [ProgramController::class, 'store'])
                ->middleware('check_permission:store_program')->name('create_new_program');

        Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])
                ->middleware('check_permission:edit_program')->name('edit_program');

        Route::get('/programs/{program}/update', [ProgramController::class, 'update'])
                ->middleware('check_permission:update_program')->name('update_program');

        Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])
                ->middleware('check_permission:destroy_program')->name('destroy_program');

        //New routes for admin

        Route::get('/program/{program}/show_final_report', [AdminController::class, 'show_final_report'])
                ->middleware('check_permission:admin_show_final_report')->name('admin_show_final_report');

        Route::get('/program/{program}/category/{category}', [AdminController::class, 'show_category'])
                ->middleware('check_permission:admin_show_program_category')->name('admin_show_category');

        Route::get('/program/{program}/category/{category}/evaluation/{evaluation}/show_evidences', [AdminController::class, 'show_evidences'])
                ->middleware('check_permission:admin_show_evidences')->name('admin_show_evidences');

        Route::get('program/{program}/category/{category}/evaluation/{evaluation}/report/{report}/show', [AdminController::class, 'show_report'])
                ->middleware('check_permission:admin_show_report')->name('admin_show_report');

        //Route for categories crud

        Route::get('/categories', [CategoryController::class, 'index'])
                ->middleware('check_permission:admin_show_categories')->name('categories');

        Route::get('/categories/create', [CategoryController::class, 'create'])
                ->middleware('check_permission:create_category')->name('create_categories');

        Route::get('/create_new_category', [CategoryController::class, 'store'])
                ->middleware('check_permission:store_category')->name('create_new_category');

        Route::get('/categories/{category}', [CategoryController::class, 'show'])
                ->middleware('check_permission:admin_show_categories')->name('show_category_details');

        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
                ->middleware('check_permission:edit_category')->name('edit_category');

        Route::get('/categories/{category}/update', [CategoryController::class, 'update'])
                ->middleware('check_permission:update_category')->name('update_category');

        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
                ->middleware('check_permission:destroy_category')->name('destroy_category');

        //Route for evaluations crud

        Route::get('/evaluations', [EvaluationController::class, 'index'])
                ->middleware('check_permission:admin_show_evaluations')->name('evaluations');

        Route::get('/evaluations/create', [EvaluationController::class, 'create'])
                ->middleware('check_permission:create_evaluation')->name('create_evaluations');

        Route::get('/create_new_evaluation', [EvaluationController::class, 'store'])
                ->middleware('check_permission:store_evaluation')->name('create_new_evaluation');

        Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])
                ->middleware('check_permission:admin_show_evaluations')->name('show_evaluation_details');

        Route::get('/evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])
                ->middleware('check_permission:edit_evaluation')->name('edit_evaluation');

        Route::get('/evaluations/{evaluation}/update', [EvaluationController::class, 'update'])
                ->middleware('check_permission:update_evaluation')->name('update_evaluation');

        Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])
                ->middleware('check_permission:destroy_evaluation')->name('destroy_evaluation');
    });
});


