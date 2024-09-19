<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class StoreController extends Controller
{
    public function __invoke(StorePostRequest $request) {
        $post = $request->validated();
        $post->store();
    }
}
