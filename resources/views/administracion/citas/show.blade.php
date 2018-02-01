@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('citas.index') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp Citas</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($cita) !!}

<a style="text-decoration: none;" href="{{ route('citas.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('consecutivo','Consecutivo')  !!}
                <p>{!! $cita->consecutivo_cita !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('fecha','Fecha')  !!}
                <p>{!! $cita->fecha !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('hora','Hora')  !!}
                <p>{!! $cita->hora !!}</p>
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('nombre','Nombre')  !!}
                <p>{!! $usuario->nombres !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                <p>{!! $usuario->apellidos !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('modalidad','Modalidad')  !!}
                <p>{!! $modalidad->tipo_modalidad !!}</p>
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('medio_virtual','Medio virtual')  !!}
                <p>{!! $cita->medio_virtual !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('usuario_medio_virtual','Usuario medio virtual')  !!}
                <p>{!! $cita->usuario_medio_virtual !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                <p>{!! $cita->ciudad !!}</p>
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('dirección','Dirección')  !!}
                <p>{!! $cita->dirección !!}</p>
            </div>
            <div class="col-md-8 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                <p>{!! $cita->detalles !!}</p>
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('citas.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
