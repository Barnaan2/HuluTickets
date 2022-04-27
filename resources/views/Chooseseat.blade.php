@extends('layouts.secondBase')
@section('Content')

<div>
<form  class="pl-4 pb-3"action="/saveChoosed/{{$MS_id}}" method = "post" >
                                     @csrf
                        <span class="label-input100">Seat and Customer info</span>
       <br>
{{--    in_array($seat,the array)--}}

                                @foreach($allSeats as $seat)
                                    @if(in_array($seat,$arrayOfSeats))
            {{--  it will excute the following code if the seat is not reserved--}}
        <p>the seat is not has been served </p>
                                    <input type="checkbox" name="ChoosedSeats[]" value="{{$seat}}">{{$seat}}</input>

                               @else
            <p> the seat have been reserved </p>
            {{-- this will be excuted if the seat is reserved--}}
                                        @endif
                                @endforeach
                              <br>
                            <label class="form-check-label" for="exampleCheck1">Name</label>
                            <input type="text" required name="Name">

                            <span class="focus-input100"></span>
                        </div>
                        <div class ="form-group">
                            <label class="form-check-label" for="exampleCheck1">Email Address</label>
                            <input type="email" name="Email_Address" required>
                            <span class="focus-input100"></span>
                        </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                    </form>




</div>














@endsection
