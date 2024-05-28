<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])-> 
middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->
    middleware(['auth','admin']);

    //lesson ini admin
route::get('add_lesson', [AdminController::class, 'add_lesson'])->
    middleware(['auth','admin']);
route::post('upload_lesson', [AdminController::class, 'upload_lesson'])->
    middleware(['auth','admin']);
route::get('view_lesson', [AdminController::class, 'view_lesson'])->
    middleware(['auth','admin']);   
route::get('delete_lesson/{id}', [AdminController::class, 'delete_lesson'])->
    middleware(['auth','admin']);
route::get('update_lesson/{id}', [AdminController::class, 'update_lesson'])->
    middleware(['auth','admin']);
route::post('edit_lesson/{id}', [AdminController::class, 'edit_lesson'])->
    middleware(['auth','admin']);

    //question ini admin
route::get('add_question', [AdminController::class, 'add_question'])->
    middleware(['auth','admin']);
route::post('upload_question', [AdminController::class, 'upload_question'])->
    middleware(['auth','admin']);
route::get('view_question', [AdminController::class, 'view_question'])->
    middleware(['auth','admin']);   
route::get('delete_question/{id}', [AdminController::class, 'delete_question'])->
    middleware(['auth','admin']);
route::get('update_question/{id}', [AdminController::class, 'update_question'])->
    middleware(['auth','admin']);
route::post('edit_question/{id}', [AdminController::class, 'edit_question'])->
    middleware(['auth','admin']);

    // Routes for options admin
Route::get('add_option', [AdminController::class, 'add_option'])->
    middleware(['auth', 'admin']);
Route::post('upload_option', [AdminController::class, 'upload_option'])->
    middleware(['auth', 'admin']);
Route::get('view_option', [AdminController::class, 'view_option'])->
    middleware(['auth', 'admin']);
Route::get('delete_option/{id}', [AdminController::class, 'delete_option'])->
    middleware(['auth', 'admin']);
Route::get('update_option/{id}', [AdminController::class, 'update_option'])->
    middleware(['auth', 'admin']);
Route::post('edit_option/{id}', [AdminController::class, 'edit_option'])->
    middleware(['auth', 'admin']);

    // Routes for results admin
Route::get('index_result', [AdminController::class, 'index_result'])->
    middleware(['auth', 'admin']);
Route::post('upload_result', [AdminController::class, 'upload_result'])->
    middleware(['auth', 'admin']);
Route::get('view_result', [AdminController::class, 'view_result'])->
    middleware(['auth', 'admin']);
Route::get('delete_result/{id}', [AdminController::class, 'delete_result'])->
    middleware(['auth', 'admin']);
Route::get('update_result/{id}', [AdminController::class, 'update_result'])->
    middleware(['auth', 'admin']);
Route::post('edit_result/{id}', [AdminController::class, 'edit_result'])->
    middleware(['auth', 'admin']);
Route::get('create_result', [AdminController::class, 'create_result'])->
    middleware(['auth', 'admin']);
    
    //lesson ini user
route::get('lesson_details/{id}', [HomeController::class, 'lesson_details']);

    //materi
route::get('materi', [HomeController::class, 'materi']);

Route::get('test',[HomeController::class, 'index_test'])->name('test');
    Route::post('test_store',[HomeController::class, 'test_store'])->name('test_store');
    Route::get('results/{result_id}',[HomeController::class, 'show'])->name('results_show');



    