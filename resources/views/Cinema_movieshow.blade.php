@extends('layouts.secondBase')
@section('Content')
<div>

{{--    @foreach($movieshow as $new)--}}
{{--        <div class="movie">--}}
{{--            <div class="movie-image"> <span class="play"><span class="name"></span></span>--}}
{{--                <a href="/Check/{{$new->getMovie->id}}"><img src="/{{$new->getMovie->Poster_Link}}" alt="" /></a>--}}
{{--            </div>--}}
{{--            <div class="rating">--}}
{{--                <p>RATING</p>--}}
{{--                <div class="stars">--}}
{{--                    <div class="stars-in"> </div>--}}
{{--                </div>--}}
{{--                <span class="comments">12</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}


            <div class="container">
                <div id="main">
                    <div class="head mb-2">

                        <h3>{{$cinemaName}}</h3>
                    </div>
                    <div class="box">
                        @foreach($movieshow as $new)
                            <div class="movie">

                                <a href="/Check/{{$new->getMovie->id}}"><img src="/{{$new->getMovie->Poster_Link}}" alt="" /></a>
                                <div class="moviedesc">
                                    <p>{{$new->Description}}</p>
                                </div>
                            </div>
                        @endforeach

                        {{--     movie by the rating     --}}
                    </div>
            </div>


</div>

@endsection
