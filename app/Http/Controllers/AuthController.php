<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use function Termwind\render;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('auth.register');


    }
    public function login(Request $req)
    {

     $isLogin = Auth::attempt(['email' => $req->email, 'password' =>  $req->password]);
     if ($isLogin) {
        return redirect(url('/login'));
     }
     return redirect(url('/posts'));

    }
    public function register(Request $req)
    {
        $user =  User::create([
            "name"=>$req->name,
            "email" => $req->email,
            "password"=> $req->password,
        ]);
       Auth::login($user);
       return redirect(url('/posts'));

    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/login'));

    }
    public function loginForm()
    {

        return view('auth.login');
    }
}
