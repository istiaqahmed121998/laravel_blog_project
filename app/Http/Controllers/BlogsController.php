<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


use Log;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('welcome', compact('blogs'));
    }

    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('post', compact('blog'));
    }
    public function create()
    {
        return view('admin.create_post');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $blog = Blog::create($input);
        return dd($blog);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        //return dd($blog);

        return view('admin.edit_post', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
    }
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }
    public function trash()
    {
        $blog = Blog::onlyTrashed();
        return view('admin.edit_post', compact('blog'));
        
    }
    public function restore(Request $request,$id)
    {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        
    }
    public function permanentDelete(Request $request,$id)
    {
        $premanentDelete = Blog::onlyTrashed()->findOrFail($id);
        $premanentDelete->forceDelete($premanentDelete);
        
    }
}
