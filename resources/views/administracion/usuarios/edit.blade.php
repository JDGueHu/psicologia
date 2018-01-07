@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Usuarios</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($usuario,['route' => ['usuarios.update',$usuario->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('nombres','Nombres')  !!}
                {!! Form::text('nombres',$usuario->nombres, ['class' => 'form-control', 'id'=>'nombres', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('apellidos','Apellidos')  !!}
                {!! Form::text('apellidos',$usuario->apellidos, ['class' => 'form-control', 'id'=>'apellidos', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('email','Correo electrónico')  !!}
                {!! Form::text('email',$usuario->email, ['class' => 'form-control', 'id'=>'email', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('celular','Celular')  !!}
                {!! Form::text('celular',$usuario->celular, ['class' => 'form-control', 'id'=>'celular', 'required'])  !!}
            </div>
        </div>
        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                {!! Form::text('ciudad',$usuario->ciudad, ['class' => 'form-control', 'id'=>'ciudad', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('departamento','Departamento')  !!}
                {!! Form::text('departamento',$usuario->departamento, ['class' => 'form-control', 'id'=>'departamento', 'disabled'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('pais','País')  !!}
                {!! Form::text('pais',$usuario->pais, ['class' => 'form-control', 'id'=>'pais', 'disabled'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('direccion','Dirección')  !!}
                {!! Form::textarea('direccion',$usuario->direccion, ['class' => 'form-control', 'id'=>'direccion', 'rows' => 2, 'cols' => 40, 'required'])  !!}
            </div>
        </div>
        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('password','Contraseña')  !!}
                {!! Form::password('password', ['class' => 'form-control', 'id'=>'password', 'required'])  !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('password-confirm','Repertir contraseña')  !!}
                {!! Form::password('password-confirm', ['class' => 'form-control', 'id'=>'password-confirm', 'required'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwI3QXc_44PgwWL2c9rybOtv3jrRtqWxE&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="{{ asset('js/shared.js') }}"></script>
@endsection