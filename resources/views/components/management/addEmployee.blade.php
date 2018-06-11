<div class="card mt-4">
    <h5 class="card-header">Add Employee</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        {{--<h5 class="card-title">Special title treatment</h5>--}}
        {!!Form::open(['action' => 'EmployeeController@store', 'method' => 'POST']) !!}
        {{ csrf_field() }}

        <div class="form-group">

            {{ Form::bsText('first-name', '', ['placeholder' => 'First Name']) }}
            {{ Form::bsText('last-name', '', ['placeholder' => 'Last Name']) }}
            {{ Form::bsNumber('employee_id', '', ['placeholder' => 'Employee ID']) }}


            <label for="employee_start_date">Employee Start Date</label>
            <input type="text" class="form-control date-input" id="employee_start_date" name="employee_start_date" readonly/>

            {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary mt-3']) }}

        </div>

        {!! Form::close() !!}
    </div>
</div>