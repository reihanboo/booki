<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'name' => 'Raden Saleh',
            'readable_time' => 'Selamat Sore'
        ]);
    }
}
