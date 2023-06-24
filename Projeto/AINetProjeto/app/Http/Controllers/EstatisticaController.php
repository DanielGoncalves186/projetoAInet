<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Price;
use App\Models\TshirtImage;
use App\Models\User;

class EstatisticaController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();
        $allColors = Color::all();
        $allCustomers = Customer::all();
        $allOrders = Order::all();
        $price = Price::findOrFail(1);
        $allTshirtImages = TshirtImage::all();
        $allUsers = User::all();

        return view('statistics.index')
        ->with('allCategories', $allCategories)
        ->with('allColors', $allColors)
        ->with('allCustomers', $allCustomers)
        ->with('allOrders', $allOrders)
        ->with('price', $price)
        ->with('allTshirtImages', $allTshirtImages)
        ->with('allUsers', $allUsers);
    }
}
