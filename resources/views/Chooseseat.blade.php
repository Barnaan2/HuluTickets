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
            <div class="card">
                <div class="card-body"><span onclick="exitmodal()" class="exit right  ">X</span>
                    <h4 class="card-title">Hulu Tickets</h4>
                    <p class="card-description">Movie name</p>

                    <div class="form-group ">
                            <div class ="form-group ">
                                <label class="form-check-label" for="exampleCheck1">Name</label>
                                <input type="text" required name="Name" required>
                                <span class="focus-input100"></span>
                            </div>
                            <div class ="form-group ">
                                <label class="form-check-label" for="exampleCheck1">Email Address</label>
                                <input type="email" name="Email_Address" required>
                                <span class="focus-input100"></span>
                            </div>
                        <div class ="form-group">
                            <label class="form-check-label" for="exampleCheck1">Phone Number</label>
                            <input type="phone" name="Email_Address" required>
                            <span class="focus-input100"></span>
                        </div>



                    </div>
         <input type="submit" name="pay">
                </div>
            </div>
        </div>
    </form>


</div>




</div>
</div>







@endsection
