@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('ciudad_cita.index') }}"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp Ciudades</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($ciudad,['route' => ['ciudad_cita.update',$ciudad->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('ciudad_cita.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                {!! Form::text('ciudad',$ciudad->ciudad, ['class' => 'form-control', 'id'=>'ciudad','required'])  !!}

                @if ($errors->has('ciudad'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('ciudad') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('departamento','Municipio')  !!}
                {!! Form::text('departamento',$ciudad->municipio, ['class' => 'form-control', 'id'=>'departamento','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('pais','Pais')  !!}
                {!! Form::text('pais',$ciudad->pais, ['class' => 'form-control', 'id'=>'pais','readonly'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('ciudad_cita.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwI3QXc_44PgwWL2c9rybOtv3jrRtqWxE&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="{{ asset('js/shared.js') }}"></script>
@endsection