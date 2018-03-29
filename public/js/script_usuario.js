$(document).ready(function() {

	//Detalles de la cita
	$(".detalles_cita").click(function() {

		var  consecutivo = $(this).parents('tr').children().eq(0).text();
		consecutivo = consecutivo.split('-');
		//console.log(consecutivo[1]);
		var form_data = new FormData();
		form_data.append('consecutivo', consecutivo[1]);

		$.ajax({
		url: '../administracion/citas/consultar_cita',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: 'POST',
		datatype:'json',
		contentType: false,
		cache: false,
		processData: false,
		data : form_data
		}).done(function(response){

			$('#consecutivo_cita').text(response[0].consecutivo_cita);
			$('#fecha').text(response[0].fecha);
			$('#hora').text(response[0].hora);
			$('#modalidad').text(response[0].tipo_modalidad);
			$('#medio_virtual').text((response[0].medio_virtual == null )? '':response[0].medio_virtual);
			$('#usuario_medio_virtual').text((response[0].usuario_medio_virtual == null )? '':response[0].usuario_medio_virtual);
			$('#ciudad').text(response[0].ciudad);
			$('#direccion').text(response[0].dirección);
			$('#estado').text(response[0].estado);
			//console.log(response);

		});

		
	});

	//Cancelación de cita
	$('#example tbody').on( 'click', '.cancelar_cita', function () {
		
    	var cadena = $(this).parents('tr').children().eq(0).text(); // Tomar la cadena que contiene el id del registro
		cadena = cadena.split("-"); // Sacar el id del registro que está separado por guion (es id está en la segunda posición, indice 1 del array)
		var url = route('datos_usuario.cancelar'); // URL de la acción cancelar cita
		//alert(url);
		$(this).parents('tr').children().eq(5).children('a').last().removeClass('visible');

		$.confirm({
		    title: 'Cancelar cita',
		    content: '' +
		    '<form action="" class="formName">' +
		    '<div class="form-group">' +
		    '<label>Motivo de la cancelación</label>' +
		    '<textarea type="text" placeholder="Motivo de cancelación" class="name form-control" required min="50" max="250"/></textarea>' +
		    '</div>' +
		    '</form>',
		    buttons: {
		        formSubmit: {
		            text: 'Ok',
		            btnClass: 'btn-blue',
		            action: function () {
		                var name = this.$content.find('.name').val();
		                if(!name || name.length<50){
		                    $.alert('Ingrese un motivo de cancelacíon con al menos 50 caracteres');
		                    return false;
						}
						
						//Agregar funcionalidad spinner al icono del evento
						$(this).children('i').addClass('fa-spin');
						$(this).parents('tr').children().eq(5).children('a').addClass('hola');
						var form_data = new FormData();
						form_data.append('cita_id', cadena[1]);
						form_data.append('motivo_cancelacion', name);
						form_data.append('modulo', 'usuario');


		                $.ajax({
						  url: url,
						  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
						  type: 'POST',
				  		  datatype:'json',
				          contentType: false,
				          cache: false,
						  processData: false,
						  data : form_data,
						}).done(function(response){
							$.notify({
								// options
								message: "La cita <b>"+response.consecutivo_cita+"</b> se ha cancelado exitosamente", 
							},{
								// settings
								type: 'danger',
								placement: {
									from: "bottom",
									align: "right"
								}
							});
							window.location = route('datos_usuario.index');
						});

		            }
		        },
		        Cancelar: function () {
		            //close
		        },
		    },
		    onContentReady: function () {
		        // bind to events
		        var jc = this;
		        this.$content.find('form').on('submit', function (e) {
		            // if the user submits the form by pressing enter in the field.
		            e.preventDefault();
		            jc.$$formSubmit.trigger('click'); // reference the button and click it
		        });
		    }	    
		});

	});
})