<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('users',[UserController::class, 'index']);
Route::get('users/create',[UserController::class, 'create']);
Route::post('users',[UserController::class, 'store']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'destroy']);

/* 
// template de rotas
Route::get('templates',[TemplateController::class, 'index']);
Route::get('templates/create',[TemplateController::class, 'create']);
Route::post('templates',[TemplateController::class, 'store']);
Route::get('templates/{id}/edit', [TemplateController::class, 'edit']);
Route::put('templates/{id}', [TemplateController::class, 'update']);
Route::delete('templates/{id}',[TemplateController::class, 'destroy']);
*/