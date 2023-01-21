<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.post.show', \compact('post'));
    }
}
