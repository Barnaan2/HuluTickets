


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit-Movie </title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class=" navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

            <li class="nav-item d-none d-sm-inline-block">
                <a href="/home" class="nav-link">Home</a>
            </li>
        </ul>


    </nav>

    <img src="/{{$movie->Poster_Link}}" alt="">
    <p>{{$movie->Title}}</p>

    <p>{{$movie->Description}}</p>
    <p>{{$movie->Release_Date}}</p>
    <p>{{$movie->Tailer_Link}}</p>
    <p>@foreach($actorss as $actor)
        {{$actor->First_Name}} {{$actor->Last_Name}} - <a href=" {{route('DeleteActorFromMovie',[$actor->id,$movie->id])}}">Delete</a> <br>
    @endforeach
    </p>

    <p>@foreach($crewss as $crew)
        {{$crew->First_Name}} {{$crew->Last_Name}} - {{$crew->Role}} - <a href=" {{route('DeleteCrewFromMovie',[$crew->id,$movie->id])}}">Delete</a> <br>
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
                    <form method="POST" action="{{route('UpdateMovie',$movie->id)}}" enctype="multipart/form-data">
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

</body>
</html>
