<?php

namespace App\Http\Controllers;

use App\Events\posts_count;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    public function store(Request $req)
    {
        $req->validate([
            "title" => 'required|max:255',
            'img' => 'required',
            'img.*' => 'file|mimes:jpeg,jpg,png,gif,mp4|max:90480',
            "body" =>  'required|max:255',
        ]);

        if ($req->file('img')) {
            $path =       $req->file('img')->store('post_img', 'public');
        };
        //  dd($path);
        //   $file =  Storage::putFile("posts",$req['img']);

        $postCount =   Post::create([
            "user_id" => $req->user_id,
            "title" => $req->title,
            "slug" => Str::slug($req->title),
            "body" => $req->body,
            "img" => $path,
        ]);
        // dd($postCount);
        event(new \App\Events\posts_count($postCount));

        return redirect(url('public/posts'));
    }
    public function edit($postId)
    {
        $users = User::all();
        $post = Post::with('user')->findOrFail($postId);
        // dd($post);
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }
    public function update($postId, Request $req)
    {
        dd($postId);
        $req->validate([
            "title" => 'required|max:255',
            "body" =>  'required|max:255',
        ]);
        $image =  $req->file('img');
        $path = $image->store('post_media', 'public');
        Post::findOrFail($postId)->update([
            "user_id" => $req->user_id,
            "title" => $req->title,
            "slug" => Str::slug($req->title),
            "body" => $req->body,
            "img" => $path,
        ]);

        return redirect(url('/posts'));
    }
    public function index()
    {

        $posts = Post::with('user')->paginate(3);
        //  dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }
    public function show($postId)
    {

        $post = Post::findOrFail($postId);
        return view('posts.show', ['post' => $post]);
    }
    public function destroy($postId)
    {

        Post::findOrFail($postId)->delete();

        return redirect(url('/posts'));
    }
}
