<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function add_user()
    {
        $user = User::all();
        return view('admin_views/add_user', ['userList' => $user]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        if ($user) {
            Session::flash('status', 'add_success');
            Session::flash('message', 'User Data Added!');
        }

        return redirect('/add-user');
    }

    public function update_user(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();

        if ($user) {
            Session::flash('status', 'update_success');
            Session::flash('message', 'User Data Updated!');
        }

        return redirect('/add-user');
    }

    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        if ($user) {
            Session::flash('status', 'delete_success');
            Session::flash('message', 'User Data Deleted!');
        }

        return redirect('/add-user');
    }
}
