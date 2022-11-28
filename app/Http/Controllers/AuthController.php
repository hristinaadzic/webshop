<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('pages.login');
    }

    public function login(Request $request){

        $email = $request->input("email");
        $password = md5($request->input("password"));

        try{
            $user = User::where('email', $email)->where('password', $password)->first();

            if($user){
                $request->session()->put('user', $user);
                return redirect('home');
            }
            return redirect()->route('login-form')->with('msg', 'Email or password is incorrect');
        }catch (\Exception $ex){
            dd($ex->getMessage());
        }
    }

    public function logout(Request $request){
        $request->session()->remove("user");
        return redirect()->route("home");
    }
}
