<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Employee;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $timezone = config('app.timezone');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'timezone' => 'local',
                        'textColor' => 'white',
                        'request_type' => $value->request_type,
//                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)
        ->setCallbacks([
            'editable' => true,
            'eventDurationEditable' => true,
            'nextDayThreshold' => '"00:00:00"',
            'selectable' => true,
            'selectHelper' => true,
            'eventClick' => 'function(calEvent, jsEvent, view) {
            console.log(calEvent);
            }',
            'eventRender' => 'function(event, element, view) {
            console.log(event);
            if(event.request_type === "sick") {
                element.css(\'background-color\', \'#33cc00\');
            }
            }',
            'select' => 'function(start, end, allDay) {
                start = $.fullCalendar.formatDate(start, "MM/DD/YYYY");
                end = start;
                $("#exampleModalLong").modal("show");
                $(".event-modal-title").html("Add Time Off");
                
                $(\'#dateStart\').daterangepicker({
                    startDate: start,
                    singleDatePicker: true,
                    showDropdowns: true
                });

                $(\'#dateEnd\').daterangepicker({
                    startDate: end,
                    singleDatePicker: true,
                    showDropdowns: true
                });
                
            }'
        ]);
        return view('fullcalendar', compact('calendar'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = $request->input('start');
        $start = new Carbon($start);
        $start = $start->toDateString();

        $end = $request->input('end');
        $end = new Carbon($end);
        $end = $end->toDateString();

        $event = new Event;
        $event->title = "Trevor Linan";
        $event->employee_id = "12345";
        $event->start_date = $start;
        $event->end_date = $end;
        $event->request_type = $request->input('request_type');
        $event->time_category = $request->input('time_category');
        $event->save();

        return redirect('/calendar');
//        ->with('success', 'Todo Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
