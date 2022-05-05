
@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Edit Crew</h3>

            </div>




    @if(session('alert'))
        <div class="alert alert-success">
            {{session('alert')}}
            @endif
            <div class="row">
                <div class="col-sm-5 ">
    <img src="/{{$movie->Poster_Link}}"   style="height: 245px; width:160px; " alt="">
    <p class=" text-light">{{$movie->Title}}</p>

    <p class=" text-light">{{$movie->Description}}</p>
    <p class=" text-light">{{$movie->Release_Date}}</p>
    <p class=" text-light">{{$movie->Tailer_Link}}</p>
                </div>
    <p>@foreach($actorss as $actor)
            @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
        {{$actor->First_Name}} {{$actor->Last_Name}} - <a href=" {{route('DeleteActorFromMovies',[$actor->id,$movie->id])}}">Delete</a> <br>
            @else
                {{$actor->First_Name}} {{$actor->Last_Name}} - <a href=" {{route('DeleteActorFromMovie',[$actor->id,$movie->id])}}">Delete</a> <br>
            @endif
    @endforeach
    </p>

    <p>@foreach($crewss as $crew)
            @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
        {{$crew->First_Name}} {{$crew->Last_Name}} - {{$crew->Role}} - <a href=" {{route('DeleteCrewFromMovies',[$crew->id,$movie->id])}}">Delete</a> <br>
            @else
                {{$crew->First_Name}} {{$crew->Last_Name}} - {{$crew->Role}} - <a href=" {{route('DeleteCrewFromMovie',[$crew->id,$movie->id])}}">Delete</a> <br>
                @endif
    @endforeach
    </p>

    <!-- partial -->
        <!-- partial -->
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Movie
                </div>

                <div class="card-body">
                    @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
                    <form method="POST" action="{{route('UpdateMovies',$movie->id)}}" enctype="multipart/form-data">
                        @else

                            <form method="POST" action="{{route('UpdateMovie',$movie->id)}}" enctype="multipart/form-data">
                            @endif
                        @csrf
                         @method('PATCH')
                        <div class="row mb-3">
                            <label for="Title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="Title" type="text" class="form-control @error('Title') is-invalid @enderror" name="Title" value="{{old('Title') ?? $movie->Title}}"  autocomplete="Title" autofocus>

                            @error('Title')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <textarea id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{old('Description') ?? $movie->Description}}"  autocomplete="Description" autofocus>{{old('Description') ?? $movie->Description}}</textarea>


                            @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Poster_Link" class="col-md-4 col-form-label text-md-end">Poster</label>

                            <div class="col-md-6">
                                <input id="Poster_Link" type="file" class="form-control @error('Poster_Link') is-invalid @enderror" name="Poster_Link" value="{{ $movie->Poster_Link ?? $movie->Poster_Link}}">{{ $movie->Poster_Link ?? $movie->Poster_Link}}
                                                       @error('Poster_Link')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Release_Date" class="col-md-4 col-form-label text-md-end">Release Date</label>

                            <div class="col-md-6">
                                <input id="Release_Date" type="date" class="form-control @error('Release_Date') is-invalid @enderror" name="Release_Date" value="{{ old('Release_Date') ?? $movie->Release_Date }}" autocomplete="Release_Date" autofocus>



                            @error('Release_Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Tailer_Link" class="col-md-4 col-form-label text-md-end">Trailer Link</label>

                            <div class="col-md-6">
                                <input id="Tailer_Link" type="text" class="form-control @error('Tailer_Link') is-invalid @enderror" name="Tailer_Link" value="{{ old('Tailer_Link') ?? $movie->Tailer_Link }}"  autocomplete="Tailer_Link" autofocus>


                            @error('Tailer_Link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-md-4 col-form-label text-md-end">Actors</label>

                            <div class="col-md-6">
                            <select class="selection-2 " name="Actor_id[]" tabindex="-1" required
                                        aria-hidden="true" required multiple>
                                        @foreach($actors as $actor)
                                        <option value="{{$actor->id}}">{{$actor->First_Name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-md-4 col-form-label text-md-end">Crews</label>

                            <div class="col-md-6">
                            <select class="selection-2 " name="Crew_id[]" tabindex="-1" aria-hidden="true" required multiple>
                                            @foreach($crews as $crew)
                                                <option value="{{$crew->id}}">{{$crew->First_Name}}---{{$crew->Role}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Movie
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
