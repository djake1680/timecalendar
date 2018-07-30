<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => ['EventController@update', 'id'], 'method' => 'POST', 'id' => 'edit_event_form']) !!}
            {{--<form action="{{action('LeadsController@update',['id'=>$lead->id])}}" method="post">--}}
            <input type="hidden" name="_method" value="put" />
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="edit-event-modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group" id="edit-form-employee-name">
                    <!-- employee name will go here -->
                </div>

                {{--<input class="datepicker" data-date-format="mm/dd/yyyy">--}}
                <div class="form-group" id="edit_time_category_select">
                    <!-- time off reason will go here -->
                </div>

                <div class="input-group edit-event-date">
                    <div style="width: 50%;">
                    <label class="label label-default" for="editDateStart">Start</label>
                    <input style="width: 90%;" type="text" class="form-control date-start date-input" id="editDateStart" name="start" readonly/>
                    </div>
                    <div style="width: 50%;">
                    <label class="date-end" for="editDateEnd">End</label>
                    <input style="width: 90%;" type="text" class="form-control date-end date-input" id="editDateEnd" name="end" readonly/>
                    </div>
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
                <button type="button" id="event_delete" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save-event">Save</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>



