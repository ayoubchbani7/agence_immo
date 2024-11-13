<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function doLogin(LoginRequest $loginRequest)
    {   
        $credentials = $loginRequest->validated();
        if(Auth::attempt($credentials)){
            $loginRequest->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));

        }
        return back()->withErrors(
            [
                'email'=>'Indentifiants inccorect'
            ]
        )->onlyInput('email');
    }
    public function login()
    {   
        // User::create([
        //     'name'=>'Anass',
        //     'email'=>'anass@gmail.com',
        //     'password'=>Hash::make('0000')
        // ]);
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success','Vous étes maintenant déconnecté');
    }
}
