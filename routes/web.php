<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('admin.sesau.residencia.home');
});

Route::get('/residencia', function () {
    return view('admin.sesau.residencia.index');
});

Route::get('/inicial', function () {
    return view('admin.sesau.residencia.inicial');
})->middleware('auth');

Route::get('/testes', function () {
    return view('admin.sesau.residencia.testes');
});

Route::get('/gestor', function () {
    return view('admin.sesau.residencia.gestor');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirecionar para a página inicial ou qualquer outra página desejada
})->name('logout');
    
