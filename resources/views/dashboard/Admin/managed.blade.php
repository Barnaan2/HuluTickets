@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
      <!-- partial -->
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
               <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin</h4>

                      <!-- Here is a selection form for cinema -->

                        <form method="POST" action="{{ route('AddAdmins') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text"   name='name' required>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3" for="email">{{ __('Email Address') }}</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3" for="password"> Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" required>
                                </div>
                            </div>






                            <button type="submit">
                                {{ __('Register') }}
                            </button>

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admins</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">

                              </div>
                            </th>
                            <th> Name </th>
                            <th> Username</th>
                            <th> Email</th>
                            <th> Admin Role</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>

                            <td> {{$user->name}}</td>
                            <td> {{$user->username}}</td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->role}}</td>
                            <td>
                            <a href="/admin/admins/{{$user->id}}/edit">
                            <div class="badge badge-outline-warning">
                             Edit
                               </div>
                              </a>

                            </td>
                            <td>
                            <a href="/delcin_adm/{{$user->id}}">
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
