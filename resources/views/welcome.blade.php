@extends('layouts.main')


@section('content')
<div id="wrapper" class="home-page">

    <section id="banner">
     
    <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Creative</h3> 
                    <p>We create the opportunities</p> 
                     
                </div>
              </li>
              <li>
                <img src="img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Solution</h3> 
                    <p>Success depends on work</p> 
                     
                </div>
              </li>
            </ul>
        </div>
    <!-- end slider -->
 
    </section> 

    <section id="call-to-action-2">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 style="color: #fdd428">Best Business consulting</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti</p>
                </div>
            </div>
        </div>

    </section>
    
    <section id="content">   
    
      <div class="container">
              <div class="row">
              <div class="col-md-12">
                  <div class="aligncenter"><h2 class="aligncenter">Our Services</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div>
                  <br/>
              </div>
          </div>

       <div class="row">
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-bell-o"></i>
                  <div class="info-blocks-in">
                      <h3>Consulting</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-hdd-o"></i>
                  <div class="info-blocks-in">
                      <h3>Strategy</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                  <div class="info-blocks-in">
                      <h3>Analysis</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
          </div>
      <div class="row">
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-code"></i>
                  <div class="info-blocks-in">
                      <h3>Investment</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-compress"></i>
                  <div class="info-blocks-in">
                      <h3>Creative</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
              <div class="col-sm-4 info-blocks">
                  <i class="icon-info-blocks fa fa-html5"></i>
                  <div class="info-blocks-in">
                      <h3>24/7 Support</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                  </div>
              </div>
          </div>
      </div>

    </section>
    
    <section class="section-padding gray-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h1>Aparta tu cita</h1>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-text">
                      <h4>Puedes apartar tu cita en tres simples pasos:</h4>

                        <ul class="withArrow">
                            <li>
                              <i class="fa fa-arrow-circle-o-right fa-2x" style="color: #29448e" aria-hidden="true"></i>
                              <i style="font-size: 20px">&nbsp Consulta la disponibilidad &nbsp</i>
                              <i class="fa fa-clock-o fa-2x" style="color: blue" aria-hidden="true"></i>
                            </li>
                            <li>
                              <i class="fa fa-arrow-circle-o-right fa-2x" style="color: #29448e" aria-hidden="true"></i>
                              <i style="font-size: 20px">&nbsp Indica las preferencias para tu cita &nbsp</i>
                              <i class="fa fa-id-card-o fa-2x" style="color: #8904B1" aria-hidden="true"></i>
                            </li>
                            <li>
                              <i class="fa fa-arrow-circle-o-right fa-2x" style="color: #29448e" aria-hidden="true"></i>
                              <i style="font-size: 20px">&nbsp Obten tu cita &nbsp</i>
                              <i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>
                            </li>
                            <li>&nbsp</li>
                        </ul>
                        @if (Auth::guest())
                          <div>
                            Si ya estas registrado <a href="{{ route('login') }}"><b>ingresa</b></a> para que puedas apartar tu cita, sino <a href="{{ route('register') }}"><b>regístrate</b></a> para poder hacerlo. 
                          </div>
                        @else
                          <div>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                            <a href="#" class="btn btn-primary boton_apartar_cita"><b>Aparta tu cita</b></a>       
                          </div>
                        @endif 
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-6"> 
                    <div class="about-image">
                        <img src="img/cita_psicologia.png" alt="About Images">
                    </div>
                </div>
            </div>
        </div>

    </section>    

    <section class="section-padding gray-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Our Organization</h2>
                        <p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-text">
                        <p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>

                        <ul class="withArrow">
                            <li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
                            <li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
                            <li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
                            <li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-image">
                        <img src="img/about.png" alt="About Images">
                    </div>
                </div>
            </div>
        </div>

    </section>    
    
    <section class="section-padding gray-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Our Organization</h2>
                        <p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-text">
                        <p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>

                        <ul class="withArrow">
                            <li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
                            <li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
                            <li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
                            <li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-image">
                        <img src="img/about.png" alt="About Images">
                    </div>
                </div>
            </div>
        </div>

    </section>  
    
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="widget">
                    <h5 class="widgetheading">Our Contact</h5>
                    <address>
                    <strong>Bootstrap company Inc</strong><br>
                    JC Main Road, Near Silnile tower<br>
                     Pin-21542 NewYork US.</address>
                    <p>
                        <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
                        <i class="icon-envelope-alt"></i> email@domainname.com
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a href="#">Latest Events</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="widget">
                    <h5 class="widgetheading">Recent News</h5>
                    <ul class="link-list">
                        <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                        <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                        <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; Bootstrap Template 2017 All right reserved. Template By </span><a href="http://webthemez.com/free-bootstrap-templates/" target="_blank">WebThemez</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </footer>


@if (!Auth::guest())
   @if (Auth::user()->email == 'admin@admin.com')
    <a href="">
      <div class="col-md-12 admin_front">
          
          <a href="{{ route('dias.index') }}">
            <span style="color: #ffffff">Portal de administración</span>
          </a>
      </div>
    </a>
  @endif
@endif 

</div>

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">APARTAR TU CITA</h3>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-md-12">              
              <span style="font-size: 16px"><b style="color: blue">Paso 1:</b> &nbsp Consulta la disponibilidad &nbsp</span>
              <i class="fa fa-clock-o fa-2x" style="color: blue" aria-hidden="true"></i>
            </div>              
          </div>

          <!-- PARA EL PASO 1 -->
          <div class="row">
            <div class="col-md-4"> 
              <label for="sandbox">Fecha</label>             
              <input id="sandbox" type="text" class="form-control">
            </div>    
            <div class="col-md-4">  
              <label for="basicExample">Hora</label>            
              <input id="basicExample" type="text" class="form-control">
            </div>   
            <div class="col-md-2">   
              <label><span style="color: #ffffff">__</span></label>           
              <button type="button" style="padding: 2px 12px" class="btn btn-default form-control" data-dismiss="modal">Consultar</button>
            </div>           
          </div>
          <div class="row">
            <div class="col-md-1 centrar_texto">
              <img src="img/pulgar_arriba.jpg" class="imagen" />
            </div>
            <div class="col-md-11">
              <p>Que bien! Hay disponibilidad para la fecha y hora en la que solicitas tu cita.</p>
            </div>  
          </div>
          <div class="row">
            <div class="col-md-1 centrar_texto">
              <img src="img/lo_siento.jpg" class="imagen" />
            </div>
            <div class="col-md-11">
              <p>Lo siento! No hay disponibilidad para la fecha y hora en la que solicitas tu cita, inténtalo de nuevo en otra fecha u hora.</p>
            </div>  
          </div>

          <!-- PARA EL PASO 2 -->
          <div class="row">
            <div class="col-md-12">
              <span style="font-size: 16px"><b style="color: #8904B1">Paso 2:</b> &nbsp Indica las preferencias para tu cita &nbsp</span>
              <i class="fa fa-id-card-o fa-2x" style="color: #8904B1" aria-hidden="true"></i>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">    
              <label for="sandbox">Seleccionar la modadlidad de la cita</label>           
              <select class="form-control" style="padding: 0px">
                <option>Consultorio</option>                  
                <option>Virtual</option>
                <option>Visita</option>
              </select>
            </div> 
            <div class="col-md-4">    
              <label for="sandbox">Seleccionar medio virtual</label>           
              <select class="form-control" style="padding: 0px">
                <option>Skype</option>                  
                <option>Hangouts</option>
              </select>
            </div>    
             <div class="col-md-4">    
              <label for="">Usuario para contacto</label>
              <input type="text" class="form-control" />
            </div>           
          </div>
          <div class="row">
            <div class="col-md-12">              
              <p>Modalidad Consultorio: Recuerda presentarte 10 min antes de la hora inicio de la cita en la dirección XXX.</p>
              <p>Modalidad Virtual: El usuario de contacto que atenderá tu cita es xxx, por favor conéctate 5 min antes de la hora de inicio de la cita.</p>
            </div>  
            <div class="col-md-12">              
              <p>Modalidad Visita: Recuerda que las visitas solo está disponibles para las ciudades de Pereira y Dosquebradas. Esta es la dirección en la que se realizará la consulta xxx, es la dirección registrada en tu perfil de usuario, si deseas usar una dirección diferente por favor marca la opción usar otra dirección e indica la nueva dirección </p>
            </div>               
          </div>
          <div class="row">
            <div class="col-md-4"> 
              <label class="checkbox-inline">Mi dirección</label>                     
              {!! Form::radio('direccion', 'mi_direccion', false, ['class' => 'form-control']) !!}            
            </div>  
            <div class="col-md-4"> 
             <label for="">Ciudad</label>           
             {!! Form::text('ciudad_user',null, ['class' => 'form-control', 'id'=>'ciudad_user', 'readonly'])  !!}           
            </div>  
            <div class="col-md-4"> 
             <label for="">Direccion</label>           
             {!! Form::textarea('direccion_user',null, ['class' => 'form-control', 'id'=>'direccion_user','size' => '30x2', 'readonly'])  !!}           
            </div>              
          </div> 
          <div class="row">
            <div class="col-md-4"> 
              <label class="checkbox-inline">Otra dirección</label>                     
              {!! Form::radio('direccion', 'otra_direccion', false, ['class' => 'form-control']) !!}            
            </div>  
            <div class="col-md-4"> 
             <label for="">Ciudad</label>           
             {!! Form::text('ciudad',null, ['class' => 'form-control', 'id'=>'ciudad')  !!}           
            </div>  
            <div class="col-md-4"> 
             <label for="">Direccion</label>           
             {!! Form::textarea('direccion',null, ['class' => 'form-control', 'id'=>'direccion','size' => '30x2'])  !!}           
            </div>           
          </div>          
          <!-- PARA EL PASO 3 -->
          <div class="col-md-12">
            <div class="row">
              <span style="font-size: 16px"><b style="color: green">Paso 3:</b> &nbsp Obten tu cita &nbsp</span>
              <i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>
            </div>
          </div>    
          <div class="row">
            <div class="col-md-12">              
              <p>Antes de apartar tu cita POR FAVOR verifica los datos que has ingresado, si estas seguro de ellos has click en el boton Apartar cita para finalizar el proceso, una vez lo hagas, te llegará un email con los datos de la cita</p>
              <p>Te llegará un email para confirmar la cita, si no la confirmas podrias perder la cita</p>
            </div>                 
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
@endsection

@section('script')

<script type="text/javascript">

</script>


@endsection