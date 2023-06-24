<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TshirtController;
use App\Http\Controllers\ColorController;


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
    return view('start');
});
Route::get('/main', function () {
    return view('Main/main');
});

Route::get('/tester', function () {
    return view('layouts/ClienteTemplate');
});

//users routes
Route::get('users',[UserController::class, 'index']); //route to page that shows all users
Route::get('users/create',[UserController::class, 'create']); //route to page that creates a user
//Route::get('/users/email/{email}', [UserController::class,'getUserByEmail']); //get user with a specific email
Route::get('/users/email', [UserController::class,'searchUser']);
Route::get('users/edit/{id}', [UserController::class, 'edit']); //route to page that edits a user
Route::post('users',[UserController::class, 'store']); //creates a user
Route::put('users/{id}', [UserController::class, 'update']); //edits a user
Route::delete('users/{id}',[UserController::class, 'destroy'])->name('users.destroy');//deletes a user //needs to be changed in the controller in case there is something that depends on this

//categories routes
Route::get('categories',[CategoryController::class, 'index'])->middleware('admin');//route to page that shows all categories
Route::get('categories/create',[CategoryController::class, 'create'])->middleware('admin'); //route to page that creates a category
Route::post('categories',[CategoryController::class, 'store'])->middleware('admin'); //creates a category
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->middleware('admin'); //route to page that edits a category
Route::put('categories/{id}', [CategoryController::class, 'update'])->middleware('admin'); //edits a category
Route::delete('categories/{id}',[CategoryController::class, 'destroy'])->middleware('admin'); //deletes a category //needs to be changed in the controller in case there is something that depends on this

// Customers routes
Route::get('customers',[CustomerController::class, 'index']); //route to page that shows all customers
Route::get('customers/edit/{id}',[CustomerController::class, 'getCustomerToUpdate']); //show to the customer its settings
Route::put('customers/edit/{id}', [CustomerController::class, 'storeUpdate']); //update customer and user settings
Route::get('customers/create',[CustomerController::class, 'create']);  //route to page that creates a customer, use it if the user is a customer
Route::post('customers',[CustomerController::class, 'store']); //create a customer
Route::get('customers/{id}/edit', [CustomerController::class, 'edit']); //route to page that edits a customer
Route::put('customers/{id}', [CustomerController::class, 'update']); //edits a customer
Route::delete('customers/{id}',[CustomerController::class, 'destroy']); //needs to be changed in the controller in case there is something that depends on this

// orders routes -------------------------------------------------added 13/06 by vv (its late so i dont have the patience to check stuff, also needs to be added to the controllers, this methods)
Route::get('orders',[OrderController::class, 'index']); //route to page that shows all orders
Route::get('orders/{id}',[OrderController::class, 'indexUser']); //route to page that shows a order
Route::get('/orders/history/{id}', [OrderController::class, 'findOrdersOfUser']); //route to page that shows all orders of a user
Route::get('orders/create',[OrderController::class, 'create']); //route to page that creates an order
Route::post('orders',[OrderController::class, 'store']); //creates an order
Route::get('orders/{id}/edit', [OrderController::class, 'edit']); //route to page that edits an order
Route::put('orders/{id}', [OrderController::class, 'update']); //edits an order
Route::delete('orders/{id}',[OrderController::class, 'destroy']); //delete an order //needs to be changed in the controller in case there is something that depends on this

// orderItem routes
Route::get('/orderItems', [OrderItemController::class, 'index'])->name('orderItems.index');
Route::get('/orderItems/create', [OrderItemController::class, 'create'])->name('orderItems.create');
Route::post('/orderItems', [OrderItemController::class, 'store'])->name('orderItems.store');
Route::get('/orderItems/{orderItem}', [OrderItemController::class, 'show'])->name('orderItems.show');
Route::get('/orderItems/{orderItem}/edit', [OrderItemController::class, 'edit'])->name('orderItems.edit');
Route::put('/orderItems/{orderItem}', [OrderItemController::class, 'update'])->name('orderItems.update');
Route::delete('/orderItems/{orderItem}', [OrderItemController::class, 'destroy'])->name('orderItems.destroy');

// price routes
Route::get('/prices', [PriceController::class, 'index'])->name('prices.index')->middleware('admin');
Route::get('/prices/create', [PriceController::class, 'create'])->name('prices.create')->middleware('admin');
Route::post('/prices', [PriceController::class, 'store'])->name('prices.store')->middleware('admin');
Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('prices.edit')->middleware('admin');
Route::put('/prices/{price}', [PriceController::class, 'update'])->name('prices.update')->middleware('admin');
Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('prices.destroy')->middleware('admin');

// tshirtImage routes
Route::get('/tshirt', [TshirtController::class, 'index'])->name('tshirt.index');
Route::get('/admintshirt', [TshirtController::class, 'adminindex'])->name('tshirt.adminindex')->middleware('admin');
Route::get('/tshirt/{id}/picture', [TshirtController::class, 'getPicture']);
Route::get('/tshirt/create', [TshirtController::class, 'create'])->name('tshirt.create');
Route::post('/tshirt/store', [TshirtController::class, 'store'])->name('tshirt.store');
Route::get('/tshirt/{tshirtImage}/edit', [TshirtController::class, 'edit'])->name('tshirt.edit')->middleware('admin');
Route::put('/tshirt/{tshirtImage}', [TshirtController::class, 'update'])->name('tshirt.update')->middleware('admin');
Route::delete('/tshirt/{tshirtImage}', [TshirtController::class, 'destroy'])->name('tshirt.destroy')->middleware('admin');

//catalogo route
Route::get('/catalogo', [TshirtController::class, 'index'])->name('catalogo.index');


//color routes
Route::get('/colors', [ColorController::class, 'index'])->name('colors.index')->middleware('admin');
Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create')->middleware('admin');
Route::post('/colors', [ColorController::class, 'store'])->name('colors.store')->middleware('admin');
Route::get('/colors/{code}/edit', [ColorController::class, 'edit'])->middleware('admin');
Route::put('/colors/{code}', [ColorController::class, 'update'])->name('colors.update')->middleware('admin');
Route::delete('/colors/{code}', [ColorController::class, 'destroy'])->name('colors.destroy')->middleware('admin');


Auth::routes(); //dont change, this works

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('layouts.admintemplate');
})->name('admin')->middleware('auth');

Route::get('/client', function () {
    return view('layouts.clientetemplate');
})->name('home')->middleware('auth');

//CARRINHO
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
