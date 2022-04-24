
@extends('layouts.secondBase')
@section('Content')



    <div class="container">

        <div class="selected-movie ">

            <div class="selected-image ">
                <a href="#"><img src="/{{$movie->Poster_Link}}"></a>
            </div>


            <div class=" trailer  ">
              <iframe width="450" height="325" src="{{$movie->Tailer_Link}}" frameborder="0"></iframe>
            </div>

        </div>

        <div class="selected-about">
            <div class="selected-desc">
                <h3>{{$movie->Title}}</h3>
                <p>{{$movie->Description}}</p>
            </div>

            <div class="bookbtn  d-flex">
                <a href="/Book/{{$movie->id}}" > <button class="btn btn-danger btn-lg ">Book</button></a>
            </div>
        </div>



     <div class="selected-about">



         <div class="selected-actors">
             <p class="align-left">Actors</p>
             @foreach($actors as $actor)
                 <div class="actor">
                     <img src="/{{$actor->Picture_Link}}" alt="">
                     <p>  {{$actor->First_Name}} </p>


                 </div>
             @endforeach

         </div>
         <p class="align-right">Crew</p>
         <div class="selected-actors">
{{--  crew--}}
             @foreach($crews as $crew)
                 <div class="actor">
                     <img src="/{{$crew->Picture_Link}}" alt="">
                     <p>  {{$crew->First_Name}} </p>
                     <p>{{$crew->Role}}</p>


                 </div>
             @endforeach

         </div>

     </div>



    </div>


</div>

@endsection

