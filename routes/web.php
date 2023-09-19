<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [NoteController::class,'index'])->name('notas');
Route::post('/store/nota', [NoteController::class,'store'])->name('store.nota');
Route::delete('/delete/nota/{id}', [NoteController::class,'delete'])->name('destroy.nota');
