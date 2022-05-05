@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
<!-- partial -->



    <!-- partial:../../partials/_navbar.html -->

    <!-- partial -->
    <div class="main-panel">
        @if(session('alert'))
            <div class="alert alert-success">
                {{session('alert')}}
            </div>
        @endif
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
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 1)



                                <form class="forms-sample" action="{{route('addMovies')}}" method="post" enctype="multipart/form-data">
                                    @else
                                        <form class="forms-sample" action="{{route('addMovie')}}" method="post" enctype="multipart/form-data">
                                            @endif
                                @csrf
                                <div class="form-group row">
                                    <label for="mtitlje" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="mtitle" required
                                               placeholder="Movie Title" name="Title">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="Poster_Link" class="col-sm-3 col-form-label">Poster</label>
                                    <div class="input-group col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Poster_Link" name="Poster"
                                                >

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mtitle" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control " id="exampleInputUsername1"
                                                  placeholder="Description" name="Description" required></textarea>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="mtite" class="col-sm-3 col-form-label">Release Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control col-sm-9" id="exampleInputUsername1" required
                                               placeholder="Username" name="Release_Date">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="mtie" class="col-sm-3 col-form-label">Trailer Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="exampleInputUsername1" required
                                               placeholder="Tailer_Link" name="Tailer_Link">
                                    </div>

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

                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Actor</h4>
                            <p class="card-description">Add the Actor here</p>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 1)



                            <form class="forms-sample" action="{{route('addActors')}}" method="post" enctype="multipart/form-data">
                              @else
                                    <form class="forms-sample" action="{{route('addActor')}}" method="post" enctype="multipart/form-data">
                                 @endif
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

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Crew</h4>
                            <p class="card-description">Add the Crew here</p>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 1)



                                <form class="forms-sample" action="{{route('addCrews')}}" method="post" enctype="multipart/form-data">
                                    @else
                                        <form class="forms-sample" action="{{route('addCrew')}}" method="post" enctype="multipart/form-data">
                                            @endif
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
                            <div class="table-responsive" style="height:400px; overflow-y: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>


                                            <th> Title</th>
                                            <th> Release Date </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($movies as $movie)
                                        <tr>


                                            <!-- <img src="../{{$movie->Poster_Link}}" alt="" /> -->

                                            <td> {{$movie->Title}} </td>
                                            <td> {{$movie->Release_Date}} </td>



                                            <td> @foreach($actors as $actor)
                                                {{$movie->actors}}
                                                @endforeach </td>

                                            <td>
                                                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)

                                                    <a href="{{route('EditMovies',$movie->id)}}">
                                                        <div class="badge badge-outline-warning">
                                                            Edit
                                                        </div>
                                                    </a>

                                            </td>
                                            <td>

                                                <a href="{{route('DeleteMovies',$movie->id)}}">

                                                    <div class="badge badge-outline-danger">Delete</div>
                                                </a>


                                            </td>
                                                    @else
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
                                            @endif
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
                            <div class="table-responsive" style="height:400px; overflow-y: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th> First Name </th>
                                            <th>Last name</th>
                                            <th> About </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($actors as $actor)
                                        <!-- <img src="../{{$actor->Picture_Link}}" alt="" /> -->

                                        <tr>


                                            <td>{{$actor->First_Name}} </td>
                                            <td>{{$actor->Last_Name}} </td>
                                            <td>{{$actor->About}} </td>

                                            <td>

                                                @if(\Illuminate\Support\Facades\Auth::user()->role ==1)


                                                    <a href="{{route('EditActors',$actor->id)}}">
                                                        <div class="badge badge-outline-warning">
                                                            Edit
                                                        </div>
                                                    </a>

                                            </td>
                                            <td>

                                                <a href="{{route('DeleteActors',$actor->id)}}">
                                                    <div class="badge badge-outline-danger">Delete</div>
                                                </a>
                                            </td>

                                            </td>




                                            @else

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

                                            @endif
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
                            <div class="table-responsive" style="height:400px; overflow-y: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th> First Name </th>
                                            <th>Last name</th>
                                            <th> About</th>
                                            <th> Role </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($crews as $crew)
                                        <tr>


                                            <td>{{$crew->First_Name}} </td>
                                            <td>{{$crew->Last_Name}} </td>
                                            <td>{{$crew->About}} </td>
                                            <td>{{$crew->Role}} </td>

                                           @if(\Illuminate\Support\Facades\Auth::user()->role ==1)



                                                <td>

                                                    <a href="{{route('EditCrews',$crew->id)}}">
                                                        <div class="badge badge-outline-warning">Edit</div>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{route('DeleteCrews',$crew->id)}}">
                                                        <div class="badge badge-outline-danger">Delete</div>
                                                    </a>

                                                </td>
                                            @else
                                                <td>

                                                    <a href="{{route('EditCrew',$crew->id)}}">
                                                        <div class="badge badge-outline-warning">Edit</div>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{route('DeleteCrew',$crew->id)}}">
                                                        <div class="badge badge-outline-danger">Delete</div>
                                                    </a>
                  @endif
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
