@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
@foreach($cinemas as $cinema)
  {{$cinema->ProfilePicture}} -
  {{$cinema->Name}} -
  {{$cinema->Address}} -
  {{$cinema->Number_Of_Seats}} <br>
@endforeach
@endsection
