<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public static function index(){
        return view('home', [
            'postList' => Post::latest('published_datetime')->filter(request(['keyword']))->with('category','author')->get() 
        ]);
    }

    public static function show(Post $post){
        return view('view-post', [
            'post' => $post
        ]);
    }

    public static function store(){
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => '',
            'body' => 'required',
            'user_id' => 'required|exists:users,id|max:255',
            'category_id' => 'required|exists:categories,id|max:255',
        ]);

        if(Post::create($attributes)){
            return 'Post created succcessfully';
        }else{
            return 'Post creation unsuccessful';
        }
    }

    public static function update(){
       $attributes = request()->validate([
            'id' => 'required|exists:posts,id',
            'title' => 'required|max:255',
            'excerpt' => '',
            'body' => 'required',
            'user_id' => 'required|exists:users,id|max:255',
            'category_id' => 'required|exists:categories,id|max:255',
        ]);

        $post = Post::where('id', $attributes['id'])->first();

        $post->title = $attributes['title'];
        $post->excerpt = $attributes['excerpt'];
        $post->body = $attributes['body'];
        $post->category_id = $attributes['category_id'];

        if($post->save()){
            return 'Post updated succcessfully';
        }else{
            return 'Post update unsuccessful';
        }
    }

    public static function delete(){
        $attributes = request()->validate([
            'id' => 'required|exists:posts,id',
        ]);

        $user = Post::where('id', $attributes['id'])->first();

        if($user->delete()){
            return 'Post deleted succcessfully';
        }else{
            return 'Post deleted unsuccessful';
        }
    }
}
