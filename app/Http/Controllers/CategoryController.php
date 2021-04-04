<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function show($id)
    {
        $category = Category::findOrFail($id, array('id', 'name', 'slug'));
        //$category = Category::where('id', $id)->firstOrFail();
        return $category;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $category = Category::findOrFail($id);
        $category->update($input);
    }
    public function showslug($slug){
        $category= Category::where('slug', $slug)->firstOrFail();
        $categories=Category::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        return view('category',compact('category','categories'));

    }
}
