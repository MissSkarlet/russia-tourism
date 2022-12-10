<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index() {
        $data = User::paginate();
        return view('admin.users.index', ['data' => $data]);
    }

    public function edit(User $user) {
        return view('admin.users.form', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $data = $request;
        
        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->middle_name = $data->middle_name;
        $user->email = $data->email;
        if (filled($data->password)) {
            $user->password = Hash::make($data->password);
        }
        $user->save();

        return redirect()->to(route('admin.user.index'));
    }

    public function create() {
        return view('admin.users.form');
    }

    public function store(Request $request) {
        $data = $request;

        $user = new User();
        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->middle_name = $data->middle_name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();

        return redirect()->to(route('admin.user.index'));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->to(route('admin.user.index'));
    }
}
