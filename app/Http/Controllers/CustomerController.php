<?php

namespace App\Http\Controllers;

use App\Models\MovieShow;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // for new customer  ............coming soon
    public  function addCustomer()
    {
        $newCustomer=\App\Models\Customer::create([
            'First_Name'=>request('First_Name'),
            'Last_Name'=>request('Last_Name'),
            'Phone_Number'=>request('Phone_Number'),
            'Coupon_Number'=>request(''),
            'Number_Of_Ticket'=>request('Number_Of_Ticket')
        ]);
        $newCustomer->save();
        return view('AddMovie');
    }


// customer information
    public function Customers(){
        $Customers = MovieShow::find(1);
        $Customer = $Customers->getCustomer;
        foreach ($Customer as $king){
        echo $king->First_Name.' <br>';
        }
   }

}
