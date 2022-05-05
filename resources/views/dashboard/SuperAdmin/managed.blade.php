@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')


    @if(session('alert'))
        <div class="alert alert-success">
            {{session('alert')}}
            @endif
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
               <h3 class="page-title"> Manage Admin</h3>

               </div>
             <div class="row">
               <div class="col-lg-11 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin</h4>
                    <p class="card-description">Add  Admin Here</p>

                      <form method="POST" action="{{ route('AddAdmins') }}">
                          @csrf

                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control"    name='name' required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3" for="email">{{ __('Email Address') }}</label>
                              <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" required >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label  class="col-sm-3" for="password"> Password</label>
                              <div class="col-sm-9">
                                  <input type="password"  class="form-control"  name="password" required>
                              </div>
                          </div>
                          <button class="btn btn-outline-light" type="submit">
                              {{ __('Register') }}
                          </button>
                      </form>
                  </div>
                </div>
               </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admins</h4>
                    <div class="table-responsive" style="height:400px; overflow-y: scroll">
                      <table class="table">
                        <thead>
                          <tr>

                            <th> Name </th>
                            <th> Username</th>
                            <th> Email</th>
                            <th> Admin Role</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>


                            <td> {{$user->name}}</td>
                            <td> {{$user->username}}</td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->role}}</td>
                            <td>

                              @if(\Illuminate\Support\Facades\Auth::user()->role==1)

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
                                @if(\Illuminate\Support\Facades\Auth::user()->role==1)
                                <a href="{{route('DeleteUsers',$user->id)}}">
                                    @else
                                        <a href="{{route('DeleteUsers',$user->id)}}">
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
