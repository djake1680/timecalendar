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
            <div class="col-sm-4 offset-sm-4">
            <div class="tab-content">
                <!-- EMPLOYEES TAB STARTS -->
                <div class="tab-pane active" id="add_employee" role="tabpanel">
                        @include('components.management.addEmployee')
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