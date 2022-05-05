@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Edit Actor</h3>

            </div>
            <div class="row">
<div class="col-sm-3 ">
    <img src="/{{$actor->Picture_Link}}"  style="height: 200px; width:200px; border-radius: 50%" alt="">
    <p> {{$actor->First_Name}} {{$actor->Last_Name}} </p>
    <p>{{$actor->About}}</p>
</div>

    </div>

        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Actor
                </div>

                <div class="card-body">
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                        <form method="POST" action=" {{route('UpdateActors', $actor->id)}}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action=" {{route('UpdateActor', $actor->id)}}" enctype="multipart/form-data">
                        @endif
                        @csrf
                         @method('PATCH')
                        <div class="row mb-3">
                            <label for="First_Name" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="First_Name" type="text" class="form-control @error('First_Name') is-invalid @enderror" name="First_Name" value="{{old('First_Name') ?? $actor->First_Name}}"  autocomplete="First_Name" autofocus>



                            @error('First_Name')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Last_Name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="Last_Name" type="text" class="form-control @error('Last_Name') is-invalid @enderror" name="Last_Name" value="{{old('Last_Name') ?? $actor->Last_Name}}"  autocomplete="Last_Name" autofocus>


                            @error('Last_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="About" class="col-md-4 col-form-label text-md-end">About Actor</label>

                            <div class="col-md-6">
                                <input id="About" type="text" class="form-control @error('About') is-invalid @enderror" name="About" value="{{ old('About') ?? $actor->About }}"  autocomplete="About">

                            @error('About')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Picture_Link" class="col-md-4 col-form-label text-md-end">Actor Image</label>

                            <div class="col-md-6">
                                <input id="Picture_Link" type="file" class="form-control @error('Picture_Link') is-invalid @enderror" name="Picture_Link" value="{{ old('Picture_Link') ?? $actor->Picture_Link }}" autocomplete="Picture_Link" autofocus>
                            @error('Picture_Link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                          <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Actor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
