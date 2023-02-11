<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return void
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
}
