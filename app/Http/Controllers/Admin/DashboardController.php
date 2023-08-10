<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function user_pro()
    {
        $user = Auth::user();
        $details = User::where('email', $user->email)->first();
        return view('admin.user-edit')->with('users', $details);
    }

    public function user(){
        $user = Auth::user();
        $details = User::where('email', $user->email)->first();
        return view('admin.user-edit')->with('users', $details);
    }

    public function userupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->email = $request->input('email');
        // if($request->input('password') == $request->input('cpassword')){
        //     $users->password = bcrypt($request->input('password'));
        // }else{
        //     return redirect('/user')->with('status', 'Password not match');
        // }
        $users->update();

        return redirect('/user')->with('status', 'Your Data is Updated');
    }


    public function adminupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->email = $request->input('email');
        // if($request->input('password') == $request->input('cpassword')){
        //     $users->password = bcrypt($request->input('password'));
        // }else{
        //     return redirect('/user')->with('status', 'Password not match');
        // }
        $users->update();

        return redirect('/user')->with('status', 'Your Data is Updated');
    }
}
