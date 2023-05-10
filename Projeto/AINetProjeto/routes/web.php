<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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
//users routes
Route::get('users',[UserController::class, 'index']);
Route::get('users/create',[UserController::class, 'create']);
Route::post('users',[UserController::class, 'store']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'destroy']);
//categories routes
Route::get('categories',[CategoryController::class, 'index']);
Route::get('categories/create',[CategoryController::class, 'create']);
Route::post('categories',[CategoryController::class, 'store']);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}',[CategoryController::class, 'destroy']);

// Customers routes
Route::get('customers',[CustomerController::class, 'index']);
Route::get('customers/create',[CustomerController::class, 'create']);
Route::post('customers',[CustomerController::class, 'store']);
Route::get('customers/{id}/edit', [CustomerController::class, 'edit']);
Route::put('customers/{id}', [CustomerController::class, 'update']);
Route::delete('customers/{id}',[CustomerController::class, 'destroy']);
/* 
// template de rotas
Route::get('templates',[TemplateController::class, 'index']);
Route::get('templates/create',[TemplateController::class, 'create']);
Route::post('templates',[TemplateController::class, 'store']);
Route::get('templates/{id}/edit', [TemplateController::class, 'edit']);
Route::put('templates/{id}', [TemplateController::class, 'update']);
Route::delete('templates/{id}',[TemplateController::class, 'destroy']);
*/