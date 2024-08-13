<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){



        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'

        ]);


        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autenticar usuario

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}
