<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Register page
    public function registerpage() {
        return view('auth.register');
    }
    //Add User
    public function adduser() {
        return view('backend.adduser');
    }
    //Adedd User
    public function addeduser(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);

        $user->save();
        return redirect(Route('manageuser'));
    }
    //Manage User
    public function manageuser() {
        $users = User::all();
        return view('backend.manageuser', compact('users'));
    }
}
