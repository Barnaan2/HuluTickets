@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
@foreach($movies as $movie)
<img src="../{{$movie->Poster_Link}}" alt="" />
 {{$movie->Title}} - <a href="/admin/movies/{{$movie->id}}/edit">Edit Movie</a>  <br>

 {{$movie->getActor()->First_Name}}
@endforeach
@endsection
