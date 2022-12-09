<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminsController extends Controller
{

    public function index() {
        $data = Admin::paginate();
        return view('admin.admins.index', ['data' => $data]);
    }
}
