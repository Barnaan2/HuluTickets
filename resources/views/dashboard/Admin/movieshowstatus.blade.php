@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Movie shows</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Movie Title </th>
                            <th> Cinema</th>
                            <th> Tickets Sold</th>
                            <th> Active </th>
                            <th> Show date </th>
                            <th></th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>

                            <td> Kalesh alew </td>
                            <td> Alem </td>
                            <td> 25 </td>
                            <td>yes</td>
                            <td>2015</td>

                            <td>
                              <div class="badge badge-outline-danger">Delete</div>

                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

                <div class="col-sm-4 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h5>Total Movie shows</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">$45850</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                          </div>
                          <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h5>Active Movie Shows</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">$2039</h2>
                            <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>
                          </div>
                          <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <h5>Movie shows today</h5>
                        <div class="row">
                          <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                              <h2 class="mb-0">$32123</h2>
                              <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                            <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                          </div>
                          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         @endsection
