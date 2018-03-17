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


	$(".cancelar_cita").confirm({
	    title: 'Cancelar cita',
	    content: '' +
	    '<form action="" class="formName">' +
	    '<div class="form-group">' +
	    '<label>Motivo de la cancelación</label>' +
	    '<input type="text" placeholder="Your name" class="name form-control" required />' +
	    '</div>' +
	    '</form>',
	    buttons: {
	        formSubmit: {
	            text: 'Ok',
	            btnClass: 'btn-blue',
	            action: function () {
	                var name = this.$content.find('.name').val();
	                if(!name){
	                    $.alert('provide a valid name');
	                    return false;
	                }
	                $.alert('Your name is ' + name);
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

} );