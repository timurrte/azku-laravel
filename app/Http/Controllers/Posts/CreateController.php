<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request) {

        $tags = Tag::all();
        $categories = Category::all();

        return view("posts.create", compact("tags","categories"));
    }
}
