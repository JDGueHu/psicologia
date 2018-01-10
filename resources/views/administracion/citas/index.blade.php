@extends('layouts.admin')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('citas.index') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp Citas</a></li>
	</ol>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Consecutivo</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Estado cita</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($citas as $cita)
					<tr>
						<td>{{ $cita->consecutivo_cita }}</td>
						<td>{{ $cita->fecha }}</td>
						<td>{{ $cita->hora }}</td>
						<td>{{ $cita->nombres }}</td>
						<td>{{ $cita->apellidos }}</td>
						@if($cita->estado == 'Cancelada')
							<td><span class="label label-danger">Cancelada</span></td>
						@else
							@if($cita->estado == 'Por confirmar')
								<td><span class="label label-warning">Por confirmar</span></td>
							@else	
								@if($cita->estado == 'Confirmada')
									<td><span class="label label-success">Confirmada</span></td>
								@else
									<td><span class="label label-success">Finalizada</span></td>
								@endif
							@endif
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('citas.show',$cita->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('citas.edit',$cita->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('citas.activar',$cita->id) }}" class="btn btn-success btn-xs confirm_activar_F">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('citas.destroy',$cita->id) }}" class="btn btn-danger btn-xs confirm_F">
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