@extends('actors.layout')
@section('content')
<div class="card">
  <div class="card-header">Actors Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">First_Name : {{ $actors->First_Name }}</h5>
        <p class="card-text">Last_Name : {{ $actors->Last_Name }}</p>
        <p class="card-text">About : {{ $actors->About }}</p>
        <p class="card-text">Picture_Link : {{ $actors->Picture_Link }}</p>
  </div>
      
    </hr>
  
  </div>
</div>