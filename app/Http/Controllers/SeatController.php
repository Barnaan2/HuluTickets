<?php

namespace App\Http\Controllers;

use App\Models\Movieshow_seat;
use App\Models\MyCustomer;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //

    public function NewOne($id){
        $numberOfSeats =\App\Models\Movieshow::find($id)->getCinema->Number_Of_Seats;
        $MS_id = $id;
        $arrayOfSeats = SystemController::AssignSeat($numberOfSeats,$MS_id);
        $allSeats=SystemController::allseats($numberOfSeats);
        return view('Chooseseat',[
            'MS_id' => $MS_id,
            'allSeats'=> $allSeats,
            'arrayOfSeats'=> $arrayOfSeats]);
    }


//seat assign
    public function seatController($MS_id){

        $choosed = request('ChoosedSeats');
        $no_of_seat = count($choosed);
        $customer = MyCustomer::create(
            [ 'Name'=>request('Name'),
                'Email_Address' => request('Email_Address')
            ]);
        $customer->save();
        {foreach($choosed as $seat)
            $seat_in = Movieshow_seat::create([
                'Movieshow_id' => $MS_id,
                'Seat_id'     => $seat

            ]);
            $seat_in->save();
        }
        $Customer_id = Mycustomer::latest('created_at')->first()->id;
        $me = Movieshow_seat::latest('created_at')->paginate($no_of_seat);
        $Movieshow_seat_id= array();
        foreach($me as $m){
            array_push($Movieshow_seat_id, $m->id);
        }
//https://github.com/Barnaan2/HuluTickets.git
        return view('paymentMethod');
    }
}
