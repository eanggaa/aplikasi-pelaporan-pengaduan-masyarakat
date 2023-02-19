<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('back.pages.authentications.login');
    }

    public $email, $password;

    public function postlogin(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $creds = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );

        if(Auth::guard('web')->attempt($creds)){
            if(auth()->user()->status_aktif == 1){
                if(auth()->user()->level == 1){
                    return redirect()->route('admin.dashboard');
                }elseif(auth()->user()->level == 2){
                    return redirect()->route('petugas.dashboard');
                }elseif(auth()->user()->level == 3){
                    return redirect()->route('user.dashboard');
                }
            }elseif(auth()->user()->status_aktif == 2){
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('fail', 'Your account has been disabled');
            }else{
                return redirect()->route('login')->with('fail', 'Your account has been disabled. Please try again');
            }
        }else{
            return redirect()->route('login')->with('fail', 'The e-mail address or password you entered is incorret. Please try again');
        }
    }

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

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
