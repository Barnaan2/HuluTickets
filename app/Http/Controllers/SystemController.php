<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use App\Models\MyCustomer;
use App\Models\Seat;
use App\Models\MovieShow;
use App\Models\Schedule;
use App\Models\Movieshow_seat;
use App\Models\CustomerSeat_in_Movieshow;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class SystemController extends Controller
{
// public function seeder(){
//     for ($i = 1; $i <= 50; $i++)
//   { $seats = Seat::create([
//         'Seat_Number'=> $i
//     ]);
//     $seats->save();
// }
// return 'done';
// }
public function Customer_seat($Customer_id,$Movieshow_seat_id){
    foreach($Movieshow_seat_id as $id)
{
   $customerseat = CustomerSeat_in_Movieshow::create([
        'Mycustomer_id'=>$Customer_id,
        'Movieshow_seat_id' =>$id

    ]);
$customerseat->save();
}

 return CustomerSeat_in_Movieshow::all();






}


    //assign seat
    public function AssignSeat($number,$MS_id){
    $arrayofseats = array();
        // $seats = Seat::all();

                 for ($i = 1; $i <= $number; $i++) {
                array_push($arrayofseats, $i);
       }
        $reserved = SystemController::findReserved($MS_id);
    $avilable = array_diff($arrayofseats,$reserved);
return $avilable;

    }

//method to find the reserved seats
public function findReserved($MS_id)
{
    $Movieshows = Movieshow::find($MS_id);
  $seats= $Movieshows ->getSeatNumber;

    if(count($seats) == 0)
    {
   $reserved = [];
return $reserved;
    }

    else
   {

    $reserved = array();
    foreach($seats as $seat){
        $seat_no = $seat->Seat_Number ;
        array_push($reserved,$seat_no);
     }
    return $reserved;
}
 }



// Counts all Element
public function Count($Array)
{
    return $Array->count();
}


//set sechedule
public function schedule($date,$time){
    $newschedule = Schedule::create([
            'Show_Date'=>$date,
            'Show_Time'=>$time
        ]);

    $newschedule->save();
    return Count(Actor::all())+1;
}


//find  and pass the latest cover links not [[poster link]]
public function summer($summers){
  $new = array();
  foreach($summers as $summer) {
      array_push($new, $summer->Poster_Link);
  }
      return $new;
  }
//calculate the total price of the customer
public function totalPrice($id,$numberOfSeat,$taxByPercent){
  $price  =  MovieShow::find($id)->price;
 $total =  $price*$numberOfSeat;
 $tax = $total * $taxByPercent;
 $price =  $total - $tax;
 return $price;
}
public function generatePaymentKey($totalPrice){
  // i dont know for example reason;
    // the generated key must somehow be dependent on the $total price
    $key = rand(2,10) + $totalPrice;
    return $key;
}
public function isPaid($generated)
{
    // we must have some way to check the message from the bank
    $messagekey='dl';
    if ($messagekey === $generated) {
        return true;
    }
    else {
        return false;
    }
}

public function genateCupon($numberSeat){
       $coupon = array();
       for($index=0; $index < $numberSeat;$index ++)
       {

           array_push($coupon,$index);

       }
      return $coupon;
    }




//
// Route::get('/softdelete',function(){
//     Stock::findOrFail(1)->delete();
//  Route::get('/getDeleted',function(){
//     // to get all data in the table including those that are trashed
//     $data = Stock::withTrashed()->get();});
//     // to get only the trashed or in our case those movies schedule which is expired;
//     // $data = Stock::onlyTrashed()->get();
//   foreach($data as $a)  {
//       return $a;

// $dateStr = '03-27-2015';
// max="<?php echo date("Y-m-d");
// $dateArray = date_parse_from_format('m-d-Y', $dateStr);
//     <input type="date" value="<?php echo date("Y-m-d");
//
// // //     }
// // // });

//method to check time for specific seat number is expired
//
//public function checkExpiredSeat($id){
//          $cust = MyCustomer::find($id);
//        $split = date_parse($cust->created_at);
////        $current = date_parse($);
//    $date = date_create();
//    $current = date_parse(date_diff($date,$cust->created_at));
//
//    if (1==2) {
//        // sent him his coupon related to his seat no
//        // pass his information  to the to customer table and delete him
//        // from mycustomer table and CustomerSeat_in_Movieshow table;
//        SystemController::deleter($id);
//        $disqualified = MyCustomer::find($id);
//        $disqualified->delete();
//        $disqualified->save();
//
//    }
//    else {
//        deleter($id);
//        $customer = MyCustomer::find($id);
//        $seatsforCustomer = $customer->getMoiveshow_seat;
//        foreach ($seatsforCustomer as $seat) {
////    $seat_in_id = $one->seat_in_id
//            $seat->delete();
//            $seat->save();
////array_push = ('$array',$seat_in_id);
//        }
//        $disqualified = MyCustomer::find($id);
//        $disqualified->delete();
//        $disqualified->save();
//    }
//}
//
////to delete the relation between movie show and customer
//public function deleter($id){
//    $seatOfCustomer = CustomerSeat_in_Movieshow::where('Mycustomer_id', $id)->get();
//    foreach ($seatOfCustomer as $element) {
//        $element->delete();
//        $element->save();
//    }
//
//
//}
//
//
//
//
//
//// the method that check the weather the time of specific show is expired or not
//public function checkExpiredMovieshow($MovieShows){
// $current_date = date();
//  $current_time = time();
//    $current_date_array = date_parse_from_format('m-d-y',$current_date);
//     $current_time_array = time_parse_from_format('h-m-s',$current_time);
//
//
//foreach($movieShows as $element)
//{
//  $Date = $element->getSchedule->Show_Date;
//   $set_date_array = date_parse_from_format('m-d-y',$Date);
//      if($current_date == $Date){
//             if($set_date_array['month'] == $current_date_array['month']){
//                   $time = $element->getSchedule->Show_Time;
//                     $set_time_array = time_parse_from_format('h-m-s',time);
//                       if($set_time_array['hour'] == $current_time_array['hour']){
//                             if($set_time['minute'] == $current_time['minute'] - 20)
//                                {
//                                    $element->delete();
//
//
//                    }
//                }
//            }
//        }
//    }
//}
}
