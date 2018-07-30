@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                @include('calendar.sidebar')
            </div>
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-heading"></div>
                    <div class="card-body calendar" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('modal.eventform')
@include('modal.editeventform')
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="/js/calendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection