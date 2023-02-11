<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke($id)
    {
        $user = User::find($id);
        $user->delete();
        return response();
    }
}
