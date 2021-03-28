<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categoryshow', compact('categories'));
    }
    public function list()
    {
        $categories = Category::all('id','name','slug');
        return array('categories' => $categories);
    }
    public function store(Request $request)
    {
        $category=Category::firstOrNew(['name'=>$request->get('name'),'slug'=>$request->get('slug')]);
        $category->save();
        return $category;
    }
}
