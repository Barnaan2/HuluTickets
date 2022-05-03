@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
    @if(session('alert'))
        <div class="alert alert-success">
            {{session('alert')}}
        </div>
    @endif
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Account setting</h3>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">

                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="/{{$profile}}" width="160" height="160">
                              <form method="post" action = "{{route('profilePicture')}}" enctype="multipart/form-data">
                                 @csrf
                                  <input type="file"  class="" name = "profilePicture" required>
                                  <div class="mb-3"><button class="btn float-left btn-primary btn-sm mt-1 " type="submit">Change
                                          Profile Picture</button></div>
                              </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Change Password</p>

                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Current
                                                                    Password</strong></label><input class="form-control" type="text" placeholder="user.name" name="username">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>New
                                                                    Password</strong></label><input class="form-control" type="text" placeholder="John" name="first_name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Confirm
                                                                    Password</strong></label><input class="form-control" type="text" placeholder="John" name="first_name"></div>
                                                    </div>


                                                </div>


                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card shadow mb-5 col-lg-6">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Message</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action = "{{route('Message')}}">
                                        @csrf
                                        <div class="form-group"><label for="signature"><strong>Message</strong><br></label>
{{--<textarea class="form-control" rows="4" name="signature"></textarea>--}}
                                            <input type="text" name="Message" required>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Send
                                                Message</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
@endsection
