@extends('layouts.auth')


@section('content')

<style>
@media screen and (max-height: 575px){
#rc-imageselect, .g-recaptcha {transform:scale(0.77);
-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;}

</style>


<div class="container">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">Registro de usuario</div>

            <div class="panel-body">

                <form class="form-horizontal" method="POST" action="{{ route('registrarseStore') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6 {{ $errors->has('nombres') ? ' has-error' : '' }}">
                            <label for="nombres">Nombres<span style="color: red">*</span></label>
                            <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" required autofocus placeholder="Nombres">

                            @if ($errors->has('nombres'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombres') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6 {{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos">Apellidos<span style="color: red">*</span></label>
                            <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required placeholder="Apellidos">

                            @if ($errors->has('apellidos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo electrónico<span style="color: red">*</span></label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Ejemplo@ejemplo.com">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6 {{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="celular">Número celular<span style="color: red">*</span></label>
                            <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" required placeholder="57 3111111111">

                            @if ($errors->has('celular'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 {{ $errors->has('ciudad') ? ' has-error' : '' }}">
                            <label for="ciudad">Ciudad<span style="color: red">*</span></label>
                            <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" required>

                            @if ($errors->has('ciudad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ciudad') }}</strong>
                                </span>
                            @endif
                        </div>  
                        <div class="col-md-6">
                            <label for="departamento">Departamento</label>
                            <input id="departamento" type="text" class="form-control" name="departamento" readonly="readonly">
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="pais">País</label>
                            <input id="pais" type="text" class="form-control" name="pais" readonly="readonly">
                        </div>   
                        <div class="col-md-6 {{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion">Dirección<span style="color: red">*</span></label>
                            <textarea id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required></textarea>

                            @if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Contraseña<span style="color: red">*</span></label>
                            <input id="password" type="password" class="form-control" name="password" required placeholder="******">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="password-confirm">Confirmar contraseña<span style="color: red">*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="******">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="g-recaptcha" data-sitekey="6LcfFhcUAAAAACXEyM5NnQcHBsyTItK7BHbO8IEr"></div>
                        </div>
                        <div class="col-md-6 {{ $errors->has('politicas_tratamiento_datos') ? ' has-error' : '' }}">
                            <input type="checkbox" required name="politicas_tratamiento_datos" id="politicas_tratamiento_datos"> He leido y acepto la <a href=""><b>Política de tratamiento de información y datos personales</b></a>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-primary">
                                Registrase
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwI3QXc_44PgwWL2c9rybOtv3jrRtqWxE&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="{{ asset('js/shared.js') }}"></script>