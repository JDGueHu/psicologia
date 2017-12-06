@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('dias.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Días</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($dia,['route' => ['dias.update',$dia->id], 'method' => 'PUT']) !!}


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('dias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('dia','Día')  !!}
                {!! Form::text('dia',$dia->dia, ['class' => 'form-control mayusculas', 'id'=>'dia','required'])  !!}

                @if ($errors->has('dia'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('dia') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('dia_ingles','Día en ingles')  !!}
                {!! Form::text('dia_ingles',$dia->dia_ingles, ['class' => 'form-control', 'id'=>'dia_ingles','required'])  !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('numero_dia','Número del día en la semana')  !!}
                {!! Form::number('numero_dia',$dia->numero_dia, ['class' => 'form-control', 'required', 'id'=>'numero_dia'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                {!! Form::number('costo',$dia->costo, ['class' => 'form-control', 'required', 'id'=>'costo'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('dias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default  separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection