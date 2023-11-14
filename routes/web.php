<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use function Symfony\Component\String\s;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('siswa');
});
Route::resource('/',SiswaController::class);
Route::get('/',[SiswaController::class,'search'])->name('cari');
Route::delete('/{id}', [SiswaController::class, 'destroy']);

Route::get('/{id}', [SiswaController::class, 'edit']);
Route::put('/{id}', [SiswaController::class, 'update']);

