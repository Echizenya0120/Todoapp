<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\TodoModel;

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

Route::get('/', function () {
    return view('todo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/todolist', [TodoController::class, 'list']);

Route::get('/create_page',[TodoController::class, 'createpage']);

Route::post('/creation', [TodoController::class, 'creation']);

Route::get('/create_pag',[TodoController::class, 'user']);

//編集がクリックされたとき
Route::get('/edit_page/{id}',[TodoController::class, 'editpage']);

//送信がクリックされた時
Route::post('/edition',[TodoController::class, 'edition']);

//削除がクリックされたとき
Route::get('/delete_page/{id}',[TodoController::class,'deletepage']);

//送信がクリックされたとき
Route::post('/delete/{id}',[TodoController::class,'delete']);





require __DIR__.'/auth.php';
