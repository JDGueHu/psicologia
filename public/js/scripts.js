$(document).ready(function() {

    //// PARA HABILITAR DIAS EN EL CALENDARIO
    $.ajax({
      url: 'configuracion/dias/consultar_dias',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){

      var disabled_days = ['1','2','3','4','5','6','0']
      var lenght_disabled_days = disabled_days.length;
      var i;

      response.forEach(function(element){
          i = 0;

          while(i<lenght_disabled_days){
            if(disabled_days[i] == element.numero_dia){
              disabled_days.splice(i, 1)
            }
            i++;
          }
      });

      var disabled_days = disabled_days.toString();

      $('#sandbox').datepicker({
	      autoclose: true,
        todayHighlight: true,
        startDate: "today",
	      daysOfWeekDisabled: disabled_days,
	    });

    });

    //// CARGAR CIUDADES
    $.ajax({
      url: 'configuracion/ciudad_cita/consultar_ciudades',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){

        $("#ciudad option").remove();
        $('#ciudad').append($('<option>', {
          value: '',
          text: ''
        }));

        response.forEach(function(element){
          $('#ciudad').append($('<option>', {
              value: element.ciudad,
              text: element.ciudad
          }));
        });
    });

    //// CARGAR PARÁMETROS
    // $.ajax({
    //   url: 'configuracion/parametro/consultar_parametros',
    //   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //   type: 'POST',
    //   datatype:'json',
    //   contentType: false,
    //   cache: false,
    //   processData: false,
    // }).done(function(response){

    //     response.forEach(function(element){
    //       if(element.llave == "DIRECCION_CONSULTORIO"){
    //         $('#direccion_consultorio').text(element.valor);
    //       }
    //     });

    // });

    //// CARGAR DETALLES DE MODALIDADES
    $.ajax({
      url: 'configuracion/modalidad/consultar_modalidades',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){

      console.log(response);

      response.forEach(function(element){
        if(element.tipo_modalidad == "Consultorio"){
          document.getElementById("modadlidad_consultorio").innerHTML = element.detalles;
        }
        if(element.tipo_modalidad == "Virtual"){
          document.getElementById("modadlidad_virtual").innerHTML = element.detalles;
        }
        if(element.tipo_modalidad == "Visita"){
          document.getElementById("modadlidad_visita").innerHTML = element.detalles;
        }
      });     

    });

    //// DATOS DE USUARIO LOGUEADO
    $.ajax({
      url: 'configuracion/ciudad_cita/ciudad_usuario_logueado',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){
      
      $('#ciudad_user').val(response[0].ciudad);
      $('#direccion_user').val(response[0].direccion);

    });

    //// VALIDAR CIUDAD DE USUARIO LOGUEADO PARA MODALIDAD VISITA
    $.ajax({
      url: 'configuracion/ciudad_cita/validar_ciudad_usuario_logueado',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){
      
      if(response.length > 0){
        $('input[value="mi_direccion"]').prop('checked', true);
        $("#ciudad_user_no_valida").addClass("visible"); 
      }
      else{
        $('input[value="mi_direccion"]').prop('checked', false);
        $('input[value="mi_direccion"]').prop('disabled', true);
        $("#ciudad_user_no_valida").removeClass("visible");  
      }

    });

    //// VALIDAR INPUTS
    if($('#sandbox').val() == "" || $('#horas option:selected').text() == ""){
      $("#consultar").prop( "disabled", true );     
    }else{
      $("#consultar").prop( "disabled", false );   
    } 

    $.fn.validar_inputs = function() {

      if($('#sandbox').val() == "" || $('#horas option:selected').text() == ""){
        $("#consultar").prop( "disabled", true );     
      }else{
        $("#consultar").prop( "disabled", false );   
      } 

    }

    $('#horas').change(function() {
      $.fn.validar_inputs();
    });

    //// PARA HABILITAR HORAS EN EL TIMEPICKER RESPECTO AL DIA SELECCIONADO
    $('#sandbox').change(function() {

      $.fn.validar_inputs();

      var date = new Date($('#sandbox').val());

      var form_data = new FormData();
      form_data.append('numero_dia', date.getDay());

      $.ajax({
        url: 'configuracion/dias/consultar_horas_dia',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        datatype:'json',
        contentType: false,
        cache: false,
        processData: false,
        data : form_data
      }).done(function(response){

        $("#horas option").remove();
        $('#horas').append($('<option>', {
          value: '',
          text: ''
        }));

        response.forEach(function(element){
          $('#horas').append($('<option>', {
              value: element.hora,
              text: element.hora
          }));
        });

      });

    });

    //// CONSULTAR DISPONIBILIDAD
    $( "#consultar" ).click(function() {

      var form_data = new FormData();
      form_data.append('fecha', $('#sandbox').val());
      form_data.append('hora', $('#horas').val());

      $.ajax({
        url: 'configuracion/dias/consultar_disponibilidad',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        datatype:'json',
        contentType: false,
        cache: false,
        processData: false,
        data : form_data
      }).done(function(response){
       //console.log(response.length);

        if(response.length == 0){
          setTimeout(function () {
            $("#disponible").fadeIn(1000);
          }, 1000);
          setTimeout(function () {
            $("#paso_2").fadeIn(1000);
          }, 1000);
          $("#no_disponible").addClass( "visible" );

        }else{
          setTimeout(function () {
            $("#no_disponible").fadeIn(1000);
          }, 1000);
          $("#no_disponible").removeClass("visible");          
          $("#disponible").addClass("visible");
        }

      });

    })


    $.fn.limpiar_x_cambio = function() {
        // Ocultar los campos de opción Virtual
        $("#medio_virtual").addClass("visible");
        $("#usuario_medio_virtual").addClass("visible");
        $('#medio_virtual_cita').val('');
        $('#input_nombre_usuario').val('');


    }

    //// MOSTRAR CAMPO MEDIO VIRTUAL POR CAMBIO DE MODALIDAD
    $('#modadlidad_cita').change(function() {

      if($('#modadlidad_cita').val() != "" && $('#modadlidad_cita option:selected').text() == "Consultorio"){

        $.fn.limpiar_x_cambio();

        $("#modadlidad_consultorio").removeClass("visible");
        $("#modadlidad_virtual").addClass("visible");
        $("#modadlidad_visita").addClass("visible");
        $("#modadlidad_visita_direccion").addClass("visible");

      }else if($('#modadlidad_cita').val() != "" && $('#modadlidad_cita option:selected').text() == "Virtual"){

        $("#medio_virtual").removeClass("visible");  

        $("#modadlidad_consultorio").addClass("visible");
        $("#modadlidad_virtual").removeClass("visible");
        $("#modadlidad_visita").addClass("visible");
        $("#modadlidad_visita_direccion").addClass("visible");

      }else if($('#modadlidad_cita').val() != "" && $('#modadlidad_cita option:selected').text() == "Visita"){

        $.fn.limpiar_x_cambio();

        $("#modadlidad_consultorio").addClass("visible");
        $("#modadlidad_virtual").addClass("visible");
        $("#modadlidad_visita").removeClass("visible");
        $("#modadlidad_visita_direccion").removeClass("visible");

      }else{
        $("#medio_virtual").addClass("visible");
      }   

      setTimeout(function () {
        $("#paso_3").fadeIn(1000);
      }, 1000);   

    });
 
     //// MOSTRAR CAMPO USUARIO POR CAMBIO DE MEDIO VIRTUAL
    $('#medio_virtual_cita').change(function() {

      if($('#medio_virtual_cita').val() != ""){

        $('#nombre_usuario_medio_virtual').text($('#medio_virtual_cita option:selected').text());
        $("#usuario_medio_virtual").removeClass("visible");  
      }else{
        $("#usuario_medio_virtual").addClass("visible");
      }      

    });     

})