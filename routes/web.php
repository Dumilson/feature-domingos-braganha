<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoaController;
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
Route::group([
    'prefix' => '/'
], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home.index');
    Route::post('/registrar-pessoa',[PessoaController::class, 'store'])->name('home.store');
    Route::get('/buscar-cep/{cep?}', [PessoaController::class, 'getCepPessoa'])->name('get.cep');
});