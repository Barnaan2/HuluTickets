
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets2/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets2/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets2/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets2/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets2/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets2/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets2/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets2/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{route('RegisterMe')}}"><img class="  " src="/assets/img/logowhite1.png " alt="logo"></a>
          <a class="sidebar-brand brand-logo-mini" href="{{route('RegisterMe')}}"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">

            <div class="profile-desc">

              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="/assets/img/logowhite1.png " alt="logo">
                  <span class="count bg-success"></span>
                </div>
                  <div class="profile-name">
   @if(Auth::user()->role == 1 )
                  <h5 class="mb-0 font-weight-normal">Super Admin</h5>
                    @elseif(Auth::user()->role ==2)
                          <h5 class="mb-0 font-weight-normal">Admin</h5>
                      @endif
                  <span>{{Auth::user()->name}}</span>
                </div>
              </div>

              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>

                </a>
              </div>
            </div>
          </li>
            @if(Auth::user()->role == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('ShowManageMovies')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Manage Movie</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('ShowManageCinemas')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Manage Cinema</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('ShowMovieShowStatus-SuperAdmin')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">See Movie show status</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('ShowCinemaRequests')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">See Cinema requests</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('ShowManageAdmins')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Manage Admins</span>
            </a>
          </li>
            @else
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('ShowManageMovie')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                        <span class="menu-title">Manage Movie</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('ShowManageCinema')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                        <span class="menu-title">Manage Cinema</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('ShowMovieShowStatus')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
                        <span class="menu-title">See Movie show status</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('ShowCinemaRequest')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
                        <span class="menu-title">See Cinema requests</span>
                    </a>
                </li>

            @endif
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
              </form>
          </li>

        </ul>
      </nav>


      @yield('Content')
      <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Hulu Tickets 2022</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets2/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets2/vendors/chart.js/Chart.min.js"></script>
    <script src="assets2/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets2/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets2/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets2/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets2/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets2/js/off-canvas.js"></script>
    <script src="assets2/js/hoverable-collapse.js"></script>
    <script src="assets2/js/misc.js"></script>
    <script src="assets2/js/settings.js"></script>
    <script src="assets2/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets2/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
