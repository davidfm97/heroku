<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buscador',[\App\Http\Controllers\UserController::class,'buscador']);
Route::get('/perfilC',[\App\Http\Controllers\UserController::class,'perfilC']);
Route::put('/editarCliente',[\App\Http\Controllers\UserController::class,'update'])->name('editarCliente');
Route::get('/plazas/{id}',[\App\Http\Controllers\PlazaController::class,'mostrarPlazasClientes'])->name('mostrarplaza');
Route::get("/crearReserva/{id}",[\App\Http\Controllers\ReservaController::class,'crearReserva'])->name('crearReserva');
Route::resource("reserva", App\Http\Controllers\ReservaController::class);
Route::get('/empresa/crearplazas',[\App\Http\Controllers\PlazaController::class,'create'])->name('crearPlaza');
Route::resource("plaza", App\Http\Controllers\PlazaController::class);
Route::get('/misreservas',[\App\Http\Controllers\ReservaController::class,'reservasCliente']);
Route::get('/misreservascanceladas',[\App\Http\Controllers\ReservaController::class,'reservasClienteCanceladas']);
Route::get('/misreservasverificadas',[\App\Http\Controllers\ReservaController::class,'reservasClienteVerificadas']);
Route::get('/cancelarReserva/{id}',[\App\Http\Controllers\ReservaController::class,'cancelar'])->name('cancelarReserva');
Route::get('/descargar/{id}',[\App\Http\Controllers\ReservaController::class,'descargar'])->name('descargarReserva');
Route::prefix('/empresa')->name('empresa.')->namespace('App\Http\Controllers\Empresa')->group(function(){
    //All the admin routes will be defined here...
    Route::get('/misreservas',[\App\Http\Controllers\ReservaController::class,'reservasEmpresa']);
    Route::get('/cancelarReserva/{id}',[\App\Http\Controllers\ReservaController::class,'cancelarReservaEmpresa'])->name('cancelarReserva');
    Route::get('/verificarQR',[\App\Http\Controllers\ReservaController::class,'verificarQR'])->name('verificarQR');
    Route::get('/verificar/{id}',[\App\Http\Controllers\ReservaController::class,'verificar'])->name('verificarReserva');
    //Login Routes

    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/plazas',[\App\Http\Controllers\Empresa\HomeController::class,'plazas']);
    Route::get('/crearplazas',[\App\Http\Controllers\PlazaController::class,'create']);



});

