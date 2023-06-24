<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        return view('prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_price_catalog' => 'required',
            'unit_price_own' => 'required',
            'unit_price_catalog_discount' => 'required',
            'unit_price_own_discount' => 'required',
            'qty_discount' => 'required',
        ]);

        Price::create($request->all());

        return redirect()->route('prices.index')
            ->with('success', 'Price created successfully.');
    }

    public function edit(Price $price)
    {
        return view('prices.edit', compact('price'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'unit_price_catalog' => 'required',
            'unit_price_own' => 'required',
            'unit_price_catalog_discount' => 'required',
            'unit_price_own_discount' => 'required',
            'qty_discount' => 'required',
        ]);

        $price = Price::findOrFail($id);
        $price->fill($validatedData);
        $price->update();
        return redirect()->route('prices.index')
            ->with('success', 'Price updated successfully.');
    }

    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('prices.index')
            ->with('success', 'Price deleted successfully.');
    }
}
