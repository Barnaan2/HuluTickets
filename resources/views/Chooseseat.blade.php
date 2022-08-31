@extends('layouts.secondBase')
@section('Content')

    <script>


        function paymodal(){
            const modaldisplay=document.querySelector('.payment-modal')

            modaldisplay.classList.remove('hidden')
        }
        function exitmodal(){
            const modaldisplay=document.querySelector('.payment-modal')

            modaldisplay.classList.add('hidden')
        }

    </script>


<div class="container">
    <div class="row">
        <div class="col-md-9 offset-md-1">

          <h4 class="text-center mb-3">Select your seat</h4>
           <div class="seat-info">
             <p>Reserved</p> <span class="Reserved seat"> </span>
              <p>Free</p> <span class="Free seat"> </span>
               <p>Selected</p> <span class="Selectedseat seat"> </span>
           </div>



    <form  class="pl-4 pb-3"action="/saveChoosed/{{$MS_id}}" method = "post" >
        @csrf

        <br>
        <div class="seat-check">
            @foreach($allSeats as $seat)
                @if(in_array($seat,$arrayOfSeats))
                    {{--  it will excute the following code if the seat is not reserved--}}
                    {{--        <p>the seat is not has been served </p>--}}

                    <input type="checkbox" id="r{{$seat}}" name="ChoosedSeats[]"  value="{{$seat}}"/>
                    <label class="checkbox-alias" for="r{{$seat}}"><p>{{$seat}}</p></label>

                @else
                    <input type="checkbox"  id="r{{$seat}}" name="ChoosedSeats[]"  value="{{$seat}}"></input>
                    <label class="checkbox-alias1" for="r{{$seat}}"><p>{{$seat}}</p></label>
                @endif
            @endforeach
        </div>
        <button class="btn btn-lg btn-primary right mb-2" onclick="paymodal()">Book</button>
        <br>

        <div class="payment-modal hidden">
            <div class="row">
                <div class="col-md-11 card-shadow">
                    <div class="card bg-dark">
                        <div class=" ">
                            <span onclick="exitmodal()" class="exit right  ">X</span>
                            <h4 class="card-title center">Hulu Tickets</h4>
                            <p class="card-description center">Movie name</p>

                        </div>

                        <div class="card-body ">
                            <div class="form-group ">
                                <div class ="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleCheck1">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " required name="Name" required>
                                    </div>


                                </div>
                                <div class ="form-group row ">
                                    <label class="col-form-label col-sm-3" for="exampleCheck1">Email Address</label>
                                  <div class="col-sm-9">
                                      <input type="email" class="form-control " name="Email_Address" required>
                                      <span class="focus-input100"></span>
                                  </div>


                                </div>
                                <div class ="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleCheck1">Phone Number</label>
                                   <div class="col-sm-9">

                                       <input type="phone" class="form-control " name="Email_Address" required>
                                       <span class="focus-input100"></span>
                                   </div>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-outline-success center" name="pay">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>


</div>




</div>
</div>







@endsection
