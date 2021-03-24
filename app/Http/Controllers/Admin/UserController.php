<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $selected_roles = $user->roles();
        $selected_roles = json_decode(json_encode($selected_roles),true);

        return view("admin.users.edit",compact('user','roles','selected_roles'));
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->syncRoles($request->role);
        return redirect(action('Admin\UserController@edit',$id))->with('status','Update success');
    }
}
