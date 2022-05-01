@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h6 class="text-dark mb-0">Select Movie to Show</h6>
                </div>
                <div class="row">

@foreach($movies as $movie)
                    <div class="col-md-3 col-lg-3 ">
                        <div class="card shadow  ">
                            <div class="card-body">
                                <div class=" align-items-center ">
                                    <div class="col ">
                                        <div class="poster-image">
                                            <a href="/selected.html">
                                                <img src="/{{$movie->Poster_Link}}">
                                            </a>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0">
                                            <p>{{$movie->Title}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
@endsection
