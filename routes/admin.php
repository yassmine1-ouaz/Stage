<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Auth::routes();

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/show-Login', [AdminController::class, 'showLoginForm'])->name('dashboard.showLogin');
    Route::post('/check',[AdminController::class,'check'])->name('dashboard.check');

    Route::view('/home', 'dashboard.admin.home')->name('admin.home');
    //return 'tttt';


    //All route Dashboard

    //User
    Route::prefix('User')->group(function () {
        Route::get('/show', [UserController::class,''])->name('dashboard.users');
        Route::get('/create', [UserController::class,''])->name('dashboard.users.create');
        Route::post('/store', [UserController::class,''])->name('dashboard.users.store');
        Route::get('/{id}/edit', [UserController::class,''])->name('dashboard.users.edit');
        Route::get('/update/{id}', [UserController::class,''])->name('dashboard.users.update');
        Route::get('/delete/{id}', [UserController::class,''])->name('dashboard.users.delete');
    });
    //prefix : User nous facilite d'ecriture User/create


    //Persmission

    //Media

    //

});
/*
Route::prefix('admin')->name('admin.')->group(function (){
    //Route::middleware(['guest:admin'])->group(function (){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
  // });
    //Route::middleware(['authinterfaces:admin'])->group(function (){
        Route::post('/create',[AdminController::class,'create'])->name('create');
        Route::view('/home','dashboard.admin.home')->name('home');
  //  });
});
*/


