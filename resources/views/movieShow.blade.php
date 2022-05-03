


@extends('layouts.secondBase')
@section('Content')

<div class="selected">

    <div class="container">
        <div class="intro">
            <h2 class=" text-light">{{$movie->Title}}</h2>
        </div>
        <div class="selected-movie ">

            <div class="selected-image ">
                <a href="#"><img src="/{{$movie->Poster_Link}}"></a>
            </div>
            <div class=" movie-shows  ">
<h3 class=" pl-lg-1 text-success">Choose Cinema and Date</h3>
                @foreach($movieshow as $cinemas)
                  <a href= "/test/{{$cinemas->id}}" >  <div class="movie-show bg-light">
                      <h2>   {{$cinemas->getCinema->Name}} </h2>
                       <h2>  {{$cinemas->getCinema->Address}}</h2>
                        <span> Date </span>{{$cinemas->getSchedule->Show_Date}} <span> Time </span>
                        {{$cinemas->getSchedule->Show_Time}}
                    </div>
            </a>
                @endforeach

            </div>
        </div>




        </div>



    </div>



</div>


</div>

@endsection




