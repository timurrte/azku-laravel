<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Post $post) {
        $post->delete();
        return redirect(route('posts.index'));
    }
}
