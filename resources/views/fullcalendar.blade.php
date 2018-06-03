@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                @include('calendar.sidebar')
            </div>
            <div class="col-md-7">
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="/js/calendar.js"></script>
    {!! $calendar->script() !!}
@endsection