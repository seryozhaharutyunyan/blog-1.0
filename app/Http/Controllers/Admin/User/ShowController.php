<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;


class ShowController extends BaseController
{
    public function __invoke(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('admin.users.show', \compact('user'));
    }
}
