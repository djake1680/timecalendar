<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#employee_data" role="tab">Employees</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#reports" role="tab">Reports</a>
    </li>
</ul>

<div class="tab-content">
    <!-- EMPLOYEES TAB STARTS -->
    <div class="tab-pane active" id="employee_data" role="tabpanel">
        {{--{!! Form::open() !!}--}}
        {{--{{ csrf_field() }}--}}
        {{--{!! Form::close() !!}--}}


        <div class="form-group">
            <select name="employee-search-list" id="employee-search-list" class="form-control">
                <option value="-1" selected="selected">Select an employee</option>
                {{--@foreach($users as $key => $user)--}}
                    {{--<option value="{{ $key }}">{{ $user }}</option>--}}
                {{--@endforeach--}}
                @foreach($employees as $employee)

                    <option value="{{ $employee->id }}">{{ $employee->first_name . " " . $employee->last_name . " - " . $employee->employee_id }}</option>

                @endforeach
            </select>
        </div>

    </div>
    <!-- EMPLOYEES TAB ENDS -->

    <!-- REPORTS TAB STARTS -->
    <div class="tab-pane" id="reports" role="tabpanel">
        Reports
    </div>

</div>