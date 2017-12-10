@extends('layouts.admin')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('ciudad_cita.index') }}"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp Ciudades</a></li>
	</ol>

	<a href="{{ route('ciudad_cita.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Ciudad</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ciudades as $ciudad)
					<tr>
						<td>{{ $ciudad->ciudad }}</td>
						@if($ciudad->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('ciudad_cita.show',$ciudad->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('ciudad_cita.edit',$ciudad->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('ciudad_cita.activar',$ciudad->id) }}" class="btn btn-success btn-xs confirm_activar_F">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('ciudad_cita.destroy',$ciudad->id) }}" class="btn btn-danger btn-xs confirm_F">
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