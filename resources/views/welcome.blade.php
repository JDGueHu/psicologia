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
<div class="modal fade pac_container" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">APARTAR TU CITA</h3>
      </div>
      <div class="modal-body">
           <!-- PARA EL PASO 1 -->
          <section id="paso_1"> 
            <div class="row">
              <div class="col-md-12">              
                <span style="font-size: 16px"><b style="color: blue">Paso 1:</b> &nbsp Consulta la disponibilidad &nbsp</span>
                <i class="fa fa-clock-o fa-2x" style="color: blue" aria-hidden="true"></i>
              </div>              
            </div>   
            <div class="row">
              <div class="col-md-4"> 
                <label for="sandbox">Fecha</label>             
                <input id="sandbox" type="text" class="form-control">
                <label id="fecha_requerida" class="visible color_requerido">Campo requerido</label>
              </div>    
              <div class="col-md-4">  
                <label for="horas">Hora</label>    
                <select class="form-control" id="horas" style="padding: 0px">                
                </select>   
                <label id="hora_requerida" class="visible color_requerido">Campo requerido</label>     
              </div>   
              <div class="col-md-2">   
                <label><span style="color: #ffffff">__</span></label>           
                <button type="button" style="padding: 2px 12px" class="btn btn-default form-control" id="consultar">Consultar</button>
              </div>           
            </div>
            <div class="row visible" id="disponible">
              <div class="col-md-1 centrar_texto">
                <img src="img/pulgar_arriba.jpg" class="imagen" />
              </div>
              <div class="col-md-11">
                <p class="texto_disponibilidad">Que bien! Hay disponibilidad para la fecha y hora en la que requieres tu cita.</p>
              </div>  
            </div>
            <div class="row visible" id="no_disponible">
              <div class="col-md-1 centrar_texto">
                <img src="img/lo_siento.jpg" class="imagen" />
              </div>
              <div class="col-md-11">
                <p>Lo siento! No hay disponibilidad para la fecha y hora en la que requieres tu cita, inténtalo de nuevo en otra fecha u hora.</p>
              </div>  
            </div>
          </section>

          <!-- PARA EL PASO 2 -->
          <section id="paso_2" class="visible">          
            <div class="row">
              <div class="col-md-12">
                <span style="font-size: 16px"><b style="color: #8904B1">Paso 2:</b> &nbsp Indica las preferencias para tu cita &nbsp</span>
                <i class="fa fa-id-card-o fa-2x" style="color: #8904B1" aria-hidden="true"></i>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">    
                <label for="modadlidad_cita">Modadlidad de la cita</label>           
                <select id="modadlidad_cita" class="form-control" style="padding: 0px">
                  <option value=""></option>
                  <option value="Consultorio">Consultorio</option>                  
                  <option value="Virtual">Virtual</option>
                  <option value="Visita">Visita</option>
                </select>
              </div> 
              <div class="col-md-4 visible" id="medio_virtual">    
                <label for="medio_virtual_cita">Medio virtual</label>           
                <select id="medio_virtual_cita" class="form-control" style="padding: 0px">
                  <option value=""></option>
                  <option value="Skype">Skype</option>                  
                  <option value="Hangouts">Hangouts</option>
                </select>
              </div>    
               <div class="col-md-4 visible" id="usuario_medio_virtual">    
                <label for="">Nombre de usuario en <span id="nombre_usuario_medio_virtual"></span></label>
                <input type="text" class="form-control" id="input_nombre_usuario" />
              </div>           
            </div>
            <div class="row">
              <div class="col-md-12">              
                <p id="modadlidad_consultorio" class="visible">Modalidad Consultorio: Recuerda presentarte 10 min antes de la hora inicio de la cita en la dirección <span class="resaltar" id="direccion_consultorio"></span>.</p>
                <p id="modadlidad_virtual" class="visible">Modalidad Virtual: El usuario de contacto que te atenderá en Skype es XXX y para Hangouts es xxx, por favor conéctate 5 min antes de la hora de inicio de la cita.</p>
              </div>  
              <div class="col-md-12">              
                <p id="modadlidad_visita" class="visible">Modalidad Visita: La dirección marcada corresponde a la dirección registrada en tu perfil de usuario, si deseas usar una dirección diferente por favor marca la opción usar otra dirección e indica la nueva dirección.</p>
              </div>               
            </div>
            <div id="modadlidad_visita_direccion" class="visible">
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
                  <label for="otra_direccion" class="checkbox-inline">Otra dirección</label>                     
                  {!! Form::radio('direccion', 'otra_direccion', false, ['class' => 'form-control']) !!}            
                </div>  
                <div class="col-md-4"> 
                 <label for="ciudad">Ciudad</label>           
                <select class="form-control" id="ciudad" style="padding: 0px">                
                </select>          
                </div>  
                <div class="col-md-4"> 
                 <label for="direccion_completa">Direccion</label>           
                 {!! Form::textarea('direccion_completa',null, ['class' => 'form-control', 'id'=>'direccion_completa','size' => '30x2'])  !!}           
                </div>           
            </div> 
            </div>
          </section>         
          <!-- PARA EL PASO 3 -->
          <section id="paso_3" class="visible">
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
          </section>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    
  </div>
</div>
@endsection

@section('script')

@endsection