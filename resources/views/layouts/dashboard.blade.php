@extends('layouts.app')

@section('content')
<style type="text/css" scoped>
	
	div.ds-content {
		margin-top: 15px !important;
	}

</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2 col-lg-2">
			<nav class="navbar navbar-default navbar-fixed-side">
				@if (Auth::user()->type == "admin")
				<ul class="nav nav-sidebar">
					<li><a href="{{ url('/admin') }}">Dashboard</a></li>
					<li><a href="{{ url('/admin/users') }}">Usuários</a></li>
					<li><a href="{{ url('/admin/home_cares') }}">Home Cares</a></li>
					<li><a href="{{ url('/admin/caretakers') }}">Cuidadores</a></li>
					<li><a href="{{ url('/admin/patients') }}">Pacientes</a></li>
					<li><a href="{{ url('/admin/devices') }}">Dispositivos</a></li>
					<li><a href="{{ url('/admin/schedules') }}">Escalas</a></li>
					<li><a href="{{ url('/admin/oauth') }}">OAuth</a></li>
				</ul>
				@endif

				@if (Auth::user()->type == "home_care")
				<ul class="nav nav-sidebar">
					<li><a href="{{ url('/home_care') }}">Dashboard</a></li>
					<li><a href="{{ url('/home_care/home') }}">Home Care</a></li>
					<li><a href="{{ url('/home_care/schedule') }}">Escala</a></li>
				</ul>
				@endif

			</nav>
		</div>
		
		<div class="col-md-10 col-sm-10 ds-content">
			@yield('dashboard-content')
		</div>
	</div>
</div>
@endsection
