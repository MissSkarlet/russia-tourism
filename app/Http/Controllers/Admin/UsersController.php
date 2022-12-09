<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index() {
        $data = User::paginate();
        return view('admin.users.index', ['data' => $data]);
    }
}
