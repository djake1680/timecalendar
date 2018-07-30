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
        $employees = Employee::all();
        return view('fullcalendar', compact('employees'));
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

    public function getEvents()
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
                        'id' => $value->id
//                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::where('employee_id', '=', $request->employee_search_list)->first();
        $start = new Carbon($request->input('start'));
        $start = $start->toDateString();
        $end = new Carbon($request->input('end'));
        $end = $end->addDays(1);
        $end = $end->toDateString();

        $event = new Event;
        $event->title = $employee->first_name . " " . $employee->last_name;
        $event->employee_id = $request->employee_search_list;
        $event->start = $start;
        $event->end = $end;
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
//        $events = Employee::find($id);
        $events = Employee::find($id)->events()->get();

//        dd($events);
        return response()->json([
            'data' => $events,
        ]);
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
        $timeCategory = $request->input('time_category');
        $event = Event::find($id);
        $start = new Carbon($request->input('start'));
        $start = $start->toDateString();
        $end = new Carbon($request->input('end'));
        $end = $end->addDays(1);
        $end = $end->toDateString();
        $event->start = $start;
        $event->end = $end;
        $event->time_category = $timeCategory;
        $event->save();
        return redirect('/calendar');
    }



    public function resize(Request $request)
    {
        $id = $request->input('id');
        $end = $request->input('eventEnd');

        $event = Event::find($id);
        $event->end = $end;
        $event->save();
    }

    public function event_drop(Request $request)
    {
        $id = $request->input('id');
        $start = $request->input('eventStart');
        $end = $request->input('eventEnd');
        $event = Event::find($id);
        $event->start = $start;
        $event->end = $end;
        $event->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return($event);
    }

}
