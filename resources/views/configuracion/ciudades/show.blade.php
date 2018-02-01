@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('ciudad_cita.index') }}"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp Ciudades</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($ciudad) !!}

<a style="text-decoration: none;" href="{{ route('ciudad_cita.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudad','Ciudad')  !!}
                <p>{!! $ciudad->ciudad !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('departamento','Municipio')  !!}
                <p>{!! $ciudad->municipio !!}</p>
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('pais','Pais')  !!}
                <p>{!! $ciudad->pais !!}</p>
            </div>
        </div>

    </div>
</div>

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