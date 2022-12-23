<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function index()
    {
        # code...
        $colors = Color::all();

        return view('admin.pages.colors.index',
        ['colors' => $colors
        ]);
    }

     public function store(Request $request)
     {
        #validate
        $request->validate([
            'name' => 'required|unique:colors|max:255',
            'code' => 'required|max:255',
        ]);

        #store input data
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        #return
        return back()->with('success', 'saved colors');

     }

     public function destroy($id)
     {
        # code...
        $colors = Color::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'delete colors');


     }
}
