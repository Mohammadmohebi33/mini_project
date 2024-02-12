<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('created_at' , 'desc')->paginate(10);
        return view('panel.category.index' , compact('categories'));
    }

    public function show(Category $category)
    {
        return view('panel.category.show' , compact('category'));
    }



    public function store(Request $request)
    {
        Category::query()->create([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        return back()->with('swal-success' , 'category create successfully');
    }


    public function update(Request $request , Category $category)
    {
        $category->update([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        return redirect()->route('category.index')->with('swal-success' , 'category update successfully');
    }



    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('swal-success' , 'category deleted successfully');
    }
}
