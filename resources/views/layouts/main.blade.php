<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>MLGH - Psicóloga</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- STYLES -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('date_picker_jquery/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('timepicker_jquery/jquery.timepicker.css') }}" rel="stylesheet">

</head>
<body>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">     
            <p class="pull-left hidden-xs"><i class="fa fa-clock-o"></i><span>Lunes a Viernes 8:00 pm - 6:00 pm</span></p>
            <p class="pull-right"><i class="fa fa-phone"></i>Tel (+57) 333-333-3333</p>
          </div>
        </div>
      </div>
    </div>

    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="img/logo.png" alt="logo"/>
                    </a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Inicio</a></li> 
                        <li><a href="#content">Servicios</a></li>
                        <li><a href="portfolio.html">Experiencia</a></li>
                        <li class="active"><a href="contact.html">Apartar cita</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Acceder</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif                      
                        </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    @yield('content')
    
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ asset('js/jquery.js') }}"></script>  

<script src="{{ asset('date_picker_jquery/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script> 
<script src="{{ asset('js/jquery.fancybox-media.js') }}"></script> 
<script src="{{ asset('js/jquery.flexslider.js') }}"></script> 
<script src="{{ asset('js/animate.js') }}"></script> 
<script src="{{ asset('timepicker_jquery/jquery.timepicker.min.js') }}"></script> 

<!-- Vendor Scripts -->
<script src="{{ asset('js/modernizr.custom.js') }}"></script> 
<script src="{{ asset('js/jquery.isotope.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{ asset('js/animate.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script> 
<script src="{{ asset('js/scripts.js') }}"></script> 

<script src='https://www.google.com/recaptcha/api.js'></script>

@yield('script')

</body>
</html>