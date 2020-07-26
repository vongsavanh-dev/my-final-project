<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('USER.index')->with('users', $users);
    }

    public function MakeAdmin(User $user)
    {
        $user->status = 'Admin';
        $user->save();
        session()->flash('update', 'ປ່ຽນແປງຂໍ້ມູນສຳເລັດ');
        return redirect(route('user.index'));
    }
}
