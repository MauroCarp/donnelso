/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({
	"ordering": false,
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

});

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})

/*=============================================
 //input Mask
=============================================*/

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()

/*=============================================
CORRECCIÓN BOTONERAS OCULTAS BACKEND	
=============================================*/

if(window.matchMedia("(max-width:767px)").matches){
	
	$("body").removeClass('sidebar-collapse');

}else{

	$("body").addClass('sidebar-collapse');
}


$("input[name='animal']").change(function(){

	let value = $(this).val();

	if(value == 'vaca' || value == 'pollo'){


		$('#inputCantidad').removeClass('hide');
		$('#inputCantidad').show();
		$('#inputSeccion').hide();
		
	}else{
		
		$('#inputCantidad').hide();
		$('#inputSeccion').show();

	}

})

$('#cantidadNacidos').change(function(){

	let value = $(this).val();

	
	
});

// PONER MAYUSCULAS 

const capitalizarPrimeraLetra = (str)=>{

	return str.charAt(0).toUpperCase() + str.slice(1);

}

//   CARGAR OPTION SELECTED

const optionSelected = (idSelect,optValue)=>{

	let select = document.getElementById(idSelect);

		for (let index = 0; index < select.length; index++) {
			
			let opt = select[index];

			if(opt.value == optValue){

				opt.setAttribute('selected','true');

			}

		}
		
}


// FORMATEAR FECHA

const convertirFecha = (string)=>{
	
	let fecha = string.split('-').reverse().join('-');
	
	return fecha;

}


// CARGAR ANIMAL AL LOCALSTORAGE SEGUN SECCION

$('.sidebar ul li a').on('click',(evt)=>{

	let seccion = evt.currentTarget.href.replace('http://localhost/donnelso/','')

	switch (seccion) {
		case 'engorde':
				localStorage.setItem('animalEngorde','cerdo')
			break;
	
		case 'sanidad':
				localStorage.setItem('animalSanidad','cerdo')
			break;
	
		case 'servicios':
				localStorage.setItem('animalServicio','cerdo')
			break;
	
		default:
			break;
	}
	
});