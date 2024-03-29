<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {

        return view('auth.register');
    }
    public function login()
    {

        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password');
        }
        session(['user_id' => $user->id]);

        session(['user_role' => $user->roles->id]);

        return redirect('/home');
    }
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);
        $input = $request->all();
        $input['role_id'] = 39;
        User::create($input);
        return redirect('/login');
    }
    public function logout()
{
    session()->forget('user_id');
    session()->forget('user_role');
    session()->flush();
    return redirect()->route('auth.login');
}
}
