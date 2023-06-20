<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index')
        ->with('categories', $categories)
        ->with('pageTitle', 'categories List');
    }
    public function create(): View
    {
      return view('categories.create')->withPageTitle('Add Category');
    }
    /*
    public function store(Request $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()->action([CategoryController::class, 'index']);
    }
    */

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
        'name' => 'required|unique:categories,name',
        ], [ // Custom Error Messages
        'name.required' => '"name" is required.',
        'name.unique' => '"name" must be unique'
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        Category::create($validated);
        return redirect()->action(
        [CategoryController::class, 'index']);
    }
    public function edit($id): View
    {
        $category = Category::findOrFail($id);
        $pageTitle = 'Update Category';
        return view('Categories.edit', compact('category', 'pageTitle'));
    }
    public function update(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            ], [ // Custom Error Messages
            'name.required' => '"name" is required.',
            'name.unique' => '"name" must be unique'
            ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        $category = Category::findOrFail($id);
        $category->fill($validated);
        $category->save();
        return redirect()->action([CategoryController::class,'index']);
           }


    public function destroy($id) : RedirectResponse{
        Category::destroy($id);
        return redirect()->action(
        [CategoryController::class, 'index']);
        }
}
