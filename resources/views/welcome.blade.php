@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/welcome.css">
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3" id="welcome-title">Time Tracker</h1>
            <p class="lead" id="welcome-body">This is a calendar for tracking employees time off.</p>
            <hr class="my-4">
            <p id="welcome-body">It tracks various reasons including vacation, sickness, FMLA, and leave of absences.</p>
            @if (Route::has('login'))
                <div class="links text-center">
                    @auth
                    <a href="{{ url('/calendar') }}" class="btn btn-primary btn-lg">Calendar</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
                        @endauth
                </div>
            @endif
        </div>
    </div>
@endsection

