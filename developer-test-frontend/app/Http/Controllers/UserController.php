<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.dashboard'));
        }

        return redirect()->back();
    }

    public function register(Request $request) {
        $validated = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required_with:conf-password|same:conf-password',
            'conf-password' => 'required',
        ]);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $newUser = new User();
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->save();
        return redirect()->intended(route('guest.login.method'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->intended(route('guest.login'));
    }

    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('register');
    }
}
