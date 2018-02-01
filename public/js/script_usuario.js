$(document).ready(function() {

	$(".detalles_cita").click(function() {

		var  consecutivo = $(this).parents('tr').children().eq(0).text();

		var form_data = new FormData();
		form_data.append('consecutivo', consecutivo);

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
			$('#medio_virtual').text(response[0].medio_virtual);
			$('#usuario_medio_virtual').text(response[0].usuario_medio_virtual);
			$('#ciudad').text(response[0].ciudad);
			$('#direccion').text(response[0].dirección);
			$('#estado').text(response[0].estado);
			//console.log(response);

		});

		
	});

})