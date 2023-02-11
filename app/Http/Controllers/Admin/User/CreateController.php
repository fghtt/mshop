<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
}
