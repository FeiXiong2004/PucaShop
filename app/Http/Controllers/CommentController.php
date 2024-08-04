<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'product_id' => 'required|exists:products,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('comment');
        $comment->user_id = Auth::id();
        $comment->author = Auth::user()->fullname ;
        $comment->product_id = $request->input('product_id');
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận đã được thêm thành công!');
    }
    public function destroy($id){
        $comment = Comment::query()->findOrFail($id);
        if($comment->user_id === Auth::id()){
            $comment->delete();
            return redirect()->back()->with('success', 'Bình luận đã được xóa thành công!');
        }
        return redirect()->back()->with('error', 'Bạn không có quyền xóa bình luận này!');
    }
}
