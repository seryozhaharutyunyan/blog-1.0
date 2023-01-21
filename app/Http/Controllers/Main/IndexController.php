<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts=Post::paginate(6);
        $randomPosts=Post::get()->random(1);
        $likePosts=Post::withCount('likeUsers')->orderBy('like_users_count', 'desc')->get()->take(4);
        return \view('main.index', \compact('posts', 'randomPosts', 'likePosts'));
    }
}
