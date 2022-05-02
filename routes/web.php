<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\EstudianteController;

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
    return view('auth.login');
});

// Route::get('/grupo', function () {
//     return view('grupo.index');
    
// });

// Route::get('grupo/create',[GrupoController::class,'create']);
    
Route::resource('grupo', GrupoController::class)->middleware('auth');
Route::resource('estudiante', EstudianteController::class);
Auth::routes();

Route::get('/home', [GrupoController::class, 'index'])->name('home');

route::group(['middleware' => 'auth'], function(){
    Route::get('/', [GrupoController::class, 'index'])->name('home');
});