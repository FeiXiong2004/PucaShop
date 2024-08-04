<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::query()->orderBy('id','desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {

        return view('admin.posts.create');
    }
    public function store(CreatePostRequest $request)
    {  
       
        $data = $request->except('image');
        $data['image'] = "";
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        Post::query()->create($data);
        return redirect()->route('admin.post.')->with('message', 'Create Successfully');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'post'));
    }
    public function update(Request $request, Post $post)
    {
        // $data=$request->all();
        $data = $request->except('image');
        // dd($data);
        $old_image = $post->image;
        $data['image'] = $old_image;
        if ($request->hasFile('image')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        $post->update($data);

        return redirect()->route('admin.post.')->with('message', 'Update Successfully');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.')->with('message', 'Delete Successfully');
    }
}
