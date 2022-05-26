<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function delivery(Request $request){
        //requestにはformで送られた値が格納されている
        //変更点 5/25
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required|max:200',
            'tel_number' => ['required','digits_between:10,11','regex:/(^0[0-9]{9}$|^0[789]0[0-9]{8}$)/'],            'tel_number' => ['required','digits_between:10,11','regex:/(^0[0-9]{9}$|^0[789]0[0-9]{8}$)/'],
            'email' => 'required|unique:users|max:50|email',
            'birthday' => 'required|date_format:"Ymd"|before:today',
            'password' => 'required|min:8|confirmed',
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
