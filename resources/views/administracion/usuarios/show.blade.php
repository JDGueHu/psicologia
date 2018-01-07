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
                {!! Form::text('nombres',$usuario->nombres, ['class' => 'form-control', 'id'=>'nombres','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                {!! Form::text('apellidos',$usuario->apellidos, ['class' => 'form-control', 'id'=>'apellidos','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('email','Correo electrónico')  !!}
                {!! Form::text('email',$usuario->email, ['class' => 'form-control', 'id'=>'email','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('celular','Celular')  !!}
                {!! Form::text('celular',$usuario->celular, ['class' => 'form-control', 'id'=>'celular','readonly'])  !!}
            </div>
        </div>
        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                {!! Form::text('ciudad',$usuario->ciudad, ['class' => 'form-control', 'id'=>'ciudad','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('departamento','Departamento')  !!}
                {!! Form::text('departamento',$usuario->departamento, ['class' => 'form-control', 'id'=>'departamento','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('pais','País')  !!}
                {!! Form::text('pais',$usuario->pais, ['class' => 'form-control', 'id'=>'pais','readonly'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('direccion','Celular')  !!}
                {!! Form::textarea('direccion',$usuario->direccion, ['class' => 'form-control', 'id'=>'direccion','readonly', 'rows' => 2, 'cols' => 40])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
