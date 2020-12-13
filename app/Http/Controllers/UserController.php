<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index(Request $req)
    {
       $data = User::all();
       return view("users.index", compact("data"));
    }

    public function create(Request $req)
    {
        $roles = Role::all();
        return view("users.create", compact("roles"));
    }

    public function store(Request $req)
    {
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        $user->roles()->sync([$req->role]);
        return redirect('/user');
    }

    public function edit(Request $req, $id)
    {
       $user = User::find($id);
       $roles = Role::all();
       return view("users.edit", compact("user", "roles"));
    }

    public function update(Request $req, $id)
    {
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        $user->roles()->sync([$req->role]);
        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user)
         $user->delete();
        return redirect()->back();
        
    }   
}
