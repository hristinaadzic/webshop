<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::with('roles')->get();
        return view('admin.pages.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = md5($request->input('password'));

//        $request->validate([
//            'firstname' => 'bail|required',
//            'lastname' => 'bail|required',
//            'email' => 'bail|required|unique:users,email',
//            'password' => 'bail|required',
//        ]);

        try{

            $user = new User();
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->email = $email;
            $user->password = $password;
            $user->roleId = 1;
            $user->save();

            return redirect()->route('register')->with('success', 'Your registration was succesful');
        }
        catch(\Exception $ex){
            return redirect()->route('register')->with('error', 'There was an error processing your request');
            //dd($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::find($id);

            if(!$user->isDeleted){
                $user->isDeleted = true;
            }
            else{
                $user->isDeleted = false;
            }

            $user->save();
            return redirect()->route('admin-users')->with('success', 'User status was changed');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('admin-users')->with('error', 'There was an error processing your request');

        }
    }
}
