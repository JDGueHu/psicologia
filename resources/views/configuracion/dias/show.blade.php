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
                {!! Form::text('dia',$dia->dia, ['class' => 'form-control mayusculas', 'id'=>'dia','required', 'readonly'])  !!}

                @if ($errors->has('dia'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('dia') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('dia_ingles','Día en ingles')  !!}
                {!! Form::text('dia_ingles',$dia->dia_ingles, ['class' => 'form-control', 'id'=>'dia_ingles','required', 'readonly'])  !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('numero_dia','Número del día en la semana')  !!}
                {!! Form::number('numero_dia',$dia->numero_dia, ['class' => 'form-control', 'required', 'id'=>'numero_dia', 'readonly'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                {!! Form::number('costo',$dia->costo, ['class' => 'form-control', 'required', 'id'=>'costo', 'readonly'])  !!}
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
                <th>Costo</th>
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