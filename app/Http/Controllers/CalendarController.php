<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index() {
        return view('calendar.index');
    }

    public function deadlines() {
        return view('calendar.deadlines');
    }

    public function events() {
        return view('calendar.events');
    }
}
