


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit-cinema </title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class=" navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

            <li class="nav-item d-none d-sm-inline-block">
                <a href="/home" class="nav-link">Home</a>
            </li>
        </ul>


     </nav>

     <div>
     <img src="/{{$cinema->ProfilePicture}}" alt="Cinema Profile">
     <p>{{$cinema->Name}}</p>
     <p>{{$cinema->Address}}</p>
     <p>{{$cinema->Number_Of_Seats}}</p>
     </div>

        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Cinema
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('UpdateCinema',$cinema->id)}}" enctype="multipart/form-data">
                        @csrf
                         @method('PATCH')
                        <div class="row mb-3">
                            <label for="Name" class="col-md-4 col-form-label text-md-end">Cinema Name</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{old('Name') ?? $cinema->Name}}"  autocomplete="Name" autofocus>



                            @error('Name')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{old('Address') ?? $cinema->Address}}"  autocomplete="Address" autofocus>


                            @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>



                        <div class="row mb-3">
                            <label for="ProfilePicture" class="col-md-4 col-form-label text-md-end">Profile Picture</label>

                            <div class="col-md-6">
                                <input id="ProfilePicture" type="file" class="form-control @error('ProfilePicture') is-invalid @enderror" name="ProfilePicture" value="{{ old('ProfilePicture') ?? $cinema->ProfilePicture }}" autocomplete="ProfilePicture" autofocus>
                            @error('ProfilePicture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Number_Of_Seats" class="col-md-4 col-form-label text-md-end">Number of Seats</label>

                            <div class="col-md-6">
                                <input id="Number_Of_Seats" type="text" class="form-control @error('Number_Of_Seats') is-invalid @enderror" name="Number_Of_Seats" value="{{ old('Number_Of_Seats') ?? $cinema->Number_Of_Seats }}"  autocomplete="Number_Of_Seats">

                            @error('Number_Of_Seats')
                            <span class="invalid-feedback dan" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>



                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                            <select class="selection-2 " name="City_id" tabindex="-1" aria-hidden="true" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->Name}}</option>
                                            @endforeach
                                        </select>

                                </div>
                        </div>
                          <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Cinema
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
