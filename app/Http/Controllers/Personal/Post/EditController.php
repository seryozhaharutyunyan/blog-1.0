<?php

namespace App\Http\Controllers\Personal\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class EditController extends BaseController
{
    public function __invoke(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories=Category::all();
        $tags=Tag::all();
        return \view('personal.post.edit', \compact('post', 'categories', 'tags'));
    }
}
