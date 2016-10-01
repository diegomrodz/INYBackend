<style type="text/css" scoped>
	

</style>

<template>
	<div class="col-sm-2">
		
	</div>

	<div class="col-sm-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Escala do Dia <strong>17/09/2016</strong></span>
			</div>

			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Cuidador</th>
							<th>Paciente</th>
							<th>Ações</th>
						</tr>		
					</thead>
					<tbody>
						<tr>
							<td colspan="2"><strong>Bob</strong></td>
							<td>
								<a href="#">Adicionar Paciente</a>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Judie</td>
							<td>
								<a class="text-danger" href="#">Remover</a>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Maria</td>
							<td>
								<a class="text-danger" href="#">Remover</a>
							</td>
						</tr>
						<tr>
							<td colspan="2"><strong>Alice</strong></td>
							<td>
								<a href="#">Adicionar Paciente</a>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>Greg</td>
							<td>
								<a class="text-danger" href="#">Remover</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="panel-footer">
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	
	export default {

		props: ['home_care_id', 'user_id'],

		data() {

		},

		methods: {

			getSchedule() {
			}

		},

		ready() {
		}

	}

</script>