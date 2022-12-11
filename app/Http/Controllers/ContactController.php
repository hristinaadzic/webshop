<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view("pages.contact");
    }

    public function store(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $messageText = $request->input('message');

        $request->validate([
            'firstname' => 'bail|required|regex:/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,19}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,19})*$/',
            'lastname' => 'bail|required|regex:/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,19}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,19})*$/',
            'email' => 'bail|required|unique:users,email|regex:/^[\w\.\-]+\@([a-z0-9]+\.)+[a-z]{2,3}$/',
            'message'=> 'required'
        ]);

        try{
            $message = new Message();
            $message->firstname = $firstname;
            $message->lastname = $lastname;
            $message->email = $email;
            $message->message = $messageText;
            $message->save();

            return redirect()->route('contact')->with('success', 'Your message was sent');
        }
        catch(\Exception $ex){
            return redirect()->route('contact')->with('error', 'There was an error processing your request');
            //dd($ex->getMessage());
        }
    }
}
