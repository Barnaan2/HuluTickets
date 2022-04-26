@extends('layouts.secondBase')
@section('Content')
<div>

    @foreach($movieshow as $new)
        <div class="movie">
            <div class="movie-image"> <span class="play"><span class="name"></span></span>
                <a href="/Check/{{$new->getMovie->id}}"><img src="/{{$new->getMovie->Poster_Link}}" alt="" /></a>
            </div>
            <div class="rating">
                <p>RATING</p>
                <div class="stars">
                    <div class="stars-in"> </div>
                </div>
                <span class="comments">12</span>
            </div>
        </div>
    @endforeach

</div>

@endsection
