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

	new swal({
	  title: '¿Está seguro de borrar la Pre-venta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
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

$(".tablaVentas").on("click", ".btnEliminarVenta", function(){

	let idVenta = $(this).attr("idVenta");

	new swal({
	  title: '¿Está seguro de borrar la Venta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar venta!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=ventas&idVenta=${idVenta}`;
  
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
		
			$('#idVenta').val(respuesta[0].id);
			$('#fechaVenta').val(respuesta[0].fecha);
			$('#compradorVenta').val(respuesta[0].comprador);
			$('#animalFaenarText').html(capitalizarPrimeraLetra(respuesta[0].animal));
			$('#animalFaenarText').next('i').attr('class',`icon icon-${respuesta[0].animal}`);
			
			$('#animalFaenar').val(respuesta[0].animal);

			cargarSelectListosVenta(respuesta[0].animal,'#caravanaFaenar');

			if(respuesta[0].animal ==  'pollo' ||  respuesta[0].animal ==  'vaca'){
				
				$('#inputSeccionFinalizar').addClass('hide');
				
				$('#inputCaravanaVenta').addClass('hide')
				
				$('#inputCaravanaVacasVenta').addClass('hide')
				
				$('#inputCaravanaVacasVenta').html('')
				
				$('#inputCantidadFinalizar').removeClass('hide');
				
				$('#cantidadFinalizar').html(respuesta[0].cantidad);

				$('#cantidadVenta').val(respuesta[0].cantidad);

				if(respuesta[0].animal == 'vaca'){
					
					$('#inputCaravanaVacasVenta').removeClass('hide')

					let inputCaravana = `<div class="row">`

					for (let index = 0; index < respuesta[0].cantidad; index++) {
						
							inputCaravana += `<div class="col-xs-12 col-lg-6">
                                    
																<div class="form-group">
		
																	<label>Caravana:</label>
							
																		<select name="caravanaVacasVenta[]" class="form-control caravanasVacas"></select>
								
																</div>
					
															</div>`
					}

					inputCaravana += `</div>`

					$('#inputCaravanaVacasVenta').append(inputCaravana)

					cargarSelectListosVenta('vaca','.caravanasVacas');

				}


			}else{
				
				$('#seccionFinalizar').html(capitalizarPrimeraLetra(respuesta[0].seccion));	
				
				$('#seccionFaenar').val(respuesta[0].seccion);

				$('#inputCaravanaVenta').removeClass('hide')
				
				$('#inputSeccionFinalizar').removeClass('hide')
				
				$('#inputCantidadFinalizar').addClass('hide');
				
				$('#inputCaravanaVacasVenta').addClass('hide')
				
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

	let animal = $('#animalFaenar').val();

	let url = 'ajax/precios.ajax.php';

	let data = `accion=cargarPrecios`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){
			
			let respuesta = JSON.parse(response);			
				
			let precioTotal = calcularPrecioTotal(kgTotal,respuesta[animal]);
	
			let porcentajeEmpleado = respuesta.comisionEmpleado
			
			$('#precioTotal').val(precioTotal);
			
			$('#porcentajeEmpleado').val(calcularPorcentajeEmpleado(precioTotal,(porcentajeEmpleado/100)));
		
		}
	
	});

});

const cargarSelectListosVenta = (tipo,selectId)=>{
	
	$(`${selectId}`).html('')

	let data = `tipo=${tipo}`;

	let url = 'ajax/ventas.ajax.php';
	
	$.ajax({
		method: 'post',
		url,
		data,
		success:function(response){
			console.log(response);
			
			$(`${selectId}`).append(response);
			
		}
	})

}

const validarStock = ()=>{

	let animal = $('input[name="animal"]:checked').val()

	let data = `mostrarStock=true`

	let url = 'ajax/ventas.ajax.php'

	$.ajax({
		method:'post',
		url,
		data,
		success:(response)=>{

			let respuesta = JSON.parse(response)

			if(respuesta[animal] <= 0){

				$('button[name="cargarVenta"]').attr('disabled','disabled')
				$('#noHayStock').show()
				
			}else{
				
				$('button[name="cargarVenta"]').removeAttr('disabled','disabled')
				$('#noHayStock').hide()
			
			}

		}
	})
}

$('button[data-target="#ventanaModalPreVenta"]').on('click',()=>{

	validarStock()
	
})

$('a[data-target="#ventanaModalPreVenta"]').on('click',()=>{

	validarStock()
	
})

$('input[name="animal"]').on('change',function(){

	validarStock()
	
})
