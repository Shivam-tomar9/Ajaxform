<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createcategory()
    {
        return view('category.createcategory');
    }
   
public function storecategory(Request $request)
{
   
    $request->validate([
        'name' => 'required',
    ]);

    
    $category = new Category();
    $category->name = $request->input('name');
    $category->status = $request->has('status') ? 1 : 0;
    
    if (!$request->has('status')) {
        $category->status = 0;
    }
    
    $category->save();
    return redirect()->back()->with('success', 'Category created successfully.');
}
}
