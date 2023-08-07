<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.dashboard');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/show/{id}', function ($id) {
    return $id ;
})->name('a'); /// pour la simplification on va modifier welcome.blade


//route name

Route::namespace('Front')->group(function (){
    //all route only access controller or methods in folder name Front
    //// Route::get('users')
});

Route::prefix('user')->name('user.')->group(function (){

    Route::middleware(['guest:web'])->group(function (){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::get('/verify/{token}',[UserController::class,'verify'])->name('verify');

        //post : elle améne directement a une autre page de la fct create
        //Route::get('user/create', 'UserController@create');
    });

    Route::middleware(['auth:web','is_user_verify_email'])->group(function (){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});


/*Route::prefix('admin')->name('admin.')->group(function (){
    //Route::middleware(['guest:admin'])->group(function (){
    Route::view('/login','dashboard.admin.login')->name('login');
    Route::post('/check',[AdminController::class,'check'])->name('check');
    // });
    //Route::middleware(['auth:admin'])->group(function (){
    Route::post('/create',[AdminController::class,'create'])->name('create');
    Route::view('/home','dashboard.admin.home')->name('home');
    //  });
});*/



