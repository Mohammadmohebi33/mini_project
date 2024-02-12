<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\EpisodeController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/panel')->group(function () {


    Route::get('/' , function (){
        return view('panel.main');
    })->name('panel');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('showUser');
        Route::get('/deleted', [UserController::class, 'trashed'])->name('deletedUser');
        Route::post('/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.delete');
    });


    Route::prefix('course')->middleware('auth')->group(function (){
        Route::get('/create' , [CourseController::class , 'create'])->name('course.create');
        Route::post('/store' , [CourseController::class , 'store'])->name('course.store');
        Route::get('/',  [CourseController::class , 'index'])->name('course.index');
        Route::get('/{course}' , [CourseController::class, 'show'])->name('course.show');
        Route::get('/{course}/edit' , [CourseController::class, 'edit'])->name('course.edit');
        Route::patch('/update/{course}' , [CourseController::class , 'update'])->name('course.update');
        Route::delete('/{course}' , [CourseController::class , 'destroy'])->name('course.destroy');
    });


    Route::prefix('episodes')->group(function (){
        Route::get('/course/sessions/{course}' , [EpisodeController::class , 'showCourseSessions'])->name('course.sessions');
        Route::get('/' , [EpisodeController::class , 'index'])->name('episodes.index');
        Route::delete('/{episodes}' , [EpisodeController::class , 'destroy'])->name('episodes.destroy');
        Route::get('/{episodes}/edit' , [EpisodeController::class , 'edit'])->name('episodes.edit');
        Route::get('/episodes/create' , [EpisodeController::class,  'create'])->name('episodes.create');
        Route::post('/episodes/store' , [EpisodeController::class , 'store'])->name('episodes.store');
        Route::match(['put', 'patch'] ,'/episodes/{episodes}/update',  [EpisodeController::class, 'update'])->name('episodes.update');
    });


    Route::prefix('category')->group(function (){
        Route::get('/' , [CategoryController::class , 'index'])->name('category.index');
        Route::get('/{category}',  [CategoryController::class , 'show'])->name('category.show');
        Route::post('/create', [CategoryController::class , 'store'])->name('category.store');
        Route::patch('/update/{category}' , [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class , 'destroy'])->name('category.delete');
    });

    Route::prefix('comment')->group(function (){
        Route::get('/activeComment' , [CommentController::class , 'activeComments'])->name('activeComment.store');
        Route::get('/rejectComment' , [CommentController::class , 'rejectComments'])->name('rejectComment.store');
        Route::get('/allComments' , [CommentController::class , 'index'])->name('comment.index');
        Route::post('/changeStatus/{comment}/{status}' , [CommentController::class , 'changeStatus'])->name('comment.status');
    });
});

Auth::routes();

