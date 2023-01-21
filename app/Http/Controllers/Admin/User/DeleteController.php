<?php

namespace App\Http\Controllers\Admin\User;


use App\Models\User;


class DeleteController extends BaseController
{
    public function __invoke(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return \redirect()->route('admin.users.index', \compact('user'));
    }
}
