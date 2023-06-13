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
Route::get('users',[UserController::class, 'index']); //gest a user
Route::get('users/create',[UserController::class, 'create']);
Route::post('users',[UserController::class, 'store']); //creates a user
Route::get('users/{id}/edit', [UserController::class, 'edit']); //gets a user?
Route::put('users/{id}', [UserController::class, 'update']); //edits a user
Route::delete('users/{id}',[UserController::class, 'destroy']); //needs to be changed in the controller in case there is something that depends on this
//categories routes
Route::get('categories',[CategoryController::class, 'index']); //shows all categories
Route::get('categories/create',[CategoryController::class, 'create']);
Route::post('categories',[CategoryController::class, 'store']); //creates a category
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']); //gest a category
Route::put('categories/{id}', [CategoryController::class, 'update']); //edits a category
Route::delete('categories/{id}',[CategoryController::class, 'destroy']); //needs to be changed in the controller in case there is something that depends on this

// Customers routes
Route::get('customers',[CustomerController::class, 'index']); //shows all customers
Route::get('customers/{id}',[CustomerController::class, 'indexCustomer']); //shows a customer //implementar no controller !!!
Route::get('customers/create',[CustomerController::class, 'create']); 
Route::post('customers',[CustomerController::class, 'store']); //create a customer
Route::get('customers/{id}/edit', [CustomerController::class, 'edit']); //gets a customer? /edit necessario?
Route::put('customers/{id}', [CustomerController::class, 'update']); //edits a customer
Route::delete('customers/{id}',[CustomerController::class, 'destroy']); //needs to be changed in the controller in case there is something that depends on this
// orders routes -------------------------------------------------added 13/06 by vv (its late so i dont have the patience to check stuff, also needs to be added to the controllers, this methods)
Route::get('orders',[TemplateController::class, 'index']); //shows all orders
Route::get('orders/{id}',[TemplateController::class, 'indexUser']); //shows all orders of a user
Route::get('orders/create',[TemplateController::class, 'create']); //gets an order? 
Route::post('orders',[TemplateController::class, 'store']); //creates an order
Route::get('orders/{id}/edit', [TemplateController::class, 'edit']); 
Route::put('orders/{id}', [TemplateController::class, 'update']); //updates an order
Route::delete('orders/{id}',[TemplateController::class, 'destroy']); //delete an order //needs to be changed in the controller in case there is something that depends on this
// tshirt routes
Route::get('tshirt',[TemplateController::class, 'index']);
Route::get('tshirt',[TemplateController::class, 'indexUserTshirt']);
Route::get('tshirt/create',[TemplateController::class, 'create']);
Route::post('tshirt',[TemplateController::class, 'store']);
Route::get('tshirt/{id}/edit', [TemplateController::class, 'edit']);
Route::put('tshirt/{id}', [TemplateController::class, 'update']);
Route::delete('tshirt/{id}',[TemplateController::class, 'destroy']);

/* 
// template de rotas

Route::get('tshirt',[TemplateController::class, 'index']);
Route::get('tshirt/create',[TemplateController::class, 'create']);
Route::post('tshirt',[TemplateController::class, 'store']);
Route::get('tshirt/{id}/edit', [TemplateController::class, 'edit']);
Route::put('tshirt/{id}', [TemplateController::class, 'update']);
Route::delete('tshirt/{id}',[TemplateController::class, 'destroy']);
*/
