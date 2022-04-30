@extends('layouts.app')
{{--
         ----Description
         You are expected to create the dashboard and put it in this folder
         this form is to register admins




--}}

@section('content')


<form method="POST" action="{{ route('register.SuperAdmin') }}">
    @csrf

        <label>{{ __('Name') }}</label>
            <input type="text"   name='name' required>
        <label for="email">{{ __('Email Address') }}</label>

            <input type="email" name="email" required >
<input type="password" name="password" required>
            <button type="submit">
                {{ __('Register') }}
            </button>
@endsection
