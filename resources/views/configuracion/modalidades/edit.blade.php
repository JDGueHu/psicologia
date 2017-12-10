@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('modalidad.index') }}"><i class="fa fa-server" aria-hidden="true"></i> &nbsp Modalidades</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($modalidad,['route' => ['modalidad.update',$modalidad->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('modalidad.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('modalidad','Modalidad')  !!}
                {!! Form::text('modalidad',$modalidad->modalidad, ['class' => 'form-control mayusculas', 'id'=>'dia','modalidad'])  !!}

                @if ($errors->has('dia'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('dia') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                {!! Form::number('costo',$modalidad->costo, ['class' => 'form-control', 'required', 'id'=>'costo'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Consultorio')  !!}
                {!! Form::radio('tipo_modalidad', 'Consultorio', $modalidad->tipo_modalidad == 'Consultorio', ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Virtual')  !!}
                {!! Form::radio('tipo_modalidad', 'Virtual', $modalidad->tipo_modalidad == 'Virtual', ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Visita')  !!}
                {!! Form::radio('tipo_modalidad', 'Visita', $modalidad->tipo_modalidad == 'Visita', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',$modalidad->detalles, ['class' => 'form-control', 'id'=>'detalles','size' => '30x4'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('modalidad.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection