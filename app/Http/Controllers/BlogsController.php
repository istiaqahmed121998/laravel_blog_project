<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use Log;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::take(20)
            ->get()
            ->sortByDesc('created_at')->category();
        return view('welcome', compact('blogs'));
    }

    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        // // get previous blog id
        $previous = Blog::where('id', '<', $blog->id)->orderBy('id','desc')->first();

        // // get next blog id
        $next = Blog::where('id', '>', $blog->id)->orderBy('id','desc')->first();

        $categories=Category::inRandomOrder()->take(5)->get()->sortByDesc('created_at');
        
        return view('post', compact('blog','previous','next','categories'));
    }
    public function create()
    {
        $categories = Category::all('id', 'name', 'slug');
        return view('admin.create_post', compact('categories'));
    }
    public function store(Request $request)
    {
        //$input = $request->all();
        $blog = Blog::create([
            'title' => $request->get('title'),
            'body'  => $request->get('body'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category'),

        ]);
        if ($blog) {
            $tagIds = [];
            foreach ($request->get('tags') as $tagName) {
                //$post->tags()->create(['name'=>$tagName]);
                //Or to take care of avoiding duplication of Tag
                //you could substitute the above line as
                $slug = Str::slug($tagName, '-');
                $tag = Tag::firstOrCreate(['name' => $tagName, 'slug' => $slug]);
                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            $blog->tags()->sync($tagIds);
        }
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
    public function restore(Request $request, $id)
    {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
    }
    public function permanentDelete(Request $request, $id)
    {
        $premanentDelete = Blog::onlyTrashed()->findOrFail($id);
        $premanentDelete->forceDelete($premanentDelete);
    }
    public function list()
    {
        $blogs = Blog::paginate(10);
        return view('admin.bloglist', compact('blogs'));
    }
}
