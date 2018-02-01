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
	    content: 'Va a cancelar la cita ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

} );