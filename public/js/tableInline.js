$(document).ready(function() {

	var t = $('#example').DataTable({

    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No hay registros para mostrar",
        info: "Mostrando página _PAGE_ de _PAGES_ con _MAX_ registros",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(Filtrado de _MAX_ registros totales)",
        sSearch: "Buscar",
        paginate: {
        first:      "Primera",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "Última"
    	}
    },
    pageLength: 5,


	});

    //// CONSULTAR CITAS USUARIO LOGUEADO
    $.ajax({
      url: 'usuario/citas_usuario/consultar_citas',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      datatype:'json',
      contentType: false,
      cache: false,
      processData: false,
    }).done(function(response){
    //console.log(response);

    var modadlidad;

    response.forEach(function(element){

        if(element.estado == 'Cancelada'){
            modadlidad = '<td><span class="label label-danger">Cancelada</span></td>';
        }else{
            if(element.estado == 'Por confirmar'){
                modadlidad = '<td><span class="label label-warning">Por confirmar</span></td>';
            }else{
                if(element.estado == 'Confirmada'){
                    modadlidad = '<td><span class="label label-succes">Confirmada</span></td>';
                }else{
                    modadlidad = '<td><span class="label label-default">Finalizada</span></td>';
                }
            }
        }

        t.row.add( [
            element.consecutivo_cita+'<span style="opacity:0">-'+element.id+'</span>',
            element.fecha,
            element.hora,
            element.tipo_modalidad,
            modadlidad,
            '<a id="confirmar_cita" title="Confirmar cita" class="buttonConfirmar confirmar_cita" style="color:green; cursor:pointer"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>&nbsp;'
            ] ).draw( false );
        });
    });

    //Cancelar cita - Usuario
    $('#example tbody').on( 'click', '.confirmar_cita', function () {

      var  cadena = $(this).parents('tr').children().eq(0).text();
      var array = cadena.split("-");

      $('#example').DataTable().ajax.reload();


    });

});