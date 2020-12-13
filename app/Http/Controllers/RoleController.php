<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    public function index(Request $req)
    {
        $data = Role::all();
        return view("role.index", compact("data"));
    }

    public function create(Request $req)
    {
        $permissions = Permission::all();
        return view("role.create", compact("permissions"));
    }


    public function store(Request $req)
    {
       $role = new Role();
       $role->name = $req->name;
       $role->display_name = $req->display_name;
       $role->description = $req->description;
       $role->save();
       $role->permissions()->sync($req->permissions??[]);
       return redirect('role');
    }

    public function edit(Request $req, $id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view("role.edit", compact("permissions", "role"));
    }

    public function update(Request $req, $id)
    {
        $role = Role::find($id);
        $role->name = $req->name;
        $role->display_name = $req->display_name;
        $role->description = $req->description;
        $role->save();
        $role->permissions()->sync($req->permissions??[]);
        return redirect('role');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if($role)
            $role->delete();
        return redirect()->back();
    }
}
