<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //indexメソッド
    //public function index()
    //{
        //$list = DB::table('posts')->get();
        //return view('posts.index',['lists'=>$list]);
    //}

    //indexメソッド
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $posts = Post::when($keyword, function ($query, $keyword) {
            return $query->where('content', 'like', "%{$keyword}%");
        })->latest()->paginate(10);

        return view('posts.index', compact('posts', 'keyword'));
    }

    //createメソッド
    //投稿検索機能

    public function create()
    {
        return view('posts.create');
    }

    //投稿新規作成機能

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);
        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
        return redirect()->route('posts.index')->with('success', '投稿しました');
    }

    //
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) abort(403);
        return view('posts.edit', compact('post'));
    }

    //更新メソッド
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) abort(403);
        $request->validate(['content' => 'required']);
        $post->update(['content' => $request->content]);
        return redirect()->route('posts.index')->with('success', '更新しました');
    }

    //投稿削除メソッド
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) abort(403);
        $post->delete();
        return redirect()->route('posts.index')->with('success', '削除しました');
    }
}
