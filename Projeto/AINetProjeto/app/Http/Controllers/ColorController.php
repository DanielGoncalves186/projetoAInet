<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('colors.index')->with('colors', $colors);
    }

    public function create()
    {
        return view('colors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Color::create($request->all());

        return redirect()->route('colors.index')
            ->with('success', 'Color created successfully.');
    }

    public function edit($code): View
    {
        $color = Color::where('code', $code)->firstOrFail();
        $pageTitle = 'Update Color';
        return view('colors.edit', compact('color', 'pageTitle'));
    }

    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $color->update($request->all());

        return redirect()->route('colors.index')
            ->with('success', 'Color updated successfully.');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }

    public function getColors()
    {
        $colors = Color::all();
        return $colors;
    }
}
