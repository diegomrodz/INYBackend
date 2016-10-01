@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Home Cares</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($homeCares as $homeCare)
				<tr>
					<td>{{ $homeCare->user->id }}</td>
					<td>{{ $homeCare->user->name }}</td>
					<td>{{ $homeCare->user->email }}</td>
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
		{{ $homeCares->links() }}
	</div>
</div>

@endsection
