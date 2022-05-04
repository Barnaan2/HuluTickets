@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_navbar.html -->

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Manage Movie</h3>

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
                                    <label for="mtitle" class="col-sm-3 form-label">Title</label>
                                    <input type="text" class="form-control col-sm-8" id="exampleInputUsername1" required
                                        placeholder="Username" name="Title">
                                </div>
                                <div class="form-group">
                                    <label for="Poster_Link class=">Poster</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Poster_Link" name="Poster"
                                                >

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mtitle" class="col-sm-3">Description</label>
                                    <textarea type="text" class="form-control col-sm-8" id="exampleInputUsername1"
                                        placeholder="Description" name="Description" required></textarea>
                                </div>

                                <div class="form-group row">
                                    <label for="mtite" class="col-sm-3 form-label">Release Date</label>
                                    <input type="date" class="form-control col-sm-8" id="exampleInputUsername1" required
                                        placeholder="Username" name="Release_Date">
                                </div>

                                <div class="form-group row">
                                    <label for="mtie" class="col-sm-3 form-label">Trailer Link</label>
                                    <input type="text" class="form-control col-sm-8" id="exampleInputUsername1" required
                                        placeholder="Username" name="Tailer_Link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile" class="align-top  col-form-label">Actors</label>
                                    <select class="selection-2 " name="Actor_id[]" tabindex="-1" required
                                        aria-hidden="true" required multiple>
                                        @foreach($actors as $actor)
                                        <option value="{{$actor->id}}">{{$actor->First_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group float-right">
                                    <label for="exampleInputMobile" class="align-top col-form-label">Crews</label>
                                    <select class="selection-2 " name="Crew_id[]" tabindex="-1" aria-hidden="true"
                                        required multiple>
                                        @foreach($crews as $crew)
                                        <option value="{{$crew->id}}">{{$crew->First_Name}}---{{$crew->Role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="focus-input100"></span>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
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
                                    <div class="form-group">
                                    <label for="exampleInputFile">Actor Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover" required name="Actor_Picture">

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
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 grid-margin stretch-card">
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
                                <div class="form-group">
                                    <label for="exampleInputFile">Crew Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover" required name="Crew_Picture">

                                        </div>

                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Movies</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">

                                                    </label>
                                                </div>
                                            </th>

                                            <th> Title</th>
                                            <th> Release Date </th>
                                            <th> Trailer Link</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($movies as $movie)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>

                                            <!-- <img src="../{{$movie->Poster_Link}}" alt="" /> -->

                                            <td> {{$movie->Title}} </td>
                                            <td> {{$movie->Release_Date}} </td>
                                            <td> {{$movie->Tailer_Link}} </td>


                                            <td> @foreach($actors as $actor)
                                                {{$movie->actors}}
                                                @endforeach </td>

                                            <td>
                                                <a href="{{route('EditMovie',$movie->id)}}">
                                                    <div class="badge badge-outline-warning">
                                                        Edit
                                                    </div>
                                                </a>

                                            </td>
                                            <td>

                                            <a href="{{route('DeleteMovie',$movie->id)}}">
                                                <div class="badge badge-outline-danger">Delete</div>
                                                </a>


                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Actors</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">

                                                    </label>
                                                </div>
                                            </th>
                                            <th> First Name </th>
                                            <th>Last name</th>
                                            <th> About </th>
                                            <th> Picture Link </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($actors as $actor)
                                        <!-- <img src="../{{$actor->Picture_Link}}" alt="" /> -->

                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>

                                            <td>{{$actor->First_Name}} </td>
                                            <td>{{$actor->Last_Name}} </td>
                                            <td>{{$actor->About}} </td>
                                            <td>{{$actor->Picture_Link}} </td>
                                            <td>

                                                <a href="{{route('EditActor',$actor->id)}}">
                                                    <div class="badge badge-outline-warning">
                                                        Edit
                                                    </div>
                                                </a>

                                            </td>
                                            <td>

                                            <a href="{{route('DeleteActor',$actor->id)}}">
                                                <div class="badge badge-outline-danger">Delete</div>
                                                </a>
                                            </td>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Crews</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">

                                                    </label>
                                                </div>
                                            </th>
                                            <th> First Name </th>
                                            <th>Last name</th>
                                            <th> About</th>
                                            <th> Role </th>
                                            <th> Picture Link </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($crews as $crew)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>

                                            <td>{{$crew->First_Name}} </td>
                                            <td>{{$crew->Last_Name}} </td>
                                            <td>{{$crew->About}} </td>
                                            <td>{{$crew->Role}} </td>
                                            <td>{{$crew->Picture_Link}} </td>
                                            <td>


                                                <a href="{{route('EditCrew',$crew->id)}}">
                                                    <div class="badge badge-outline-warning">Edit</div>
                                                </a>

                                            </td>
                                            <td>
                                            <a href="{{route('DeleteCrew',$crew->id)}}">
                                                <div class="badge badge-outline-danger">Delete</div>
                                                </a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @endsection
