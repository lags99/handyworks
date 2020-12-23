<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin'])->except(['index', 'single']);
    }
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['admin'])->paginate(20);

        return view('pages.blog', ['posts' => $posts]);
    }
    public function create()
    {
        return view('pages.admin.post-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255',],
            'body' => ['string', 'required']
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect(route('posts'))->with('success', 'Post Created Successfuly');
    }
    public function post_image(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileNameWithExt = $request->upload->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $fileExt = $request->upload->getClientOriginalExtension();

            $fileNameToUpload = $fileName . '_' . time() . '.' . $fileExt;

            $request->upload->storeAs('public/post_images', $fileNameToUpload);
        }
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('images/' . $fileName);
        $msg = 'Image successfully uploaded';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        echo $response;
    }
    public function single(Post $post)
    {
        return view('pages.admin.single-post', ['post' => $post]);
    }
    public function edit(Post $post)
    {
        return view('pages.admin.post-edit', ['post' => $post]);
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'body' => ['required', 'string'],
        ]);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect(route('posts'))->with('success', 'Post Update Successfuly');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts'))->with('success', 'Post Deleted Successfully');
    }
}
