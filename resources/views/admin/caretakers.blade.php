@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Cuidadores Cadastrados</span>
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
				@foreach($caretakers as $caretaker)
				<tr>
					<td>{{ $caretaker->user->id }}</td>
					<td>{{ $caretaker->user->name }}</td>
					<td>{{ $caretaker->homeCare->name }}</td>
					<td>{{ $caretaker->user->email }}</td>
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
		{{ $caretakers->links() }}
	</div>
</div>

@endsection
