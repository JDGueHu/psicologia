@extends('layouts.admin_user')

@section('content')

{!! Form::model($user,['route' => ['datos_usuario.update',$user->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ url('/') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="row"> 
    <div class="col-md-12 separarBottom">
        @include('flash::message')
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('nombres','Nombres')  !!}
                {!! Form::text('nombres',$user->nombres, ['class' => 'form-control', 'id'=>'nombres', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                {!! Form::text('apellidos',$user->apellidos, ['class' => 'form-control', 'id'=>'apellidos', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('email','Correo electrónico')  !!}
                {!! Form::text('email',$user->email, ['class' => 'form-control', 'id'=>'email', 'readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('celular','Celular')  !!}
                {!! Form::text('celular',$user->celular, ['class' => 'form-control', 'id'=>'celular', 'required'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                {!! Form::text('ciudad',$user->ciudad, ['class' => 'form-control', 'id'=>'ciudad', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('departamento','Departamento')  !!}
                {!! Form::text('departamento',$user->departamento, ['class' => 'form-control', 'id'=>'departamento', 'readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('pais','País')  !!}
                {!! Form::text('pais',$user->pais, ['class' => 'form-control', 'id'=>'pais', 'readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('direccion','Dirección')  !!}
                {!! Form::textarea('direccion',$user->direccion, ['class' => 'form-control', 'id'=>'direccion', 'rows' => 2, 'cols' => 40, 'required'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('password','Contraseña')  !!}
                {!! Form::password('password', ['class' => 'form-control', 'id'=>'password'])  !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('password-confirm','Repertir contraseña')  !!}
                {!! Form::password('password-confirm', ['class' => 'form-control', 'id'=>'password-confirm'])  !!}
            </div>
        </div>

    </div>
</div>

<div class="row"> 
    <div class="col-md-12 separarBottom">
        @include('flash::message')
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading">Mis citas</div>
    <div class="panel-body">

    <div class="table-responsive">
        <!-- {{ csrf_field() }} -->
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Consecutivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Modalidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->consecutivo_cita }}<span style="opacity:0">{{ -$cita->id }}</span></td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->tipo_modalidad }}</td>
                        @if($cita->estado == 'Cancelada')
                            <td><span class="label label-danger">Cancelada</span></td>
                        @else
                            @if($cita->estado == 'Por confirmar')
                                <td><span class="label label-warning">Por confirmar</span></td>
                            @else   
                                @if($cita->estado == 'Confirmada')
                                    <td><span class="label label-success">Confirmada</span></td>
                                @else
                                    <td><span class="label label-default">Finalizada</span></td>
                                @endif
                            @endif
                        @endif
                        <td>
                            <a title="Detalles" data-toggle="modal" data-target="#modal_detalles" class="btn btn-default btn-xs detalles_cita">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            @if($cita->estado == 'Por confirmar')
                            <a title="Confirmar" class="btn btn-success btn-xs confirmar_cita" href="{{ route('datos_usuario.confirmar',$cita->id) }}">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </a>
                            <a title="Cancelar" class="btn btn-danger btn-xs cancelar_cita">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                            @else
                                @if($cita->estado == 'Confirmada')
                                <a title="Cancelar" class="btn btn-danger btn-xs cancelar_cita">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a> 
                                @endif                     
                            @endif
                            <a title="Cancelar" class="btn btn-info btn-xs visible">
                                <i class="fa fa-refresh fa-spin"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ url('/') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

<!-- Modal para detalles-->
<div id="modal_detalles" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="border-radius: 4px">
      <div class="modal-header" style="border:1px solid #fff; border-radius: 4px; padding: 10px">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <div class="panel panel-primary">    
            <div class="panel-heading">Consecutivo de la cita:  <b><span id="consecutivo_cita"></span></b></div>
            <div class="panel-body">

                <div class="row">   
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('fecha','Fecha')  !!}
                        <p id="fecha"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('hora','Hora')  !!}
                        <p id="hora"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('modalidad','Modalidad')  !!}
                        <p id="modalidad"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('medio_virtual','Medio virtual')  !!}
                        <p id="medio_virtual"></p>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('usuario_medio_virtual','Usuario medio virtual')  !!}
                        <p id="usuario_medio_virtual"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('ciudad','Ciudad')  !!}
                        <p id="ciudad"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('dirección','Dirección')  !!}
                        <p id="direccion"></p>
                    </div>
                    <div class="col-md-3 separarBottom">
                        {!! Form::label('estado','Estado')  !!}
                        <p id="estado"></p>
                    </div>
                </div>

            </div>
        </div>

      </div>
      <div class="modal-footer" style="border:1px solid #fff;border-radius: 4px">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

{!! Form::close() !!}

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwI3QXc_44PgwWL2c9rybOtv3jrRtqWxE&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script src="{{ asset('js/shared.js') }}"></script>
    <script src="{{ asset('js/tableBasic.js') }}"></script>
    <script src="{{ asset('js/confirm.js') }}"></script>
    <script src="{{ asset('js/script_usuario.js') }}"></script>
@endsection