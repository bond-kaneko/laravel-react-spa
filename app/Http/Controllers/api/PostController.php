<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();   
        return response()->json($posts, 200);
    }

    public function add(Request $request)
    {
        $post = new Post;
        $post->name = $request['new_post']['name'];
        $post->content = $request['new_post']['content'];
        $post->save();

        return response()->json($post, 200);
    }

    public function delete(Request $request)
    {
        $post = Post::find($request['post_id']);
        $post->delete();

        return response()->json($post, 200);
    }
}
