@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
    <!-- partial -->
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Edit Admins</h3>

            </div>
            <div class="row ">
                <div class="col-md-9">
                    <div class="card">


                        <div class="card-body">
                            @if(\Illuminate\Support\Facades\Auth::user()->role ==1)
                                <form method="POST" action="{{route('UpdateAdmins',$user->id)}}" >
                                    @else
                                        <form method="POST" action="{{route('UpdateAdmin',$user->id)}}" >
                                            @endif
                                            @csrf
                                            @method('PATCH')
                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">Full Name</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $user->name}}"  autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username') ?? $user->username}}"  autocomplete="username" autofocus>


                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}"  autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="role" class="col-md-4 col-form-label text-md-end">Admin Role</label>

                                                <div class="col-md-6">
                                                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') ?? $user->role }}"  autocomplete="role">

                                                    @error('role')
                                                    <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save Admin
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </form>
                    </div>
                   </div>
                    </div>
            </div>
                </div>
            </div>
   </div>
    </div>



@endsection
