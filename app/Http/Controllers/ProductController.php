<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        // with('category')->orderBy('created_at', 'desc')->get();
        $products = Product::with('category', 'colors')
        ->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.pages.products.index',
        ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.create',
    [
        'categories' => $categories,
        'colors' => $colors
            ]);
    }

    public function store(Request $request)
    {
        // dd($request->colors);
        //validate
        $request->validate(
            [
                'title' => 'required|max:225',
                'category_id' => 'required',
                'colors' => 'required',
                'price' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        //image
        $image_name = 'products/' . time() . rand(0, 9999) . '.'
        .$request->image->getClientOriginalExtension();
        // dd($image_name);
        $request->image->storeAs('public', $image_name);

        // store all
        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price * 100,
            'image' => $image_name,
            // 'color_id' => $request->colors,
            'description' => $request->description,
        ]);
        $product->color_id()->attach($request->input('colors'));

        return back()->with('Succcess','Save products');
        // return redirect()->route('adminpanel.product.index')
        // ->with(['success' => 'Data Product Save']);

    }

    public function edit(){
        return 'edit products';

    }
    public function update(){
        return 'update products';

    }
    public function destroy(){
        return ' delete products';

    }


}
