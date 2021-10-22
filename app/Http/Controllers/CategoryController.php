<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    //

    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('category.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return back();
    }
}
