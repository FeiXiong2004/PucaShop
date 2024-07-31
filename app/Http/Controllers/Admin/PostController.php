<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //Lấy toàn bộ dữ liệu
        // $posts = Post::all();

        //Lấy 1 bài viết
        // $posts = Post::all()->first();

        //lấy dữ liệu theo điều kiện
        // $posts = Post::where('cate_id', 1)->get();

        //Lấy ra tất cả các bài post có lượt view > 800
        // $posts = Post::where('view', '>', 800)->get();

        //Tìm kiếm gần đúng
        // $posts = Post::where('title', 'LIKE', '%aut%')->get();

        //Đếm số lượng bài viết có trong bảng Posts
        // $count = Post::where('cate_id', 1)->count();
        // echo $count;

        //Lấy lượt xem lớn nhất
        // $max_view = Post::max('view');
        // echo $max_view;
        //Hiển thị tất cả bài viết (post) có lượt view cao nhất
        // $posts = Post::where('view', $max_view)->get();

        //Insert data
        //1. Dữ liệu được thêm là 1 mảng
        // $data = [
        //     'title' => fake()->text(25),
        //     'image' => fake()->imageUrl(),
        //     'description' => fake()->text(30),
        //     'content' => fake()->paragraph(),
        //     'view' => rand(10, 1000),
        //     'cate_id' => rand(1, 4),
        // ];
        // Post::create($data);
        //2. Thêm dữ liệu bằng đối tượng
        // $post = new Post();
        // $post->title = fake()->text(25);
        // $post->image = fake()->imageUrl();
        // $post->description = fake()->text(30);
        // $post->content = fake()->paragraph();
        // $post->view = rand(1, 1000);
        // $post->cate_id = rand(1, 4);
        // $post->save();
        //update data
        // $post = Post::find(102)->update([
        //     'title' => fake()->text(20) . ' update'
        // ]);

        //xóa bài viết có id = 101  
        // Post::find(101)->delete();
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }
    public function store(Request $request,){
        $data = $request->except('image');
        $data['image'] = "";
        if($request->hasFile('image')){
            $path_image= $request->file('image')->store('images');
            $data['image'] = $path_image;

        }
        Post::query()->create($data);
        return redirect()->route('admin.post.')->with('message' , 'Create Successfully');
    }
    public function edit(Post $post){
        $categories=Category::all();
        return view('admin.posts.edit',compact('categories','post'));
    }
    public function update(Request $request, Post $post){
        // $data=$request->all();
        $data = $request->except('image');
        // dd($data);
        $old_image = $post->image;
        $data['image'] = $old_image;
        if($request->hasFile('image')){
            if(file_exists('storage/'. $old_image)){
                unlink('storage/'. $old_image);  
            }
            $path_image= $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        $post->update($data);
       
        return redirect()->route('admin.post.')->with('message' , 'Update Successfully');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('admin.post.')->with('message' , 'Delete Successfully');
    }
}