@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('modalidad.index') }}"><i class="fa fa-server" aria-hidden="true"></i> &nbsp Modalidades</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($modalidad) !!}

<a style="text-decoration: none;" href="{{ route('modalidad.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                <p>{!! $modalidad->costo !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Consultorio')  !!}
                {!! Form::radio('tipo_modalidad', 'Consultorio', $modalidad->tipo_modalidad == 'Consultorio', ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Virtual')  !!}
                {!! Form::radio('tipo_modalidad', 'Virtual', $modalidad->tipo_modalidad == 'Virtual', ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Visita')  !!}
                {!! Form::radio('tipo_modalidad', 'Visita', $modalidad->tipo_modalidad == 'Visita', ['class' => 'form-control','disabled']) !!}
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                <p>{!! $modalidad->detalles !!}</p>
            </div>
        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('modalidad.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection