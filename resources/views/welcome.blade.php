
@extends('layouts.Base')
@section('Content')
        <div class="container hero">
            <div class="row">
                <div class="col-md-8  offset-md-2">
                    <div class="carousel slide" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"><img src="assets/img/abc.jpg" alt="Slide Image"></div>
                            <div class="carousel-item"><img src="assets/img/bcd.jpg" alt="Slide Image"></div>
                            <div class="carousel-item"><img src="assets/img/cde.jpg" alt="Slide Image"></div>
                        </div>
                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                                    class="carousel-control-prev-icon"></span><span
                                    class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span
                                    class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            <li data-target="#carousel-1" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div id="sub-navigation">
        <ul>
            <li><a href="#">SHOW ALL</a></li>
            <li><a href="#">LATEST TRAILERS</a></li>
            <li><a href="#">TOP RATED</a></li>
            <li><a href="#">MOST COMMENTED</a></li>
        </ul>

    </div>
</div>
<div class="container">
    <div id="main">
        <div class="head">
            <h2>LATEST MOVIES</h2>
            <p class="text-right"><a href="#">See all</a></p>
        </div>

        <!-- box hundi category garaa garaa of jala qabata -->
        <div class="box">
            <!-- box kanaaf div class movie kana qabu fayyadami -->
            {{-- latests movies--}}
            @foreach($newrelease as $new)
            <div class="movie">
                <div class="movie-image"> <span class="play"><span class="name">SPIDER MAN 2</span></span>
                    <a href="/Check/{{$new->id}}"><img src="./{{$new->Poster_Link}}" alt="" /></a>
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
        {{-- movie by thier  something--}}
        <div class="head">
            <h2>LATEST TRAILERS</h2>
            <p class="text-right"><a href="#">See all</a></p>
        </div>
        <div class="box">
            @foreach($newrelease as $new)
                <div class="movie">
                    <div class="movie-image"> <span class="play"><span class="name">SPIDER MAN 2</span></span>
                        <a href="/Check/{{$new->id}}"><img src="./{{$new->Poster_Link}}" alt="" /></a>
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

{{--     movie by the rating     --}}
            </div>
            <div class="cl">&nbsp;</div>
        </div>
        <div class="head">
            <h2>TOP RATED</h2>

        </div>
        <div class="box">

            @foreach($newrelease as $new)
                <div class="movie">
                    <div class="movie-image"> <span class="play"><span class="name"></span></span>
                        <a href="/Check/{{$new->id}}"><img src="./{{$new->Poster_Link}}" alt="" /></a>
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
        </div>
<div class="cl">&nbsp;</div>
</div>

<div class="head">
    <h2>MOST COMMENTED</h2>

</div>
<div class="box">

    @foreach($newrelease as $new)
        <div class="movie">
            <div class="movie-image"> <span class="play"><span class="name"></span></span>
                <a href="/Check/{{$new->id}}"><img src="./{{$new->Poster_Link}}" alt="" /></a>
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
            <div class="cl">&nbsp;</div>
        </div>
    </div>
</div>

<div id="cinema">
    <div class="container">
        <div class="intro">
            <h2 class="">cinema </h2>

        </div>
        <div class="row cinemas">
            @foreach($cinemas as $cinema)
            <div class="col-md-3 col-sm-5 col-lg-3 item">

                <div class=" cinema">

                        <a class="cinema-name" href="/cinema/{{$cinema->id}}" ><h3 class="name">{{$cinema->Name}}</h3></a>

                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<div class="brands bg-light ">
    <a href="#"> <img src="assets/img/instacart.png"><img src="assets/img/kickstarter.png"><img src="assets/img/lyft.png"><img src="assets/img/shopify.png"><img src="assets/img/pinterest.png"><img src="assets/img/twitter.png"></a>
</div>
<footer>
    @endsection
