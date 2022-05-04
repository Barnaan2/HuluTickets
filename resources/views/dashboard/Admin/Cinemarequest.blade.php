@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                 <h3>Messages</h3>
                <div class="col-sm-4 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h5>Sender Name</h5>
                      <div class="row">
                        <div class="col-10 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex">
                            <h2 class="mb-0">message</h2>

                          </div>
                          <div class="badge badge-outline-primary right">Check</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New requests</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">

                              </div>
                            </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone Number</th>
                            <th> Address</th>
                            <th> Cinema Name </th>
                            <th> Cinema Address</th>
                            <th> Request Date </th>
                            <th></th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($interested_users as $interested_user)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>

                            <td> {{$interested_user->name}}</td>
                            <td> {{$interested_user->email}}</td>
                            <td> {{$interested_user->phone}}</td>
                            <td> {{$interested_user->address}}</td>
                            <td> {{$interested_user->cinema_name}}</td>
                            <td> {{$interested_user->cinema_address}}</td>
                            <td> {{$interested_user->created_at}}</td>
                            <td>
                              <div class="badge badge-outline-success">Checked</div>

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
