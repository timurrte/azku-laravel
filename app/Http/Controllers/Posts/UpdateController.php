<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdatePostRequest $request, Post $post) {
        $data = $request->validated();
        $tags = $data['tags'] ?? [];
        unset($data['tags']);
        $post->tags()->sync($tags);
        $post->update($data);
        return redirect(route("posts.index"));
    }
}
