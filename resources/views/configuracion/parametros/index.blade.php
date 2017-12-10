@extends('layouts.admin')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('parametro.index') }}"><i class="fa fa-cog" aria-hidden="true"></i> &nbsp Parámetros</a></li>
	</ol>

	<a href="{{ route('parametro.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Llave</th>
					<th>Valor</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($parametros as $parametro)
					<tr>
						<td>{{ $parametro->llave }}</td>
						<td>{{ $parametro->valor }}</td>
						@if($parametro->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('parametro.show',$parametro->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('parametro.edit',$parametro->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('parametro.activar',$parametro->id) }}" class="btn btn-success btn-xs confirm_activar_M">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('parametro.destroy',$parametro->id) }}" class="btn btn-danger btn-xs confirm_M">
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