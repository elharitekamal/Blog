<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(Request $request)
    {

        $request->validate
        ([
                'email' => 'required',
                'password' => 'required',

            ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return redirect('/posts');

        }
        return redirect('login');

    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);


        return redirect("login");
    }



    public function logout(Request $request)
    {

        session::flush();
        Auth::logout();


        return redirect('/login');
    }






}