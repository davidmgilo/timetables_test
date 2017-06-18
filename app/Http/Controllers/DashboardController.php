<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Scool\Timetables\Models\Lesson;

class DashboardController extends Controller
{

    public function lessonsNumber()
    {
        $value = Cache::remember('lessonsNumber', 1, function (){
            // IF cache MISS
            return Lesson::all()->count();
        });
        return $value;
    }

    public function createRandomLesson()
    {
        $lesson = Lesson::create([]);
        echo $lesson;
    }

}
