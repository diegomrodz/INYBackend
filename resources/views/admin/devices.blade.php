@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Dispositivo Cadastrados</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Home Care</th>
					<th>Paciente Atual</th>
					<th>Código</th>
					<th>Email</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($devices as $device)
				<tr>
					<td>{{ $device->user->id }}</td>
					<td>{{ $device->user->name }}</td>
					<td>{{ $device->homeCare->name }}</td>
					<td>{{ $device->patient->user->name }}</td>
					<td>{{ $device->code }}</td>
					<td>{{ $device->user->email }}</td>
					<td>
						<a href="#">Editar</a>
					</td>
					<td>
						<a class="text-danger" href="#">Excluir</a>
					</td>
					<td>
						<a target="_blanck" class="text-warning" href="{{ url('/device-panel/' . $device->id . '/current') }}">Painel</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="panel-footer">
		{{ $devices->links() }}
	</div>
</div>

@endsection
