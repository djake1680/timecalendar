@extends('layouts.app')


@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#add_employee" role="tab">Add Employee</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#reports" role="tab">Reports</a>
        </li>
    </ul>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
            <div class="tab-content">
                <!-- EMPLOYEES TAB STARTS -->
                <div class="tab-pane active" id="add_employee" role="tabpanel">
                    {{--{!!Form::open(['action' => 'EmployeeController@store', 'method' => 'POST']) !!}--}}
                    {!! Form::open() !!}
                    {{ csrf_field() }}
                    @include('components.management.addEmployee')


                    {!! Form::close() !!}

                    <div class="form-group">

                    </div>

                </div>
                <!-- EMPLOYEES TAB ENDS -->

                <!-- REPORTS TAB STARTS -->
                <div class="tab-pane" id="reports" role="tabpanel">
                    Reports
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/management.js"></script>
@endsection