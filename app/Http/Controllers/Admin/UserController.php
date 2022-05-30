<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize(Auth::user());
        $users = User::get();

        $query = User::select('id', 'name', 'address', 'tel_number', 'email');
            if ($request->name) {
                $query->where('name', 'LIKE', '%'. $request->name. '%');
            }
            if ($request->address) {
                $query->where('address', 'LIKE', '%'. $request->address. '%');
            }
        $users = $query->paginate(10);
            return view('admins/users/index', ['users' => $users]);
    }

    public function show($id)
    {
        $this->authorize(Auth::user());
        $user=User::find($id);
        return view('admins/users/show', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect(route('users.index'));
    }
}
