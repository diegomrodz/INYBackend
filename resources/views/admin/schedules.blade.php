@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Escalas</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Home Care</th>
					<th>Cuidador</th>
					<th>Paciente</th>
					<th>Data</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{ $schedule->id }}</td>
					<td>{{ $schedule->caretaker->homeCare->name }}</td>
					<td>{{ $schedule->caretaker->user->name }}</td>
					<td>{{ $schedule->patient->user->name }}</td>
					<td>{{ date_format(date_create($schedule->date), "d/m/Y") }}</td>
					<td>
						<a href="#">Editar</a>
					</td>
					<td>
						<a class="text-danger" href="#">Excluir</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="panel-footer">
		{{ $schedules->links() }}
	</div>
</div>

@endsection