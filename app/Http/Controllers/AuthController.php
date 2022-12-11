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

        $request->validate([
            'email' => 'bail|required|regex:/^[\w\.\-]+\@([a-z0-9]+\.)+[a-z]{2,3}$/',
            'password' => 'bail|required'
        ]);

        try{
            $user = User::with('roles')->where('email', $email)->where('password', $password)->first();
            $user->IsAdmin = $user->roles->name == 'admin';
            if($user){
                $request->session()->put('user', $user);
                $request->session()->put('cartItems', []);
                if($user->IsAdmin){
                    return redirect()->route('admin-brands');
                }
                return redirect('home');
            }
            return redirect()->route('login-form')->with('msg', 'Email or password is incorrect');
        }catch (\Exception $ex){
            //dd($ex->getMessage());
            return redirect()->route('login-form')->with('msg', 'Email or password is incorrect');
        }
    }

    public function logout(Request $request){
        $request->session()->remove("user");
        return redirect()->route("home");
    }
}
