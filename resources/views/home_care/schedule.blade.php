@extends('layouts.dashboard')

@section('dashboard-content')

<home-care-scheduler 
	user_id="{{ Auth::user()->id }}"
	home_care_id="{{ Auth::user()->homeCare()->id }}"
></home-care-scheduler>

@endsection
