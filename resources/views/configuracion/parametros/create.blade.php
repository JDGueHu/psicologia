@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('parametro.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Parámetros</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'parametro.store', 'method' => 'POST']) !!} 

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('parametro.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('llave','Llave')  !!}
                {!! Form::text('llave',null, ['class' => 'form-control mayusculas', 'id'=>'llave','required'])  !!}

                @if ($errors->has('llave'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('llave') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('valor','Valor')  !!}
                {!! Form::text('valor',null, ['class' => 'form-control', 'id'=>'valor','required'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('parametro.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection