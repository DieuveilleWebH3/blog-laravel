<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

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

    public function update(CategoryUpdateRequest $request, $id)
    {
        $data = $request->validated();

        //
        $category = Category::find($id);

        //
        $category->update($data);

        return back();
    }
}
