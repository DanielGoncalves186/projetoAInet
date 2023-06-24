<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Color;
use App\Models\TshirtImage;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderItems.index', compact('orderItems'));
    }

    public function create()
    {
        $orders = Order::all();
        $colors = Color::all();
        $tshirtImages = TshirtImage::all();

        return view('orderItems.create', compact('orders', 'colors', 'tshirtImages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'tshirt_image_id' => 'required',
            'color_code' => 'required',
            'size' => 'required',
            'qty' => 'required|integer',
            'unit_price' => 'required|numeric',
            'sub_total' => 'required|numeric',
        ]);

        OrderItem::create($validatedData);

        return redirect()->route('orderItems.index')->with('success', 'Order item created successfully.');
    }

    public function show(OrderItem $orderItem)
    {
        return view('orderItems.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        $orders = Order::all();
        $colors = Color::all();
        $tshirtImages = TshirtImage::all();

        return view('orderItems.edit', compact('orderItem', 'orders', 'colors', 'tshirtImages'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'tshirt_image_id' => 'required',
            'color_code' => 'required',
            'size' => 'required',
            'qty' => 'required|integer',
            'unit_price' => 'required|numeric',
            'sub_total' => 'required|numeric',
        ]);

        $orderItem->update($validatedData);

        return redirect()->route('orderItems.index')->with('success', 'Order item updated successfully.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('orderItems.index')->with('success', 'Order item deleted successfully.');
    }
}
