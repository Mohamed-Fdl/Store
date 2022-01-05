<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
        $validated['password']=password_hash($validated['password'],PASSWORD_BCRYPT);
        Admin::create($validated);
        $request->session()->flash('success', 'Admin \''.$validated['username'].'\' sucessfully added!');
        return back();
    }

    public function login(Request $request)
    {
        $username=$request->username;
        $admin=Admin::where('username',$username)->first();
        if(empty($admin))
        {
            $request->session()->flash('error', 'Incorrect username or password !');
            return back();
        }
        $user_password=$admin->password;
        $password=$request->password;
        if(password_verify($password, $user_password))
        {
            $request->session()->put('connect', true);
            return view('admin.admin_base');
        }
        else
        {
            $request->session()->flash('error', 'Incorrect username or password!');
            return back();
        }

    }
}
