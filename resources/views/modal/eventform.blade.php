<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="event-modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{--<input class="datepicker" data-date-format="mm/dd/yyyy">--}}

                {!! Form::open(['action' => 'EventController@store', 'method' => 'POST']) !!}

                <div class="input-group">
                    <label for="dateStart">Start</label>
                    <span class="btn btn-default">
                    </span>
                    <input type="text" class="form-control date-start" id="dateStart" name="start"/>
                    <label class="date-end" for="dateEnd">End</label>
                    <span class="btn btn-default">
                    </span>
                    <input type="text" class="form-control date-end" id="dateEnd" name="end"/>
                </div>

                {!! Form::close() !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>