@extends('layouts.secondBase')
@section('Content')

<div>
<form  class="pl-4 pb-3"action="/saveChoosed/{{$MS_id}}" method = "post" >
                                     @csrf
                        <span class="label-input100">Seat and Customer info</span>
                        <div class ="form-group">
                            <select class="selection-2 select2-hidden-accessible" name="ChoosedSeats[]" tabindex="-1"  required aria-hidden="true" multiple>
                                @foreach($arrayOfSeats as $seat)
                                    <option value="{{$seat}}" >{{$seat}}</option>
                                @endforeach
                            </select><span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" style="width: 80.7833px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-budget-yv-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                       
                        <div class ="form-group">
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