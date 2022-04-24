


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
                    <div class="movie-show bg-primary">
                      <h4>   {{$cinemas->getCinema->Name}} </h4>
                       <h4>  {{$cinemas->getCinema->Address}}</h4>
                        <span> day </span>{{$cinemas->getSchedule->Show_Date}} <span> ሰሃት </span>
                        {{$cinemas->getSchedule->Show_Time}}
                    </div>
                @endforeach

            </div>
        </div>




        </div>



    </div>



</div>


</div>

@endsection




