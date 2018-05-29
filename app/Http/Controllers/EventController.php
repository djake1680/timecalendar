<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $timezone = config('app.timezone');
    }

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
                start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
                end = start;
                console.log(end);
                $("#exampleModalLong").modal("show");
            }'
        ]);
        return view('fullcalendar', compact('calendar'));
    }
}