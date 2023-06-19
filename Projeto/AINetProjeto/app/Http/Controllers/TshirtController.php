<?php

namespace App\Http\Controllers;

use App\Models\TshirtImage;
use Illuminate\Http\Request;
use App\Http\Controllers\ColorController;

class TshirtController extends Controller
{
    public function index()
    {
        $tshirtImages = TshirtImage::all();

        // Instancie o ColorController
        $colorController = new ColorController();

        // Obtenha as cores disponíveis
        $colors = $colorController->getColors();

        // Retorne a visualização com as imagens de camiseta e as cores disponíveis
        return view('tshirt.index', compact('tshirtImages', 'colors'))
        ->with('pageTitle', 'TShirt Catálogo');
    }

    public function create()
    {
        return view('tshirt.create');
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

        return redirect()->route('tshirt.index')
            ->with('success', 'Tshirt Image created successfully.');
    }

    public function edit(TshirtImage $tshirtImage)
    {
        return view('tshirt.edit', compact('Tshirt Edit'));
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

        return redirect()->route('tshirt.index')
            ->with('success', 'Tshirt Image updated successfully.');
    }

    public function destroy(TshirtImage $tshirtImage)
    {
        $tshirtImage->delete();

        return redirect()->route('tshirt.index')
            ->with('success', 'Tshirt Image deleted successfully.');
    }
     public function getPicture($id)
    {
        // Retrieve the Tshirt model from the database based on the given ID
        $tshirt = App\Http\Controllers\TshirtImage::find($id);

        if (!$tshirt) {
            // Handle the case when the Tshirt with the given ID is not found
            abort(404, 'Tshirt not found');
        }

        // Get the picture data from the Tshirt model
        $pictureData = $tshirt->picture;

        // Check if the picture data exists
        if (!$pictureData) {
            // Handle the case when the picture data is not found
            abort(404, 'Picture not found');
        }

        // Set the appropriate response headers for the picture
        $headers = [
            'Content-Type' => $pictureData->mime_type,
            'Content-Length' => $pictureData->file_size,
        ];

        // Return the picture file as a response
        return response()->streamDownload(function () use ($pictureData) {
            echo $pictureData->file_content;
        }, $pictureData->file_name, $headers);
    }
        
}