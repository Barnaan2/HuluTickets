@extends('layouts.secondBase')
@section('Content')

<div>
<form  class="pl-4 pb-3"action="/saveChoosed/{{$MS_id}}" method = "post" >
                                     @csrf
                        <span class="label-input100">Seat and Customer info</span>
       <br>
                                @foreach($arrayOfSeats as $seat)
                                    <input type="checkbox" name="ChoosedSeats[]" value="{{$seat}}">{{$seat}}</input>
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
