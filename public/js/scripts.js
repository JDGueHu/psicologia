$(document).ready(function() {

    //// PARA INHABILITAR DIAS EN EL CALENDARIO
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

    //// PARA INHABILITAR HORAS EN EL TIMEPICKER RESPECTO AL DIA SELECCIONADO
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

    //// Consultar disponibilidad
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
        console.log(response.length);

        if(response.length == 0){
          $("#disponible").removeClass("visible").fadeIn();
          $("#paso_2").removeClass("visible");
          $("#no_disponible").addClass( "visible" );
        }else{
          $("#no_disponible").removeClass("visible");          
          $("#disponible").addClass( "visible" );
        }

      });

    })
      

})