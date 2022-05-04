<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\CinemaAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CinemaController extends Controller
{
    //
    public function addCinema(){

        $cinema = Cinema::create([
            'Name' => request('Name'),
            'Address'=> request('Address'),
            'Number_Of_Seats' => request('Number_Of_Seat'),
            'City_id'=>request('City_id')
        ]);
        $cinema->save();
        return redirect('/');
    }

    public function addAdmnistrators(){
        $admin= request()->validate([
            'Name'=>['required', 'string', 'max:100'],
            'Address'=>['required'],
            'Number_Of_Seats' => ['required'],
            'City_id'=> ['required'],
            'name'=> ['required', 'string', 'max:100'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:interested_users'],
            'password'=> ['required', 'string', 'max:255'],
        ]);
        $cinema = Cinema::create([
            'Name' =>  $admin ['Name'],
            'Address'=>  $admin ['Address'],
            'Number_Of_Seat' =>  $admin ['Number_Of_Seats'],
            'City_id'=> $admin ['City_id']
        ]);
        $cinema->save();





        $role = 3;
       $user = User::create([
            'name'=> $admin ['name'],
            'username'=> $admin ['username'],
            'email'=> $admin ['email'],
            'role'=> $role,
            'password'=>  Hash::make($admin ['password']),
        ]);
$user->save();




        $User_id =User::latest('created_at')->first()->id;
        $Cinema_id =Cinema::latest('created_at')->first()->id;
        $CinemaAdmin = CinemaAdmin::create([
            'Cinema_id' => $Cinema_id,
            'User_id' =>$User_id
        ]);
        $CinemaAdmin->save();







        return redirect()->route('Home')->with('alert','You have sucessfully added new cinema and its Admin');
    }
}
