 
  <nav class="navbar navbar-default">
  <div class="container-fluid ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">
        <span style="font-style: italic;color: #002e5b;font-weight: bold">MLGH</span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    @if (Auth::guest())
    @else

      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp;Configuración&nbsp;
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
              <li><a href="{{ route('ciudad_cita.index') }}"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp Ciudades visita </a></li>
              <li><a href="{{ route('dias.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp Días </a></li>
              <li><a href="{{ route('modalidad.index') }}"><i class="fa fa-server" aria-hidden="true"></i> &nbsp Modalidades </a></li>     
              <!-- <li><a href="{{ route('motivoCancelacion.index') }}"><i class="fa fa-ban" aria-hidden="true"></i> &nbsp Motivos de cancelación </a></li>   -->
              <li><a href="{{ route('parametro.index') }}"><i class="fa fa-cog" aria-hidden="true"></i> &nbsp Parámetros </a></li>     
          </ul>
        </li>

      </ul>  

      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            &nbsp;Administración&nbsp;
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
              <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Usuarios </a></li> 
              <li><a href="{{ route('citas.index') }}"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp Citas </a></li> 
          </ul>
        </li>
    
      </ul> 

    @endif 

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
               {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}<span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
          
      </ul>  
       
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>