<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register(){
        return view('back.pages.authentications.register');
    }

    public function postregister(Request $request){
        $request->validate([
            'nik' => 'required|unique:users,nik',
            'nama' => 'required',
            'no_hp' => 'required|unique:users,no_hp',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = array(
            'nik' => $request['nik'],
            'nama' => $request['nama'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        );

        User::create($user);

        return redirect()->route('login');
    }
}
