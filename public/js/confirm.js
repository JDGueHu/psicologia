$( document ).ready(function() {

	//CONFIRMACIÓN PARA INACTIVAR

	$(".confirm_M").confirm({
	    title: 'Inactivar',
	    content: 'Va a inactivar uno de los' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$(".confirm_F").confirm({
	    title: 'Inactivar',
	    content: 'Va a inactivar una de las' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	//CONFIRMACIÓN PARA ACTIVAR

	$(".confirm_activar_M").confirm({
	    title: 'Activar',
	    content: 'Va a activar uno de los' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$(".confirm_activar_F").confirm({
	    title: 'Activar',
	    content: 'Va a activar una de las' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$(".confirm_desvincular_F").confirm({
	    title: 'Desvincular horas',
	    content: 'Va a desvincular las horas asociadas al día ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	//CONFIRMACIÓN CITAS

	$(".confirmar_cita").confirm({
	    title: 'Confirmar cita',
	    content: 'Va a confirmar la cita ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$('#example tbody').on( 'click', '.cancelar_cita', function () {


    	var cadena = $(this).parents('tr').children().eq(0).text(); // Tomar la cadena que contiene el id del registro
		var array = cadena.split("-"); // Sacar el id del registro que está separado por guion (es id está en la segunda posición, indice 1 del array)
		var url = route('datos_usuario.cancelar',array[1]); // URL de la acción cancelar cita
		alert(url);

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

		                $.ajax({
						  url: url,
						  type: 'GET',
				  		  datatype:'json',
				          contentType: false,
				          cache: false,
				          processData: false,
						}).done(function(response){


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


} );