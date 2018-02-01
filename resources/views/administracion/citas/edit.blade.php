@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('citas.index') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp Citas</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($cita,['route' => ['citas.update',$cita->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('citas.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('consecutivo','Consecutivo')  !!}
                {!! Form::text('consecutivo',$cita->consecutivo_cita, ['class' => 'form-control', 'id'=>'consecutivo','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('fecha','Fecha')  !!}
                {!! Form::text('fecha',$cita->fecha, ['class' => 'form-control', 'id'=>'fecha','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('hora','Hora')  !!}
                {!! Form::text('hora',$cita->hora, ['class' => 'form-control', 'id'=>'hora','readonly'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('nombre','Nombre')  !!}
                {!! Form::text('nombre',$usuario->nombres, ['class' => 'form-control', 'id'=>'nombre','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                {!! Form::text('apellidos',$usuario->apellidos, ['class' => 'form-control', 'id'=>'apellidos','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('modalidad','Modalidad')  !!}
                {!! Form::text('modalidad',$modalidad->tipo_modalidad, ['class' => 'form-control', 'id'=>'modalidad','readonly'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('medio_virtual','Medio virtual')  !!}
                {!! Form::text('medio_virtual',$cita->medio_virtual, ['class' => 'form-control', 'id'=>'medio_virtual','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('usuario_medio_virtual','Usuario medio virtual')  !!}
                {!! Form::text('usuario_medio_virtual',$cita->usuario_medio_virtual, ['class' => 'form-control', 'id'=>'usuario_medio_virtual','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                {!! Form::text('ciudad',$cita->ciudad, ['class' => 'form-control', 'id'=>'ciudad','readonly'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('dirección','Dirección')  !!}
                {!! Form::text('dirección',$cita->dirección, ['class' => 'form-control', 'id'=>'dirección','readonly'])  !!}
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',$cita->detalles, ['class' => 'form-control', 'id'=>'detalles','size' => '30x2'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('citas.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')
    <script>
        $('#detalles').trumbowyg();
    </script>
@endsection