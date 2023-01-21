<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts=$category->posts()->paginate(6);
        if($posts->count()===0) {
            return \redirect()->route('category.index');
        }
        return \view('categories.post.index', \compact('posts'));
    }
}
