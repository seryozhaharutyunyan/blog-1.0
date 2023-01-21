<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts=\auth()->user()->posts;
        return \view('personal.post.index', \compact('posts'));
    }
}
