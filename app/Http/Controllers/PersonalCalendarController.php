<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scool\Timetables\Models\Day;
use Scool\Timetables\Models\Timeslot;

class PersonalCalendarController extends Controller
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('personalCalendar',$data);
    }

    public function days (Request $request) {
        return Day::find($request->get('id'));
    }

    public function timeslots (Request $request) {
        return Timeslot::find($request->get('id'));
    }

}
