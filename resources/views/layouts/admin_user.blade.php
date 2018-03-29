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
<link href="{{ asset('css/style_admin.css') }}" rel="stylesheet">
<link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('date_picker_jquery/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

<link href="{{ asset('dataTable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('dataTable/css/buttons.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('jquery_confirm/css/jquery-confirm.css') }}" rel="stylesheet">

<link href="{{ asset('chosen/chosen.css') }}" rel="stylesheet">
<link href="{{ asset('Trumbowyg-master/dist/ui/trumbowyg.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/style_admin.css') }}" rel="stylesheet">

</head>
<body>
	@routes
    <div id="app">

        @include('layouts.nav')
        <div class="container">        
            @include('flash::message')
            @yield('content')
        </div>

    </div>
    
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

<script src="{{ asset('dataTable/js/jquery.dataTables.min.js') }}"></script>    
<script src="{{ asset('dataTable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dataTable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('dataTable/js/jszip.min.js') }}"></script>
<script src="{{ asset('dataTable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('dataTable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('dataTable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dataTable/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('jquery_confirm/js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('Trumbowyg-master/dist/trumbowyg.min.js') }}"></script>

<script src="{{ asset('bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script> 

<!-- Vendor Scripts -->
<script src="{{ asset('js/modernizr.custom.js') }}"></script> 
<script src="{{ asset('js/jquery.isotope.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{ asset('js/animate.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script> 

<script src='https://www.google.com/recaptcha/api.js'></script>

@yield('script')

</body>
</html>