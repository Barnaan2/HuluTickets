<?php

namespace App\Http\Controllers;

use App\Models\InterestedUser;
use Illuminate\Http\Request;

class InterestedUserController extends Controller
{ public function storeInterested(){
    return view('/work_with_us');
}
    public function storeInterestedUser(){
        $interested= request()->validate([
            'name'=> ['required', 'string', 'max:100'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:interested_users'],
            'phone'=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'=> ['required', 'string', 'max:255'],
            'cinema_name'=>['required', 'string', 'max:255'],
            'cinema_address'=>['required', 'string', 'max:255'],

        ]);


        InterestedUser::create([
            'name'=> $interested ['name'],
            'email'=> $interested ['email'],
            'phone'=> $interested ['phone'],
            'address'=> $interested ['address'],
            'cinema_name'=> $interested ['cinema_name'],
            'cinema_address'=> $interested ['cinema_address'],

        ]);
        return "Thankyou we will meet you soon";

    }
}
