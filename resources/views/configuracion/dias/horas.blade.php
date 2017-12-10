@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('dias.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Días</a></li>
  <li class="active">Asignar horas</li>
</ol>

{!! Form::open(['route' => 'dias.asociar_horas_store', 'method' => 'POST']) !!} 

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
                {!! Form::text('dia',$dia->dia, ['class' => 'form-control mayusculas', 'id'=>'dia','required','readonly'])  !!}

                @if ($errors->has('dia'))
                    <span style="color: red" class="help-block">
                        <strong>{{ $errors->first('dia') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('horas','Horas asociadas')  !!}
                {!! Form::select('horas[]', $horas, $horas_selecionadas, ['class' => 'form-control chosen-select','multiple' => true,'id' => 'horas']) !!}
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-6 separarBottom">
                {!! Form::label('costo','Costo')  !!}
                {!! Form::number('costo',null, ['class' => 'form-control', 'required', 'id'=>'costo'])  !!}
            </div>
        </div>

    </div>
</div>

<input type="hidden" name="dia_id" id="dia_id" value="{{$dia->id}}">

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('dias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')

<script type="text/javascript">
    $(".chosen-select").chosen({
        placeholder_text_multiple: "Seleccione de las opciones"
    }); 
</script>
@endsection