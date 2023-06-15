<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TshirtImageController;
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
Route::get('/register', function () {
    return view('Registrations/CustomerRegist');
});
Route::get('/login', function () {
    return view('Login/login');
});
//users routes
Route::get('users',[UserController::class, 'index']); //route to page that shows all users
Route::get('users/create',[UserController::class, 'create']); //route to page that creates a user
Route::post('users',[UserController::class, 'store']); //creates a user
Route::get('users/{id}/edit', [UserController::class, 'edit']); //route to page that edits a user
Route::put('users/{id}', [UserController::class, 'update']); //edits a user
Route::delete('users/{id}',[UserController::class, 'destroy']); //deletes a user //needs to be changed in the controller in case there is something that depends on this
//categories routes
Route::get('categories',[CategoryController::class, 'index']); //route to page that shows all categories
Route::get('categories/create',[CategoryController::class, 'create']); //route to page that creates a category
Route::post('categories',[CategoryController::class, 'store']); //creates a category
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']); //route to page that edits a category
Route::put('categories/{id}', [CategoryController::class, 'update']); //edits a category
Route::delete('categories/{id}',[CategoryController::class, 'destroy']); //deletes a category //needs to be changed in the controller in case there is something that depends on this

// Customers routes
Route::get('customers',[CustomerController::class, 'index']); //route to page that shows all customers
Route::get('customers/{id}',[CustomerController::class, 'indexCustomer']); //show a customer //implementar no controller !!!
Route::get('customers/create',[CustomerController::class, 'create']);  //route to page that creates a customer, use it if the user is a customer
Route::post('customers',[CustomerController::class, 'store']); //create a customer
Route::get('customers/{id}/edit', [CustomerController::class, 'edit']); //route to page that edits a customer
Route::put('customers/{id}', [CustomerController::class, 'update']); //edits a customer
Route::delete('customers/{id}',[CustomerController::class, 'destroy']); //needs to be changed in the controller in case there is something that depends on this

// orders routes -------------------------------------------------added 13/06 by vv (its late so i dont have the patience to check stuff, also needs to be added to the controllers, this methods)
Route::get('orders',[OrderController::class, 'index']); //route to page that shows all orders
Route::get('orders/{id}',[OrderController::class, 'indexUser']); //route to page that shows a customer
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
Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');
Route::get('/prices/create', [PriceController::class, 'create'])->name('prices.create');
Route::post('/prices', [PriceController::class, 'store'])->name('prices.store');
Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('prices.edit');
Route::put('/prices/{price}', [PriceController::class, 'update'])->name('prices.update');
Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('prices.destroy');

// tshirtImage routes
Route::get('/tshirt_images', [TshirtImageController::class, 'index'])->name('tshirt_images.index');
Route::get('/tshirt_images/create', [TshirtImageController::class, 'create'])->name('tshirt_images.create');
Route::post('/tshirt_images', [TshirtImageController::class, 'store'])->name('tshirt_images.store');
Route::get('/tshirt_images/{tshirtImage}/edit', [TshirtImageController::class, 'edit'])->name('tshirt_images.edit');
Route::put('/tshirt_images/{tshirtImage}', [TshirtImageController::class, 'update'])->name('tshirt_images.update');
Route::delete('/tshirt_images/{tshirtImage}', [TshirtImageController::class, 'destroy'])->name('tshirt_images.destroy');


// tshirt routes
Route::get('tshirt',[OrderController::class, 'index']);
Route::get('tshirt',[OrderController::class, 'indexUserTshirt']);
Route::get('tshirt/create',[OrderController::class, 'create']);
Route::post('tshirt',[OrderController::class, 'store']);
Route::get('tshirt/{id}/edit', [OrderController::class, 'edit']);
Route::put('tshirt/{id}', [OrderController::class, 'update']);
Route::delete('tshirt/{id}',[OrderController::class, 'destroy']);

/*
// Template de rotas
Route::get('tshirt',[TemplateController::class, 'index']);
Route::get('tshirt/create',[TemplateController::class, 'create']);
Route::post('tshirt',[TemplateController::class, 'store']);
Route::get('tshirt/{id}/edit', [TemplateController::class, 'edit']);
Route::put('tshirt/{id}', [TemplateController::class, 'update']);
Route::delete('tshirt/{id}',[TemplateController::class, 'destroy']);

*/
