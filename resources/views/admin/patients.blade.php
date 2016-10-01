@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Pacientes Cadastrados</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Home Care</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($patients as $patient)
				<tr>
					<td>{{ $patient->user->id }}</td>
					<td>{{ $patient->user->name }}</td>
					<td>{{ $patient->homeCare->name }}</td>
					<td>{{ $patient->user->email }}</td>
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
		{{ $patients->links() }}
	</div>
</div>

@endsection
