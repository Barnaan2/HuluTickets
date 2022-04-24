<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use App\Models\MovieShow;
use App\Models\Schedule;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class SystemController extends Controller
{

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

// the method that check the weather the time of specific show is expired or not
public function checkExpired($MovieShows){
 $current_date = date();
  $current_time = time();
    $current_date_array = date_parse_from_format('m-d-y',$current_date);
     $current_time_array = time_parse_from_format('h-m-s',$current_time);


foreach($movieShows as $element)
{
  $Date = $element->getSchedule->Show_Date;
   $set_date_array = date_parse_from_format('m-d-y',$Date);
      if($current_date == $Date){
             if($set_date_array['month'] == $current_date_array['month']){
                   $time = $element->getSchedule->Show_Time;
                     $set_time_array = time_parse_from_format('h-m-s',time);
                       if($set_time_array['hour'] == $current_time_array['hour']){
                             if($set_time['minute'] == $current_time['minute'] - 20)
                                { // if all of the above conditions are satisfied,
                                  // the schedule will $be deactivated
                                       $element->delete();


                    }
                }
            }
        }
    }
}
}
