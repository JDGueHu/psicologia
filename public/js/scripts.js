$(document).ready(function() {

    $.ajax({
      url: 'consultar_dias',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){
        console.log(response);

      $('#sandbox').datepicker({
	      autoclose: true,
	      daysOfWeekDisabled: "0",
	    });

      $('#basicExample').timepicker({
        'minTime' : '8:00 am' ,
        'maxTime' : '6:00 pm ' ,
        'step': '60',
      });

    });

})