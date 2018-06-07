{{ Form::bsText('first-name', '', ['placeholder' => 'First Name']) }}
{{ Form::bsText('last-name', '', ['placeholder' => 'Last Name']) }}
<div class="input-group">
    <label for="employee_start_date">Employee Start Date</label>
    <input type="text" class="form-control date-input" id="employee_start_date" name="employee_start_date" readonly/>
</div>