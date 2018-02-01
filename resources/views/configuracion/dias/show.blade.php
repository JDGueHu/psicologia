@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('dias.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Días</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($dia) !!}

<a style="text-decoration: none;" href="{{ route('dias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('dia','Día')  !!}
                <p>{!! $dia->dia !!}</p>
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('dia_ingles','Día en ingles')  !!}
                <p>{!! $dia->dia_ingles !!}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('numero_dia','Número del día en la semana')  !!}
                <p>{!! $dia->numero_dia !!}</p>
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo (COP)')  !!}
                <p>{!! $dia->costo !!}</p>
            </div>
        </div>

    </div>
</div>
<hr>
<h4 style="color: #002e5b"> Horas asociadas </h4>
<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Costo (COP)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horas_selecionadas as $hora_selecionadas)
                <tr>
                    <td>{{ $hora_selecionadas->hora }}</td>
                    <td>{{ $hora_selecionadas->costo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a style="text-decoration: none;" href="{{ route('dias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')
    <script src="{{ asset('js/tableBasic.js') }}"></script>
@endsection