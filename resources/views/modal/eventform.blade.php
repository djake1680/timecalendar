<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => 'EventController@store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="event-modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{--<input class="datepicker" data-date-format="mm/dd/yyyy">--}}
                <div class="form-group" id="time_category_select">
                    <label for="request_type">Time Off Reason</label>
                    <select name="request_type" class="form-control" id="request_type">
                        <option value="vacation">Vacation</option>
                        <option value="sick">Sick Time</option>
                        <option value="jury_duty">Jury Duty</option>
                        <option value="fmla">FMLA</option>
                        <option value="leave_of_absence">Leave of Absence</option>
                        <option value="disciplinary_action">Disciplinary Action</option>
                        <option value="training_school">Training/School</option>
                        <option value="bereavement">Bereavement</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="dateStart">Start</label>
                    <input type="text" class="form-control date-start date-input" id="dateStart" name="start" readonly/>
                    <label class="date-end" for="dateEnd">End</label>
                    <input type="text" class="form-control date-end date-input" id="dateEnd" name="end" readonly/>
                </div>

                <div class="form-group" id="time_category_div">
                    <label for="time_category">Full / Half Day</label>
                    <select class="form-control" id="time_category" name="time_category">
                        <option value="fullDay">Full Day</option>
                        <option value="halfDay">Half Day</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save-event">Save changes</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>



