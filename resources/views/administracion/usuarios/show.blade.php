@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Usuarios</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($usuario) !!}

<a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('nombres','Nombres')  !!}
                <p>{!! $usuario->nombres !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                <p>{!! $usuario->apellidos !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('email','Correo electrónico')  !!}
                <p>{!! $usuario->email !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('celular','Celular')  !!}
                <p>{!! $usuario->celular !!}</p>
            </div>
        </div>
        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                <p>$usuario->ciudad !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('departamento','Departamento')  !!}
                <p>{!! $usuario->departamento !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('pais','País')  !!}
                <p>{!! $usuario->pais !!}</p>
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('direccion','Celular')  !!}
                <p>{!! $usuario->direccion !!}</p>
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
