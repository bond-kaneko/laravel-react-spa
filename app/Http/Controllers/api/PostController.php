<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();   
        return response()->json($posts, 200);
    }

    public function add()
    {
        // TODO 保存処理
        $posts = Post::all();   
        return response()->json($posts, 200);
    }
}
