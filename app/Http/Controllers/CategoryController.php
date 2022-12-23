<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        # code...
        $categories = Category::all();

        return view('admin.pages.categories.index',
        ['categories' => $categories
        ]);
    }

     public function store(Request $request)
     {
        #validate
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        #store
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        #return
        return back()->with('success', 'saved category');

     }

     public function destroy($id)
     {
        # code...
        $category = Category::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'delete category');
     }
}
