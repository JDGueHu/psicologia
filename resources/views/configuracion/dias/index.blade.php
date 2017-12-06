@extends('layouts.admin')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('dias.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Días</a></li>
	</ol>

	<a href="{{ route('dias.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Día</th>
					<th>Día en inglés</th>
					<th>Número del día</th>
					<th>Costo</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dias as $dia)
					<tr>
						<td>{{ $dia->dia }}</td>
						<td>{{ $dia->dia_ingles }}</td>
						<td>{{ $dia->numero_dia }}</td>
						<td>{{ $dia->costo }}</td>
						@if($dia->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('dias.show',$dia->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('dias.edit',$dia->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Asociar horas" href="{{ route('dias.asociar_horas',$dia->id) }}" class="btn btn-primary btn-xs">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Desvincular horas" href="{{ route('dias.desvincular_horas',$dia->id) }}" class="btn btn-danger btn-xs confirm_desvincular_F">
								<i class="fa fa-times-circle-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('dias.activar',$dia->id) }}" style="background-color: green" class="btn btn-success btn-xs confirm_activar_M">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('dias.destroy',$dia->id) }}" style="background-color: red" class="btn btn-danger btn-xs confirm_M">
								<i class="fa fa-ban" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('script')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/confirm.js') }}"></script>
@endsection