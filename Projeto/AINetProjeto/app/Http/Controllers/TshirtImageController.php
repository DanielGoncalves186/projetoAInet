<?php

namespace App\Http\Controllers;

use App\Models\TshirtImage;
use Illuminate\Http\Request;

class TshirtImageController extends Controller
{
    public function index()
    {
        $tshirtImages = TshirtImage::all();
        return view('tshirt_images.index', compact('tshirtImages'));
    }

    public function create()
    {
        return view('tshirt_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        TshirtImage::create($request->all());

        return redirect()->route('tshirt_images.index')
            ->with('success', 'TshirtImage created successfully.');
    }

    public function edit(TshirtImage $tshirtImage)
    {
        return view('tshirt_images.edit', compact('tshirtImage'));
    }

    public function update(Request $request, TshirtImage $tshirtImage)
    {
        $request->validate([
            'customer_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $tshirtImage->update($request->all());

        return redirect()->route('tshirt_images.index')
            ->with('success', 'TshirtImage updated successfully.');
    }

    public function destroy(TshirtImage $tshirtImage)
    {
        $tshirtImage->delete();

        return redirect()->route('tshirt_images.index')
            ->with('success', 'TshirtImage deleted successfully.');
    }
}
