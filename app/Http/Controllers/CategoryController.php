<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Http\Requests\CategoryFormRequest;
class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('name')->paginate(25);

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $category = new Category();
        return view("category.form", [
            'category' => $category
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        $option = Category::create($request->validated());
        return redirect()->route('category.index')->with('success','La catégorie a été créée avec succès');
    }


    public function edit(Category $category)
    {
        return view("category.form", [
            'category' => $category
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.index')->with('success','La catégorie a bien été modifiée');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','La catégorie a bien été supprimée');
    }
}
