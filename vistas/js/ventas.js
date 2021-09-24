$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			}

	}

} );

$(".tablaPreVentas").on("click", ".btnEliminarPreVenta", function(){

	let idVenta = $(this).attr("idPreVenta");

	swal({
	  title: '¿Está seguro de borrar la Pre-venta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar venta!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=pre-ventas&idVenta=${idVenta}`;
  
	  }
  
	})
  
  });


$('.tablaPreVentas').on('click','.btnFinalizarVenta',function(){

	let idVenta = $(this).attr("idPreVenta");

	let data = `idVenta=${idVenta}`;

	let url = 'ajax/ventas.ajax.php';

	$.ajax({
		method: 'post',
		url,
		data,
		success:function(response){

			let respuesta = JSON.parse(response);
			
			$('#fechaVenta').val(respuesta[0].fecha);
			$('#compradorVenta').val(respuesta[0].comprador);
			$('#animal').html(capitalizarPrimeraLetra(respuesta[0].animal));
			$('#animal').next('i').attr('class',`icon icon-${respuesta[0].animal}`);

			if(respuesta[0].animal ==  'pollo' ||  respuesta[0].animal ==  'vaca'){
				
				$('#inputSeccionFinalizar').addClass('hide');
				
				$('#inputCantidadFinalizar').removeClass('hide');
				
				$('#cantidadFinalizar').html(respuesta[0].cantidad);
			
			}else{
				
				$('#seccionFinalizar').html(capitalizarPrimeraLetra(respuesta[0].seccion));	
			
			}
			
		}

	});

});

const calcularPorcentajeEmpleado = (porcentaje,precioTotal)=>{

	return precioTotal * porcentaje;

}

const calcularPrecioTotal = (precioKg,kgTotal)=>{

	return precioKg * kgTotal;

}

$('#kgFinal').on('change',function(){

	let kgTotal = $(this).val();

	let animal = $('#animal').html().toLowerCase();

	let url = 'ajax/precios.ajax.php';

	let data = `animal=${animal}`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){

			let respuesta = JSON.parse(response);			
			
			let precioTotal = calcularPrecioTotal(kgTotal,respuesta[0]);
	
			let porcentajeEmpleado = respuesta.comisionEmpleado
			
			$('#precioTotal').val(precioTotal);
			
			$('#porcentajeEmpleado').val(calcularPorcentajeEmpleado(precioTotal,(porcentajeEmpleado/100)));
		
		}
	
	});

});