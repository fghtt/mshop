<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {

        return view('admin.main');
    }
}
