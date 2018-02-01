@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('parametro.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Parámetros</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($parametro) !!}

<a style="text-decoration: none;" href="{{ route('parametro.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('llave','Llave')  !!}
                <p>{!! $parametro->llave !!}</p>
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('valor','Valor')  !!}
                <p>{!! $parametro->valor !!}</p>
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('parametro.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection