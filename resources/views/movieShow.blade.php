


@extends('layouts.secondBase')
@section('Content')

<div class="selected">

    <div class="container">
        <div class="intro">
            <h2 class="">{{$movie->Title}}</h2>
        </div>
        <div class="selected-movie ">

            <div class="selected-image ">
                <a href="#"><img src="/{{$movie->Poster_Link}}"></a>
            </div>
            <div class=" movie-shows mt-3 ">
                @foreach($movieshow as $cinemas)
                  <a href= "/test/{{$cinemas->id}}" target= "blank" >  <div class="movie-show bg-light">
                      <h4>   {{$cinemas->getCinema->Name}} </h4>
                       <h4>  {{$cinemas->getCinema->Address}}</h4>
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




