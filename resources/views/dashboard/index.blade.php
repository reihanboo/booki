@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="">
        <h1>Welcome to the Dashboard</h1>
        @for ($i = 0; $i < 199; $i++)
            <p>This is the main content of the dashboard.</p>
        @endfor
    </div>
@endsection