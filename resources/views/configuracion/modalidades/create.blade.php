@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('modalidad.index') }}"><i class="fa fa-server" aria-hidden="true"></i> &nbsp Modalidades</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'modalidad.store', 'method' => 'POST']) !!} 

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('modalidad.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                {!! Form::number('costo',null, ['class' => 'form-control', 'required', 'id'=>'costo'])  !!}

                @if ($errors->has('tipo_modalidad'))
                <span style="color: red" class="help-block">
                    <strong>{{ $errors->first('tipo_modalidad') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Consultorio')  !!}
                {!! Form::radio('tipo_modalidad', 'Consultorio', false, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Virtual')  !!}
                {!! Form::radio('tipo_modalidad', 'Virtual', false, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipo_modalidad','Visita')  !!}
                {!! Form::radio('tipo_modalidad', 'Visita', false, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',null, ['class' => 'form-control', 'id'=>'detalles','size' => '30x4','required'])  !!}
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

@section('script')
    <script>
        $('#detalles').trumbowyg();
    </script>
@endsection