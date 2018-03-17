@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('motivoCancelacion.index') }}"><i class="fa fa-ban" aria-hidden="true"></i> &nbsp Motivos de cancelación</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($motivo) !!}

<a style="text-decoration: none;" href="{{ route('motivoCancelacion.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-12 separarBottom">
                {!! Form::label('motivo','Motivo')  !!}
                <p>{!! $motivo->motivo !!}</p>
            </div>
        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('motivoCancelacion.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection