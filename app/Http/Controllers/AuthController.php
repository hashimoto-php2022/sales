<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function delivery(Request $request){
        //requestにはformで送られた値が格納されている
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:200',
            'tel_number' => 'required||max:13',
            'email' => 'required|unique:users|max:50',
            'birthday' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);
        $auth = new \App\Models\Auth;
        $auth->name = $request->name;
        $auth->address = $request->address;
        $auth->tel_number = $request->tel_number;
        $auth->email = $request->email;
        $auth->birthday = $request->birthday;
        $auth->password = $request->password;
        $auth->password_confirmation = $request->password_confirmation;        
        return view('auth.register_conf', ['auth' => $auth]);
    }
}
