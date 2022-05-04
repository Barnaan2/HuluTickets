<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\ProfilePictures;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function createAdmin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ]);

        $role = 2;
        $Admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password)
        ]);
        $Admin->save();
        return redirect()->route('Home')->with('alert', 'You have added new Admin');


    }









    public function showManagesAdmin(){
        $users=User::where('role', 'Admin')->get();
        return view('dashboard.Admin.managed', compact('users'));
    }



    public function updateAdmins(User $user){
        $edited=request()->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
        ]);

        $user->update($edited);

        return redirect()->route('ShowManageAdmin');
    }

    public function editAdmins(User $user){


        return view('dashboard.Admin.admins.edit', compact('user'));
    }

}
