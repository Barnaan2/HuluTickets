<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cinema </title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.app')

@section('content')

<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class=" navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.html" class="nav-link">Home</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="cinowner.html" class="nav-link">Add Movie</a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->

        </ul>
    </nav>

    <!-- partial -->
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">




                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Movie</h4>
                                <p class="card-description">Add the movie here</p>
                                <form class="forms-sample " action="/" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="mtitle" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control col-sm-8" id="mtitle" style="color:white" required placeholder="Movie Title" name="Title">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-3 ">Poster</label>
                                        <div class="input-group col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cover" name="Poster" required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text ">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mtitle" class="col-sm-3">Description</label>
                                        <textarea type="text" class="form-control col-sm-8" id="exampleInputUsername1" placeholder="Description" name="Description" required></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mtite" class="col-sm-3 form-label">Release Date</label>
                                        <input type="date" class="form-control col-sm-8" id="exampleInputUsername1"  required placeholder="Username" name="Release_Date">
                                    </div>
                                    <div class="form-group row">
                                        <label for="mtie" class="col-sm-3 form-label">Trailer Link</label>
                                        <input type="text" class="form-control col-sm-8" id="exampleInputUsername1"  required placeholder="Username" name="Tailer_Link">
                                    </div>
                                    <div class="d-flex  justify-content-space-between">
                                    <div class ="form-group">
                                        <label for="exampleInputMobile" class="align-top  col-form-label">Actors</label>
                                        <select class="selection-2 " name="Actor_id[]" tabindex="-1"  required aria-hidden="true" required multiple>
                                            @foreach($actors as $actor)
                                                <option value="{{$actor->id}}">{{$actor->First_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class ="form-group float-right">
                                        <label for="exampleInputMobile" class="align-top col-form-label">Crews</label>
                                        <select class="selection-2 " name="Crew_id[]" tabindex="-1" aria-hidden="true" required multiple>
                                            @foreach($crews as $crew)
                                                <option value="{{$crew->id}}">{{$crew->First_Name}}---{{$crew->Role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <span class="focus-input100"></span>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Cinema</h4>
                                <p class="card-description">Add the Cinema Here</p>
                                <form class="forms-sample" action="/newCinema" method="post" >
                                   @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cinema name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputUsername2" placeholder="cname" required name="Name">
                                        </div>
                                    </div>
                                    <!-- Here is a selection form for cinema -->
                                    <div class ="form-group">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">City</label>
                                        <select class="selection-2 " name="City_id" tabindex="-1" aria-hidden="true" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="addess" name="Address" required>

                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Number of seats</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="exampleInputMobile"  required placeholder="seat exists in your cinema" name="Number_Of_Seat">
                                            </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Actor</h4>
                                <p class="card-description">Add the Actor here</p>
                                <form class="forms-sample" action="/AddActor" method="post" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Firstname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputUsername2" required placeholder="fname" name="First_Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label" >Lastname</label>
                                        <div class="col-sm-9">
                                            <input type="text" required class="form-control" id="exampleInputEmail2" placeholder="lname" name="Last_Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-3 col-form-label">Actor Picture</label>
                                        <div class="input-group col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cover" required name="Actor_Picture">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text ">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">About</label>
                                        <div class="col-sm-9">
                                            <input type="text" required class="form-control" id="exampleInputMobile" placeholder="About" name="About">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Crew</h4>
                                <p class="card-description">Add the Crew here</p>
                                <form class="forms-sample" action="/add" enctype="multipart/form-data" method="post">
                                   @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">First name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" required id="exampleInputUsername2" placeholder="firstname" name="First_Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Last name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" required id="exampleInputEmail2" placeholder="lastname" name="Last_Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">About</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="exampleInputMobile" placeholder="About crew" required name="About"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label" required>Role</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputPassword2" required placeholder="Actor role" name="Role">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-3">Poster</label>
                                        <div class="input-group col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="cover" required name="Crew_Picture">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text ">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Yaa'ii team©  2022</span>
                    @endsection
                </div>
            </footer>
</body>
</html>
