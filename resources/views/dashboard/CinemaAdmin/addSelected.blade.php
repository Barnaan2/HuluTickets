@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
    <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card shadow  ">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6 col-lg-5 ">
                                    <div class=" align-items-center ">
                                        <div class="col ">
                                            <div class="poster-image" Style="width: fit-content">
                                                <a href="/selected.html">
                                                    <img src="/{{$Movie->Poster_Link}}" style="width:100%"  alt="poster">
                                                </a>
                                            </div>
                                            <div class="text-dark font-weight-bold h5 ">
                                                <h3>{{$Movie->Title}}</h3>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-5 ">


                                    <div class=" mt-4 ">
                                        <div class="card-header">
                                            <h6 class="card-title">Select Schedule</h6>
                                        </div>


                                        <form class="pl-4 pb-3 mt-2" action="{{route('addSelect',$id)}}" method="post">
                                            @csrf
                                            <div class="form-group ">
                                                <label class="form-check-label " for="exampleCheck1">Show Time</label>
                                                <input type="time"   required name="Show_time">
                                                <span class="focus-input100"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleCheck1">Show Date</label>
                                                <input type="date" name="Show_date" required>
                                                <span class="focus-input100"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleCheck1" required>Price of 1 ticket</label>
                                                <input type="number" name="Price" min="20" max="200">
                                                <!-- /.card-body -->
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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
