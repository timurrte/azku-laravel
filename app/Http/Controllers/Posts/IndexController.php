<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {

        $post = Post::find(2);
        dd($post->tags);
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }
}
