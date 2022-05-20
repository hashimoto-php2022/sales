<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function delivery(Request $request){
        $auth = new \App\Models\Auth;
        $auth->name = $request->name;
        $auth->adress = $request->adress;
        $auth->tel_number = $request->tel_number;
        $auth->e_mail = $request->e_mail;
        $auth->password = $request->password;
        $auth->password_confirmation = $request->password_confirmation;
        return view('auth.register_conf', ['auth' => $auth]);
    }
}
