<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Request $request, Post $post) 
    {
        $tags = Tag::all();
        $categories = Category::all();
        
        return view("posts.edit", compact("post", "tags", "categories"));
    }
}
