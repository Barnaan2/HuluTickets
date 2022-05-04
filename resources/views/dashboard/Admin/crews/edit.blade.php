


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit-crew </title>
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

    <div>
 <img src="/{{$crew->Picture_Link}}" alt="">
 <p>{{$crew->First_Name}}  {{$crew->Last_Name}}</p>
  <p>{{$crew->About}}</p>
  <p>{{$crew->Role}}</p>
    </div>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Crew
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('UpdateCrew',$crew->id)}}" enctype="multipart/form-data">
                        @csrf
                         @method('PATCH')
                        <div class="row mb-3">
                            <label for="First_Name" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="First_Name" type="text" class="form-control @error('First_Name') is-invalid @enderror" name="First_Name" value="{{old('First_Name') ?? $crew->First_Name}}"  autocomplete="First_Name" autofocus>



                            @error('First_Name')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Last_Name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="Last_Name" type="text" class="form-control @error('Last_Name') is-invalid @enderror" name="Last_Name" value="{{old('Last_Name') ?? $crew->Last_Name}}"  autocomplete="Last_Name" autofocus>


                            @error('Last_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="About" class="col-md-4 col-form-label text-md-end">About Crew</label>

                            <div class="col-md-6">
                                <input id="About" type="text" class="form-control @error('About') is-invalid @enderror" name="About" value="{{ old('About') ?? $crew->About }}"  autocomplete="About">

                            @error('About')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Picture_Link" class="col-md-4 col-form-label text-md-end">Crew Image</label>

                            <div class="col-md-6">
                                <input id="Picture_Link" type="file" class="form-control @error('Picture_Link') is-invalid @enderror" name="Picture_Link" value="{{ old('Picture_Link') ?? $crew->Picture_Link }}" autocomplete="Picture_Link" autofocus>
                            @error('Picture_Link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Role" class="col-md-4 col-form-label text-md-end">Crew Role</label>

                            <div class="col-md-6">
                                <input id="Role" type="text" class="form-control @error('Role') is-invalid @enderror" name="Role" value="{{ old('Role') ?? $crew->Role }}"  autocomplete="Role">

                            @error('Role')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                          <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Crew
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
