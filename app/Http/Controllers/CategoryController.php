<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('index', [
            'items' => $categories
        ]);
    }

    public function store(Request $request)
    {
        Category::create([
            'category_name'=>$request->category_name
        ]);

        return redirect('/products');
    }
}
