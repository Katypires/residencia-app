<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ColaboradorController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;
use app\Http\Livewire\Admin\Crudtab\CrudTableComponent;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


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
    return view('index');
});

Route::get('/residencia', function () {
    return view('admin.sesau.residencia.index');
});

Route::get('/inicial', function () {
    return view('admin.sesau.residencia.inicial');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirecionar para a página inicial ou qualquer outra página desejada
})->name('logout');
    
