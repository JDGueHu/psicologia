@extends('layouts.admin')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('motivoCancelacion.index') }}"><i class="fa fa-ban" aria-hidden="true"></i> &nbsp Motivos de cancelación</a></li>
	</ol>

	<a href="{{ route('motivoCancelacion.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Motivo</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($motivos as $motivo)
					<tr>
						<td>{{ $motivo->motivo }}</td>
						@if($motivo->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('motivoCancelacion.show',$motivo->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('motivoCancelacion.edit',$motivo->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('motivoCancelacion.activar',$motivo->id) }}" class="btn btn-success btn-xs confirm_activar_F">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('motivoCancelacion.destroy',$motivo->id) }}" class="btn btn-danger btn-xs confirm_F">
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