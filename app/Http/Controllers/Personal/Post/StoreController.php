<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Requests\Personal\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
        return \redirect()->route('personal.post.index');
    }
}
