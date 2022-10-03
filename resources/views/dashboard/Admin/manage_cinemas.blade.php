@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Manage Cinema </h3>

            </div>
             <div class="row">
              <div class="col-lg-11 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cinema</h4>
                    <p class="card-description">Add the Cinema Here</p>
                      @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                          <form class="forms-sample" action="{{route('AddAdmins')}}" method="post" enctype="multipart/form-data">
                         @else
                    <form class="forms-sample" action="{{route('AddAdmin')}}" method="post" enctype="multipart/form-data">
                             @endif
                                   @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cinema name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Cinema name" required name="Name">
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
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Address" name="Address" required>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Number of seats</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="exampleInputMobile"  required placeholder="Number of seats" name="Number_Of_Seat">
                                            </div>

                                    </div>
                        <div class="form group row ">
                            <h6  class=" text-gray">Cinema Admin Info</h6>
                        </div>
{{--                                    <div class="form-group">--}}
{{--                                    <label for="ProfilePicture">Cinema Profile Picture</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input type="file" class="custom-file-input" id="ProfilePicture" required name="ProfilePicture">--}}

{{--                                        </div>--}}

{{--                                     </div>--}}
{{--                                     </div>--}}

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full name" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Here is a selection form for cinema -->

{{--                        <div class="form-group row">--}}
{{--                            <label for="username" class="col-sm-3 col-form-label">Username</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" autocomplete="username" autofocus>--}}
{{--                                @error('username')--}}
{{--                                <span class="invalid-feedback dan" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>

                            <div class="col-sm-9">


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">

                            </div>
                        </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>

                    </form>
                  </div>

                </div>
              </div>



            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cinema Admins</h4>
                    <div class="table-responsive" style="height:400px; overflow-y: scroll">
                      <table class="table">
                        <thead>
                          <tr>

                            <th> Name </th>
                            <th> Username</th>
                            <th> Email</th>
                            <th> Role </th>


                          </tr>
                        </thead>
                        <tbody>
                        @foreach($userscinema as $user)
                          <tr>

                            <td> {{$user->name}} </td>
                            <td> {{$user->username}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->role}} </td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
                                    <a href="{{route('EditAdmins',$user->id)}}">
                                @else
                            <a href="{{route('EditAdmin',$user->id)}}">
                                @endif
                            <div class="badge badge-outline-warning">
                             Edit
                               </div>
                              </a>

                            </td>
                            <td>
{{--the re must be some method to delete the cinema admin--}}
                                @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
                                    <a href="{{route('DeleteUsers',$user->id)}}">
                                        @else
                                            <a href="{{route('DeleteUser',$user->id)}}">
                                                @endif
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
                    <h4 class="card-title">Cinemas</h4>
                    <div class="table-responsive" style="height:400px; overflow-y: scroll">
                      <table class="table">
                        <thead>
                          <tr>

                            <th> Cinema Name </th>
                            <th> Address </th>
                            <th> Number of Seat </th>
                            <th> Administrator Name </th>


                          </tr>
                        </thead>
                        <tbody>
                        @foreach($cinemas as $cinema)
                            <tr>


                            <td> {{$cinema->Name}} </td>
                            <td> {{$cinema->Address}} </td>
                            <td> {{$cinema->Number_Of_Seats}} </td>
                            <td>  </td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role==1)
                            <a href="{{route('EditCinemas',$cinema->id)}}">
                                @else
                                    <a href="{{route('EditCinema',$cinema->id)}}">
                                        @endif
                            <div class="badge badge-outline-warning">
                             Edit
                               </div>
                              </a>
                              </td>
                              <td>
                                  @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
                              <a href="{{route('DeleteCinemas',$cinema->id)}}">
                                  @else
                                      <a href="{{route('DeleteCinema',$cinema->id)}}">
                                          @endif
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