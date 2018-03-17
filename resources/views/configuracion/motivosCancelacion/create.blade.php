@extends('layouts.admin')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('motivoCancelacion.index') }}"><i class="fa fa-ban" aria-hidden="true"></i> &nbsp Motivos de cancelación</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'motivoCancelacion.store', 'method' => 'POST']) !!} 

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('motivoCancelacion.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-12 separarBottom">
                {!! Form::label('motivo','Motivo')  !!}
                {!! Form::text('motivo',null, ['class' => 'form-control mayusculas', 'id'=>'motivo'])  !!}
            </div>
        </div>
    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('motivoCancelacion.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('script')
    <script>
        $('#detalles').trumbowyg();
    </script>
@endsection