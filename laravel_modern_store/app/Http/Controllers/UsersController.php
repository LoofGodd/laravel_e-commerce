<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register(Request $request){
        $formField = $request->validate([
            "username"=> "required|min:3",
            "password"=> "required|confirmed|min:6",
            "email" => 'required|unique:users',
        ]);
        $formField['password'] = bcrypt($formField['password']);
        $user = Users::create($formField);
        auth()->login($user);
        return redirect()->to('/');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }
    public function authentication(Request $request){
        $formField = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $formField['email'],'password'=> $formField['password']])) {
            session()->regenerate();
            return redirect()->to('/');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
