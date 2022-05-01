@extends('crews.layout')
@section('content')
<div class="card">
  <div class="card-header">Crews Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">First_Name : {{ $crews->First_Name }}</h5>
        <p class="card-text">Last_Name : {{ $crews->Last_Name }}</p>
        <p class="card-text">About : {{ $crews->About }}</p>
        <p class="card-text">About : {{ $crews->Role }}</p>
        <p class="card-text">Picture_Link : {{ $crews->Picture_Link }}</p>
  </div>
      
    </hr>
  
  </div>
</div>