<?php

namespace App\Http\Controllers\Admin\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $users = User::all();
        return UserResource::collection($users);
    }
}
