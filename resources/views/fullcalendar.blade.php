@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="/css/calendar.css">
@endsection
@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
    </button>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-4">
                <div class="card card-default">
                    <div class="card-heading"></div>
                    <div class="card-body calendar">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('modal.eventform')
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="/js/calendar.js"></script>
    {!! $calendar->script() !!}
@endsection