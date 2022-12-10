<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function index() {
        $data = Admin::paginate();
        return view('admin.admins.index', ['data' => $data]);
    }

    public function edit(Admin $admin) {
        return view('admin.admins.form', ['user' => $admin]);
    }

    public function update(Request $request, Admin $admin) {
        $data = $request;
        
        $admin->name = $data->name;
        $admin->surname = $data->surname;
        $admin->email = $data->email;
        if (filled($data->password)) {
            $admin->password = Hash::make($data->password);
        }
        $admin->save();

        return redirect()->to(route('admin.admin.index'));
    }

    public function create() {
        return view('admin.admins.form');
    }

    public function store(Request $request) {
        $data = $request;

        $user = new Admin();
        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();

        return redirect()->to(route('admin.admin.index'));
    }

    public function destroy(Admin $admin) {
        $admin->delete();
        return redirect()->to(route('admin.admin.index'));
    }
}
