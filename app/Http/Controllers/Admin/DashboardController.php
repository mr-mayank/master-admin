<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    public function edit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);
    }

    public function updaterole(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->type = $request->input('type');
        $users->update();

        return redirect('/role-reg')->with('status', 'Your Data is Updated');
    }

    public function deleterole($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-reg')->with('status', 'Your Data is Deleted');
    }

    public function registerUser(Request $request)
    {
        $users = new User();
        $users->name = $request->input('username');
        $users->email = $request->input('email');
        if($request->input('password') == $request->input('cpassword')){
            $users->password = bcrypt($request->input('password'));
        }else{
            return redirect('/role-reg')->with('status', 'Password not match');
        }
        $users->type = $request->input('type');
        $users->save();
        
        return redirect('/role-reg')->with('status', 'Your Data is Added');
    }
}
