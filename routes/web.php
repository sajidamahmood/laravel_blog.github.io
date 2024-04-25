<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\about_usController;
use App\Http\Controllers\PageAdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {return view('welcome');});

Route::get('/legals', [pageController::class, 'legals'])->name('page.legals');
Route::get('/about_us', [about_usController::class, 'about_us'])->name('page.about_us');

Route::group(['prefix' => '/dashboard'],function () {  
    Route::get('/', [PageAdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    Route::get('/my_posts', [PostController::class, 'myposts'])->name('page.my_posts');

    Route::get('/my-posts', PostController::class .'@index')->name('posts.index');
    

    Route::get('/posts/create', PostController::class .'@create')->name('posts.create');
    Route::post('/posts/create', PostController::class .'@store')->name('posts.store');

    Route::get('/posts/{id}', PostController::class .'@show')->name('posts.show');
    Route::get('/posts/{id}/edit', PostController::class .'@edit')->name('posts.edit');
    Route::put('/posts/{id}/update', PostController::class .'@update')->name('posts.update');
    Route::delete('/posts/{id}/delete', PostController::class .'@destroy')->name('posts.destroy');

    Route::middleware(['isAdmin'])->group(function () {

        Route::get('/categories', [CategoryController::class,'index'])->middleware(['auth'])->name('categories.index');

        Route::get('/category/{id}', [CategoryController::class,'show'])->middleware(['auth'])->name('categories.show');
        Route::get('/category-create', [CategoryController::class,'create'])->middleware(['auth'])->name('categories.create');
        Route::post('/category-create', [CategoryController::class,'store'])->middleware(['auth'])->name('categories.store');
    
        Route::get('/category/{id}/edit', [CategoryController::class,'edit'])->middleware(['auth'])->name('categories.edit');
        Route::put('/category/{id}/update', [CategoryController::class,'update'])->middleware(['auth'])->name('categories.update');
        Route::delete('/category/{id}/delete', [CategoryController::class,'destroy'])->middleware(['auth'])->name('categories.destroy');
    
        Route::get('/users',[UserController::class,'index'])->middleware(['auth'])->name('admin.user.index');
        Route::get('/user/{id}',[UserController::class,'show'])->middleware(['auth'])->name('admin.user.show');
        Route::get('/user/{id}/edit', [UserController::class,'edit'])->middleware(['auth'])->name('admin.user.edit');
        Route::put('/user/{id}/update', [UserController::class,'update'])->middleware(['auth'])->name('admin.user.update');
        Route::delete('/user/{id}/delete', [UserController::class,'destroy'])->middleware(['auth'])->name('admin.user.delete');

    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['auth'])->name('edit.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth'])->name('update.profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(['auth'])->name('destroy.profile');
});

require __DIR__.'/auth.php';
