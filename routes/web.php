<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TunelDoTempoController;


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
    return view('dashboard');
})->name('dashboard');

// Route::get('/tuneldotempo', function () {
//     return view('tuneldotempo');
// })->name('tuneldotempo');

// Rotas para o controlador TunelDoTempoController
Route::get('/tuneldotempo', [TunelDoTempoController::class, 'index']);
Route::post('/tunel-do-tempo', [TunelDoTempoController::class, 'store']);