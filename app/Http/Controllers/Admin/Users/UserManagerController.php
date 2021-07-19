<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function users()
    {
        return view('admin.users.users');
    }

    public function permission()
    {
        return view('admin.users.permissions');
    }
}
