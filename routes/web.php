<?php

use App\Models\Immobilier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\CommentaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ImmobilierController;
use App\Http\Controllers\Auth\ReservationController;
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

Route::get('/',             [HomeController::class, 'showLoginForm'])->name('showLoginForm');
Route::get('/register-form', [HomeController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/login',       [LoginController::class, 'Login'])->name('submitLoginForm');
Route::post('/register',    [RegisterController::class, 'create'])->name('submitRegisterForm');




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/front',[HomeController::class,'showFront'])->name('showFront');



Route::prefix('Front')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        Route::get('/verify/{token}', [UserController::class, 'verify'])->name('verify');

        //post : elle améne directement a une autre page de la fct create
        //Route::get('user/create', 'UserController@create');
    });

    Route::middleware(['authinterfaces:web', 'is_user_verify_email'])->group(function () {
        //Route::get('/home', [UserController::class,'login']);
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');

        //Route::prefix('immobilier')->group(function () {

        Route::get('/home', [ImmobilierController::class, 'index'])->name('home');
        Route::get('/home/etat/{id}', [ImmobilierController::class, 'filtrerEtat'])->name('filtrerEtat');
        Route::get('/home/ville/{id}', [ImmobilierController::class, 'filtrerVille'])->name('filtrerVille');

        Route::get('/showImmob', [ImmobilierController::class, 'showImmob']);
        Route::post('/home', [ImmobilierController::class, 'store'])->name('home');
        Route::get('/home/show/{id}', [ImmobilierController::class, 'showImmobFront'])->name('showImmobFront');
        Route::get('/home/{id}/edit', [ImmobilierController::class, 'editImmobFront'])->name('editImmobFront');
        Route::post('/home/update/{id}', [ImmobilierController::class, 'update'])->name('update');

        Route::delete('/home/destroy/{id}', [ImmobilierController::class, 'destroyImmobFront'])->name('destroyImmobFront');

        //Route::get('/home/reserver', [ReservationController::class, 'create'])->name('createReservation');
        Route::post('/store-reservation', [ReservationController::class, 'store'])->name('store-reservation');
        Route::post('/{id}/store-commentaire', [ImmobilierController::class, 'comments'])->name('comment');
        //  Route::post('/home/{id}/store-commentaire', [CommentaireController::class, 'storeComments'])->name('home');

    });
    // });
});

//User



/*Route::prefix('admin')->name('admin.')->group(function (){
    //Route::middleware(['guest:admin'])->group(function (){
    Route::view('/login','dashboard.admin.login')->name('login');
    Route::post('/check',[AdminController::class,'check'])->name('check');
    // });
    //Route::middleware(['authinterfaces:admin'])->group(function (){
    Route::post('/create',[AdminController::class,'create'])->name('create');
    Route::view('/home','dashboard.admin.home')->name('home');
    //  });
});*/
