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
        {!! Form::open() !!}
        {{ csrf_field() }}

        <select name="employee_search_list" class="form-control" id="employee_search_list" style="width: 100%;">
            <option value="">Select Employee</option>
            @foreach($employees as $employee)

                <option value="{{ $employee->employee_id }}">{{ $employee->first_name . " " . $employee->last_name . " - " . $employee->employee_id }}</option>

            @endforeach
        </select>

        {!! Form::close() !!}

    </div>
    <!-- EMPLOYEES TAB ENDS -->

    <!-- REPORTS TAB STARTS -->
    <div class="tab-pane" id="reports" role="tabpanel">
        Reports
    </div>

</div>