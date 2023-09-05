<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\ImmobilierController;
use App\Http\Controllers\Auth\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

//use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Auth::routes();

Route::group(['namespace' => 'Admin'], function () {

    //Route::get('/show-Login', [AdminController::class, 'showLoginForm'])->name('dashboard.showLogin');
    Route::post('/check', [AdminController::class, 'check'])->name('dashboard.check');
    Route::view('/home', 'dashboard.admin.home')->name('admin.home');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/listusers', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::post('/listusers/bloquer', [AdminController::class, 'BloquerUser'])->name('BloquerUser');
    Route::get('/listactiveusers', [AdminController::class, 'showactiveUsers'])->name('showactiveUsers');
    Route::get('/listblockedusers', [AdminController::class, 'showblockedUsers'])->name('showblockedUsers');
    Route::delete('/listusers/destroy/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');

    Route::get('/listimmobiliers', [AdminController::class, 'showImmobiliers'])->name('showImmobiliers');
    Route::get('/show/{id}', [ImmobilierController::class, 'showImmob'])->name('showImmob');
    Route::get('/listimmobiliers/{id}/edit', [ImmobilierController::class, 'editImmob'])->name('editImmob');
    Route::put('/listimmobiliers/update/{id}', [ImmobilierController::class, 'updateImmobBack'])->name('updateImmobBack');
    Route::delete('/destroy/{id}', [ImmobilierController::class, 'destroyImmob'])->name('destroyImmob');

    Route::get('/listreservations', [ReservationController::class, 'index'])->name('showReservations');
    Route::get('/listreservations/create', [ReservationController::class, 'create'])->name('createReservation');
    Route::post('/listreservations', [ReservationController::class, 'store'])->name('storeReservation');

    //Route::post('/listreservations', [ReservationController::class, 'store'])->name('createReservation');


    //User
    Route::prefix('User')->group(function () {
        Route::get('/showusers', [UserController::class, 'showUsers'])->name('dashboard.users');
        Route::get('/create', [UserController::class, ''])->name('dashboard.users.create');
        Route::post('/store', [UserController::class, ''])->name('dashboard.users.store');
        Route::get('/{id}/edit', [UserController::class, ''])->name('dashboard.users.edit');
        Route::get('/update/{id}', [UserController::class, ''])->name('dashboard.users.update');
        Route::get('{id}/delete', [UserController::class, ''])->name('dashboard.users.delete');
    });
    //prefix : User nous facilite d'ecriture User/create




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
